<?php

namespace App\Models\Boletin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Boletin\Traits\Scope;
use App\Models\Boletin\Traits\Attribute;
use App\Models\Boletin\Traits\Relationship;
class Boletin extends Model
{
   use Scope,
	Attribute,
	Relationship;

	public $fillable   = [
		'id',
        'titulo', 
        'descripcion',
        'fecha_publicacion',
        'archivo',
        'imagen',
        'miniatura', 
        'usuario_creador',
        'orden',
        'estado',
        'visibilidad',
        'categoria_boletin_id',
	];
}
