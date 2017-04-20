<?php

namespace App\Repositories\Backend\Access\User;

use App\Models\Access\User\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\User\UserCreated;
use App\Events\Backend\Access\User\UserUpdated;
use App\Events\Backend\Access\User\UserDeleted;
use App\Events\Backend\Access\User\UserRestored;
use App\Events\Backend\Access\User\UserDeactivated;
use App\Events\Backend\Access\User\UserReactivated;
use App\Events\Backend\Access\User\UserPasswordChanged;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Events\Backend\Access\User\UserPermanentlyDeleted;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Models\ModuloAccion\ModuloAccion;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends Repository
{
	/**
	 * Associated Repository Model
	 */
	const MODEL = User::class;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

	/**
	 * @param int $status
	 * @param bool $trashed
	 * @return mixed
	 */
	public function getForDataTable($status = 1, $trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
		$dataTableQuery = $this->query()
			->with('roles')
			->select([
				config('access.users_table') . '.id',
				config('access.users_table') . '.name',
				config('access.users_table') . '.email',
				config('access.users_table') . '.status',
				config('access.users_table') . '.confirmed',
				config('access.users_table') . '.created_at',
				config('access.users_table') . '.updated_at',
				config('access.users_table') . '.deleted_at',
			]);

		if ($trashed == "true") {
			return $dataTableQuery->onlyTrashed();
		}

		// active() is a scope on the UserScope trait
		return $dataTableQuery->active($status);
    }

	/**
	 * @param Model $input
	 */
	public function create($input)
    {
		$data = $input['data'];
		$roles = $input['roles'];

        $user = $this->createUserStub($data);

        

		DB::transaction(function() use ($user, $data, $roles) {
			if (parent::save($user)) {

				//User Created, Validate Roles
				if (! count($roles['assignees_roles'])) {
					throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
				}

				//Attach new roles
				$user->attachRoles($roles['assignees_roles']);

				//Send confirmation email if requested
				if (isset($data['confirmation_email']) && $user->confirmed == 0) {
					$user->notify(new UserNeedsConfirmation($user->confirmation_code));
				}

				event(new UserCreated($user));
                $permisos = isset($data['assignacionPermiso'])?$data['assignacionPermiso']:null;
                self::guardarPermisos($user, $permisos, $roles);

                if(isset($data['clasificador_id'])){
                    DB::table('categoria_usuarios')->insert(
                        ['clasificador_id' => $data['clasificador_id'], 'usuario_id' => $user->id]
                    );
                }
				return true;
			}

        	throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
		});
    }

	/**
	 * @param Model $user
	 * @param array $input
	 */
	public function update(Model $user, array $input)
    {
    	$data = $input['data'];
		$roles = $input['roles'];

        $this->checkUserByEmail($data, $user);

		DB::transaction(function() use ($user, $data, $roles) {
			if (parent::update($user, $data)) {
				//For whatever reason this just wont work in the above call, so a second is needed for now
				$user->status = isset($data['status']) ? 1 : 0;
				$user->confirmed = isset($data['confirmed']) ? 1 : 0;
				parent::save($user);

				$this->checkUserRolesCount($roles);
				$this->flushRoles($roles, $user);
                $permisos = isset($data['assignacionPermiso'])?$data['assignacionPermiso']:null;
                self::ActualizarPermisos($user, $permisos, $roles);

				event(new UserUpdated($user));

                //actualizar categoría
                DB::table('categoria_usuarios')
                ->where('usuario_id', $user->id)
                ->update(['clasificador_id' => $data['clasificador_id']]);

				return true;
			}

        	throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
		});
    }

	/**
	 * @param Model $user
	 * @param $input
	 * @return bool
	 * @throws GeneralException
	 */
	public function updatePassword(Model $user, $input)
    {
        $user->password = bcrypt($input['password']);

        if (parent::save($user)) {
            event(new UserPasswordChanged($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.update_password_error'));
    }

	/**
	 * @param Model $user
	 * @return bool
	 * @throws GeneralException
	 */
	public function delete(Model $user)
    {
        if (access()->id() == $user->id) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
        }

        if (parent::delete($user)) {
            event(new UserDeleted($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }

	/**
	 * @param Model $user
	 * @throws GeneralException
	 */
	public function forceDelete(Model $user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException("This user must be deleted first before it can be destroyed permanently.");
        }

		DB::transaction(function() use ($user) {
			if (parent::forceDelete($user)) {
				event(new UserPermanentlyDeleted($user));

                DB::table('categoria_usuarios')->where('usuario_id', $user->id)->delete();


				return true;
			}

			throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
		});
    }

	/**
	 * @param Model $user
	 * @return bool
	 * @throws GeneralException
	 */
	public function restore(Model $user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException("This user is not deleted so it can not be restored.");
        }

        if (parent::restore(($user))) {
            event(new UserRestored($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

	/**
	 * @param Model $user
	 * @param $status
	 * @return bool
	 * @throws GeneralException
	 */
	public function mark(Model $user, $status)
    {
        if (access()->id() == $user->id && $status == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
        }

        $user->status = $status;

        switch ($status) {
            case 0:
                event(new UserDeactivated($user));
            break;

            case 1:
                event(new UserReactivated($user));
            break;
        }

        if (parent::save($user)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
    }

    /**
     * @param  $input
     * @param  $user
     * @throws GeneralException
     */
    protected function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email']) {
            //Check to see if email exists
            if ($this->query()->where('email', '=', $input['email'])->first()) {
                throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
            }
        }
    }

    /**
     * @param $roles
     * @param $user
     */
    protected function flushRoles($roles, $user)
    {
        //Flush roles out, then add array of new ones
        $user->detachRoles($user->roles);
        $user->attachRoles($roles['assignees_roles']);
    }

    /**
     * @param  $roles
     * @throws GeneralException
     */
    protected function checkUserRolesCount($roles)
    {
        //User Updated, Update Roles
        //Validate that there's at least one role chosen
        if (count($roles['assignees_roles']) == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.role_needed'));
        }
    }

    /**
     * @param  $input
     * @return mixed
     */
    protected function createUserStub($input)
    {
    	$user					 = self::MODEL;
        $user                    = new $user;
        $user->name              = $input['name'];
        $user->email             = $input['email'];
        $user->password          = bcrypt($input['password']);
        $user->status            = isset($input['status']) ? 1 : 0;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed         = isset($input['confirmed']) ? 1 : 0;
        if($input['username'])
            $user->username         = $input['username'];
        else
            $user->username         = $user->email;

        
        return $user;
    }

    public function guardarPermisos($user, $datos, $roles){
        if(count($datos)>0){
            foreach($datos as $permiso){
                $codigo = explode("_", $permiso);
                $moduloAccion = new ModuloAccion();
                $moduloAccion->modulo_id = $codigo['0'];
                $moduloAccion->permiso_id = $codigo['1'];
                $moduloAccion->usuario_id = $user->id;
                $moduloAccion->save();  
                $roleId = $codigo['2'];
            }
            $objeto = DB::table('assigned_roles')->where('user_id', $user->id)->where('role_id',$roleId)->first();
            if(!is_object($objeto)){
                DB::table('assigned_roles')->insert(
                    ['user_id' => $user->id, 'role_id' => $roleId]
                );
            }
        }
    }

    public function ActualizarPermisos($user, $datos, $roles){
        DB::table('modulo_accions')->where('usuario_id', $user->id)->delete();
        if(count($datos)>0){
            foreach($datos as $permiso){
                $codigo = explode("_", $permiso);
                $moduloAccion = new ModuloAccion();
                $moduloAccion->modulo_id = $codigo['0'];
                $moduloAccion->permiso_id = $codigo['1'];
                $moduloAccion->usuario_id = $user->id;
                $moduloAccion->save();   
                $roleId = $codigo['2']; 
            }
            $objeto = DB::table('assigned_roles')->where('user_id', $user->id)->where('role_id',$roleId)->first();
            if(!is_object($objeto)){
                DB::table('assigned_roles')->insert(
                    ['user_id' => $user->id, 'role_id' => $roleId]
                );
            }
        }
        
    }
}
