<?php

namespace App\Repositories\Backend\Menu;

use App\Repositories\Repository;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu\MenuCategoria;

/**
 * Class MenuCategoriaRepository
 * @package app\Repositories\MenuCategoria
 */
class MenuCategoriaRepository extends Repository
{
	/**
	 * Associated Repository Model
	 */
	const MODEL = MenuCategoria::class;

	/**
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getAll($order_by = 'sort', $sort = 'asc')
    {
		return $this->query()
			->with('users', 'permissions')
			->orderBy($order_by, $sort)
			->get();
    }

	/**
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getForDataTable($order_by = 'sort', $sort = 'asc')
	{
		return $this->query()
			->select([
					'menu_categorias.id',
				 	'menu_categorias.nombre',
				 	'menu_categorias.descripcion'
			]);
	}

    
    public function create(array $input)
    {
    	$menuCategoria 		= self::MODEL;
		$menuCategoria      = new $menuCategoria;
		$menuCategoria->id = $input['id'];
		$menuCategoria->nombre = $input['nombre'];
		$menuCategoria->descripcion = $input['descripcion'];

    	parent::save($menuCategoria);
    }

    
    public function update(Model $menuCategoria, array $input)
    {
    	$menuCategoria->nombre = $input['nombre'];
		$menuCategoria->descripcion = $input['descripcion'];

    	parent::save($menuCategoria);
    }

    
    public function delete(Model $menuCategoria)
    {
  		parent::delete($menuCategoria);
    }

	
	public function getDefaultUserRole() {
		
	}
}
