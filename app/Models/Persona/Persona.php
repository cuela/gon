<?php

namespace App\Models\Persona;

use Illuminate\Database\Eloquent\Model;
use App\Models\Persona\Traits\Scope;
use App\Models\Persona\Traits\Attribute;
use App\Models\Persona\Traits\Relationship;

class Persona extends Model
{
	use Scope,
		Attribute,
		Relationship;

    public $fillable   = [
	    'id', 
	    'nombre',
        'apellido_paterno',
        'apellido_materno',
        'estado_civil',
        'numero_cedula',
        'fecha_nacimiento',
        'foto',
        'estado',
        'orden',
    ];
}


			