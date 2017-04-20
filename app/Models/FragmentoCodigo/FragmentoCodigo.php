<?php

namespace App\Models\FragmentoCodigo;

use Illuminate\Database\Eloquent\Model;
use App\Models\FragmentoCodigo\Traits\Scope;
use App\Models\FragmentoCodigo\Traits\Attribute;
use App\Models\FragmentoCodigo\Traits\Relationship;
class FragmentoCodigo extends Model
{
    use Scope,
		Attribute,
		Relationship;

    public $fillable   = [
    		'id',
            'fragmento_id',
            'titulo', 
            'contenido',
            'creado_por', 
            'orden',
            'estado',
    ];

}
