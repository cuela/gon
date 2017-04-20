<?php

namespace App\Models\Odeco;

use Illuminate\Database\Eloquent\Model;
use App\Models\Odeco\Traits\Scope;
use App\Models\Odeco\Traits\Attribute;
use App\Models\Odeco\Traits\Relationship;
class Odeco extends Model
{
    use Scope,
		Attribute,
		Relationship;

		public $fillable   = [
			'id',
            'nombres',
            'apellido_paterno',
            'apellido_materno',
            'carnet',
            'telefono',
            'correo',
            'denuncia',
            'usuario_creador',
            'usuario_modificador',
            'orden',
            'estado',
		];
}