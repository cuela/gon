<?php

namespace App\Models\ConvocatoriaMedia;

use Illuminate\Database\Eloquent\Model;
use App\Models\ConvocatoriaMedia\Traits\Scope;
use App\Models\ConvocatoriaMedia\Traits\Attribute;
use App\Models\ConvocatoriaMedia\Traits\Relationship;
class ConvocatoriaMedia extends Model
{
    use Scope,
		Attribute,
		Relationship;

		public $fillable   = [
		    'id', 
            'convocatoria_id',
            'media_id',
            'titulo', 
            'resumen', 
		];
		public $timestamps    = false;
}
