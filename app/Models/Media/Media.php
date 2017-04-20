<?php

namespace App\Models\Media;

use Illuminate\Database\Eloquent\Model;
use App\Models\Media\Traits\ScopeMedia;
use App\Models\Media\Traits\AttributeMedia;
use App\Models\Media\Traits\RelationshipMedia;
class Media extends Model
{
    use ScopeMedia,
		AttributeMedia,
		RelationshipMedia;

		public $fillable   = [
		    'id', 
                  'nombre_archivo', 
                  'nombre_original', 
                  'ruta', 
                  'tipo', 
                  'tamanio',
                  'orden',
                  'estado',
		];
}
