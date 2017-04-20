<?php

namespace App\Models\Sobrevuelos\Sobrevuelo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sobrevuelos\Sobrevuelo\Traits\Scope;
use App\Models\Sobrevuelos\Sobrevuelo\Traits\Attribute;
use App\Models\Sobrevuelos\Sobrevuelo\Traits\Relationship;

class Sobrevuelo extends Model
{
    use Scope,
		Attribute,
		Relationship;

    protected $connection = 'sobrevuelo';
    protected $table = 'sobrevuelo';

    public $fillable   = [
        'id',
        'cliente_id',
        'fecha',
        'matricula',
        'modelo',
        'version',
        'peso',
        'vuelo',
        'origen',
        'destino',
        'control1',
        'control2',
        'ruta_id',
        'millas',
        'autorizacion_numero',
        'responsable',
        'fecha_registro',
        'fl_entrada',
        'fl_salida',
        'observacion',
        'estado',
        'importe',
        'ruta_ruta',
    ];


}