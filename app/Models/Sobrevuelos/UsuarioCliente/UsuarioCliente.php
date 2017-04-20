<?php

namespace App\Models\Sobrevuelos\UsuarioCliente;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sobrevuelos\UsuarioCliente\Traits\Scope;
use App\Models\Sobrevuelos\UsuarioCliente\Traits\Attribute;
use App\Models\Sobrevuelos\UsuarioCliente\Traits\Relationship;

class UsuarioCliente extends Model
{
    use Scope,
		Attribute,
		Relationship;

    public $fillable   = [
        'id',
        'cliente_id',
        'usuario_id',
    ];
}
