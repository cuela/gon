<?php

namespace App\Models\Modulo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo\Traits\Scope;
use App\Models\Modulo\Traits\Attribute;
use App\Models\Modulo\Traits\Relationship;

class Modulo extends Model
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
	];

	
}
