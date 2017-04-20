<?php

namespace App\Models\CategoriaUsuario;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaUsuario\Traits\Scope;
use App\Models\CategoriaUsuario\Traits\Attribute;
use App\Models\CategoriaUsuario\Traits\Relationship;

class CategoriaUsuario extends Model
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
