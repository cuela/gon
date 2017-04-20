<?php

namespace App\Models\Transparencia;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transparencia\ArticuloMediaTraits\Scope;
use App\Models\Transparencia\ArticuloMediaTraits\Attribute;
use App\Models\Transparencia\ArticuloMediaTraits\Relationship;
class ArticuloMedia extends Model
{
    use Scope,
		Attribute,
		Relationship;

		public $fillable   = [
		    'id', 
            'articulo_id',
            'media_id',
            'titulo', 
            'resumen', 
		];
		public $timestamps    = false;
}
