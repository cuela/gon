<?php

namespace App\Models\Taxonomia;

use Illuminate\Database\Eloquent\Model;
use App\Models\Taxonomia\Traits\TaxonomiaScope;
use App\Models\Taxonomia\Traits\TaxonomiaAttribute;
use App\Models\Taxonomia\Traits\TaxonomiaRelationship;

class Taxonomia extends Model
{
    use TaxonomiaScope,
		TaxonomiaAttribute,
		TaxonomiaRelationship;



    public $fillable   = [
	    'id', 
	    'padre_id', 
	    'nombre', 
	    'url_alias',
	    'imagen',
	    'descripcion',
	    'pagina_tamanio',
	    'seo_palabras_clave',
	    'seo_descripcion',
	    'contenidos',
	    'orden',
	    'categoria_id'
    ];


}
