<?php

namespace App\Models\Accion;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accion\Traits\Scope;
use App\Models\Accion\Traits\Attribute;
use App\Models\Accion\Traits\Relationship;

class Accion extends Model
{
    use Scope,
	Attribute,
	Relationship;

	public $fillable   = [
		'id',
        'nombre', 
        'descripcion',
        'orden',
        'estado',
        'modulo_id',
        'permiso_id',
	];
}
