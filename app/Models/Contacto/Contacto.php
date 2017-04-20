<?php

namespace App\Models\Contacto;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contacto\Traits\Scope;
use App\Models\Contacto\Traits\Attribute;
use App\Models\Contacto\Traits\Relationship;

class Contacto extends Model
{
    use Scope,
		Attribute,
		Relationship;


    public $fillable   = [
    		'nombres',
			'telefono',
			'correo',
			'empresa',
			'pais_id',
			'asunto',
			'solicitud',
			'estado',
    ];
}









