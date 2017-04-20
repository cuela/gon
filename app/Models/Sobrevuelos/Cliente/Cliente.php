<?php

namespace App\Models\Sobrevuelos\Cliente;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sobrevuelos\Cliente\Traits\Scope;
use App\Models\Sobrevuelos\Cliente\Traits\Attribute;
use App\Models\Sobrevuelos\Cliente\Traits\Relationship;

class Cliente extends Model
{
    use Scope,
		Attribute,
		Relationship;

    protected $connection = 'sobrevuelo';
    protected $table = 'cliente';

    public $fillable   = [
	    'id',
        'cod',
        'cod_oaci',
        'cod_contable',
        'nombre',
        'direccion',
        'telefono',
        'fax',
        'casilla',
        'email',
        'repr_legal',
        'pais_id',
        'ciudad_proc',
        'nit',
        'estado',
        'created_at',
    ];


}