<?php

namespace App\Models\ModuloAccion;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModuloAccion\Traits\Scope;
use App\Models\ModuloAccion\Traits\Attribute;
use App\Models\ModuloAccion\Traits\Relationship;
class ModuloAccion extends Model
{
    use Scope,
	Attribute,
	Relationship;

	public $fillable   = [
		'id',
        'modulo_id', 
        'accion_id',
        'usuario_id',
        'alias',
	];
}
