<?php

namespace App\Models\CompraBoletin;

use Illuminate\Database\Eloquent\Model;
use App\Models\CompraBoletin\Traits\Scope;
use App\Models\CompraBoletin\Traits\Attribute;
use App\Models\CompraBoletin\Traits\Relationship;
class CompraBoletin extends Model
{
    use Scope,
		Attribute,
		Relationship;

	public $fillable   = [
		'id',
        'boletin_id',
        'nombre_completo',
        'pais_id',
        'correo',
        'usuario_id',
        'descripcion',
        'fecha_inicio_activacion',
        'fecha_fin_activacion',
        'estado',
        'papeleta_bancaria',
        'vigente',
	];
}


			