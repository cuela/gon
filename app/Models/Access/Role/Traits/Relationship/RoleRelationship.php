<?php

namespace App\Models\Access\Role\Traits\Relationship;
use App\Models\Modulo\Modulo;
/**
 * Class RoleRelationship
 * @package App\Models\Access\Role\Traits\Relationship
 */
trait RoleRelationship
{
    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'), config('access.assigned_roles_table'), 'role_id', 'user_id');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(config('access.permission'), config('access.permission_role_table'), 'role_id', 'permission_id')
            ->orderBy('display_name', 'asc');
    }


    public function modulos()
    {
        return $this->belongsToMany(Modulo::class, 'modulo_rols', 'rol_id', 'modulo_id');
    }

    
}