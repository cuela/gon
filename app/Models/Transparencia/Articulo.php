<?php

namespace App\Models\Transparencia;

use Illuminate\Database\Eloquent\Model;

use App\Models\Transparencia\ArticuloTraits\ArticuloScope;
use App\Models\Transparencia\ArticuloTraits\ArticuloAttribute;
use App\Models\Transparencia\ArticuloTraits\ArticuloRelationship;

class Articulo extends Model
{
	use ArticuloScope,
		ArticuloAttribute,
		ArticuloRelationship;

    protected $fillable   = [
    	'id', 
    	'grupo_id',
		'usuario_id',
		'modificador_usuario_id',
		'titulo', 
		'subtitulo', 
		'url_alias', 
		'redireccionar_url', 
		'resumen', 
		'imagen', 
		'cuerpo',
		'miniatura',
		'orden',
		'estado',
		'destacado',
		'visibilidad'
    ];
}

