<?php

namespace App\Models\Denuncia;

use Illuminate\Database\Eloquent\Model;
use App\Models\Denuncia\Traits\Scope;
use App\Models\Denuncia\Traits\Attribute;
use App\Models\Denuncia\Traits\Relationship;

class Denuncia extends Model
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
            'codigo_correlativo',
            'denunciados',
            'descripcion',
            'usuario_creador',
            'usuario_modificador',
            'orden',
            'estado',
		];
}
			