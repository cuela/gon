<?php

namespace App\Models\Access\Permission\Traits\Relationship;
use App\Models\Modulo\Modulo;
/**
 * Class PermissionRelationship
 * @package App\Models\Access\Permission\Traits\Relationship
 */
trait PermissionRelationship
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.permission_role_table'), 'permission_id', 'role_id');
    }

    public function accion()
    {
        return $this->hasOne(App\Models\Accion\Accion::class);
    }

    public function modulos()
    {
        return $this->belongsToMany(Modulo::class, 'accions', 'permiso_id', 'modulo_id');
    }
}