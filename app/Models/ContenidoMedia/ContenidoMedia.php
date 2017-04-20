<?php

namespace App\Models\ContenidoMedia;

use Illuminate\Database\Eloquent\Model;

use App\Models\ContenidoMedia\Traits\Scope;
use App\Models\ContenidoMedia\Traits\Attribute;
use App\Models\ContenidoMedia\Traits\Relationship;

class ContenidoMedia extends Model
{
	use Scope,
		Attribute,
		Relationship;
    public $fillable   = [
	    'id', 
        'contenido_id',
        'media_id',
        'titulo', 
        'resumen', 
	];
	public $timestamps    = false;
}
