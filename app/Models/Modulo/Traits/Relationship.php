<?php

namespace App\Models\Modulo\Traits;
use App\Models\Access\Permission\Permission;

trait Relationship
{
	public function roles()
    {
        return $this->belongsToMany(config('access.role'), 'modulo_rols', 'modulo_id', 'rol_id');
    }

    public function permisos()
    {
        return $this->belongsToMany(Permission::class, 'accions', 'modulo_id', 'permiso_id');
    }
}