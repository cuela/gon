<?php

namespace App\Models\Contenido;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contenido\Traits\Scope;
use App\Models\Contenido\Traits\Attribute;
use App\Models\Contenido\Traits\Relationship;

class Contenido extends Model
{
    use Scope,
		Attribute,
		Relationship;


    public $fillable   = [
    		'id',
           'taxonomia_id',
           'usuario_id',
           'categoria_id',
           'nombre_usuario',
           'modificador_usuario_id',
           'modificador_nombre_usuario', 
           'cantidad_enfoque',
           'cantidad_favorito',
           'cantidad_visita',
           'cantidad_comentado',
           'cantidad_agregado',
           'cantidad_cuenta',
           'recomendar',
           'titular',
           'seguir',
           'bandera',
           'permitir_comentario',
           'clave', 
           'vista', 
           'diseno', 
           'orden',
           'visibilidad',
           'estado',
           'tipo_contenido',
           'seo_titulo', 
           'seo_palabras_clave', 
           'seo_descripcion', 
           'titulo', 
           'subtitulo', 
           'url_alias', 
           'redireccionar_url',
           'resumen',
           'imagen', 
           'imagenes', 
           'cuerpo', 
           'miniatura', 
    ];

}

