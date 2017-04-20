<?php

namespace App\Models\Clasificador;

use Illuminate\Database\Eloquent\Model;
use App\Models\Clasificador\Traits\Scope;
use App\Models\Clasificador\Traits\Attribute;
use App\Models\Clasificador\Traits\Relationship;

class Clasificador extends Model
{
    use Scope,
		Attribute,
		Relationship;

    public $fillable   = [
        'id',
        'nombre',
        'descripcion',
        'estado',
        'orden',
        'grupo',
    ];
}

            