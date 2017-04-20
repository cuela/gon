<?php

namespace App\Models\Transparencia;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transparencia\GrupoTraits\GrupoScope;
use App\Models\Transparencia\GrupoTraits\GrupoAttribute;
use App\Models\Transparencia\GrupoTraits\GrupoRelationship;

class Grupo extends Model
{
    use GrupoScope,
		GrupoAttribute,
		GrupoRelationship;


    protected $fillable   = [
    	'id', 
    	'gestion_id',
		'titulo', 
		'descripcion', 
		'imagen', 
		'miniatura', 
		'orden',
		'estado',
		'destacado'
    ];
}


			
            
            
            
            
            
            
            