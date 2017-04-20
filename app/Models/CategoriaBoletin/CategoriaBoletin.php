<?php

namespace App\Models\CategoriaBoletin;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaBoletin\Traits\Scope;
use App\Models\CategoriaBoletin\Traits\Attribute;
use App\Models\CategoriaBoletin\Traits\Relationship;

class CategoriaBoletin extends Model
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
        'padre_id',
	];
}
