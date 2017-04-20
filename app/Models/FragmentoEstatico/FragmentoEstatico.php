<?php

namespace App\Models\FragmentoEstatico;

use Illuminate\Database\Eloquent\Model;
use App\Models\FragmentoEstatico\Traits\Scope;
use App\Models\FragmentoEstatico\Traits\Attribute;
use App\Models\FragmentoEstatico\Traits\Relationship;
class FragmentoEstatico extends Model
{
    use Scope,
		Attribute,
		Relationship;

    public $fillable   = [
    		'id',
            'fragmento_id',
            'titulo',
            'titulo_formato',
            'imagen',
            'url', 
            'subtitulo',
            'resumen', 
            'orden',
            'estado',
            'miniatura',
            'destacado',
    ];
}
