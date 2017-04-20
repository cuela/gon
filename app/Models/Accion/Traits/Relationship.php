<?php

namespace App\Models\Accion\Traits;


trait Relationship
{
	public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'), 'modulo_accions', 'accion_id', 'usuario_id');
    }

    public function permiso()
    {
        return $this->belongsTo(\App\Models\Access\Permission\Permission::class,'permiso_id');
    }
}