<?php

namespace App\Models\ModuloRol;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModuloRol\Traits\Scope;
use App\Models\ModuloRol\Traits\Attribute;
use App\Models\ModuloRol\Traits\Relationship;

class ModuloRol extends Model
{
    use Scope,
	Attribute,
	Relationship;

	public $fillable   = [
		'id',
        'modulo_id', 
        'rol_id',
	];
}
