<?php

namespace App\Models\Convocatoria;

use Illuminate\Database\Eloquent\Model;
use App\Models\Convocatoria\Traits\Scope;
use App\Models\Convocatoria\Traits\Attribute;
use App\Models\Convocatoria\Traits\Relationship;

class Convocatoria extends Model
{
    use Scope,
		Attribute,
		Relationship;

		public $fillable   = [
			'id', 
            'titulo', 
            'descripcion',
            'creado_por',
            'fecha_inicio',
            'fecha_fin',
            'hora_inicio',
            'hora_fin',
            'lugar',
            'orden',
            'estado',
            'resumen'
		];
}
