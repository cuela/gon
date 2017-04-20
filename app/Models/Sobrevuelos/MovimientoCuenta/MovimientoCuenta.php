<?php

namespace App\Models\Sobrevuelos\MovimientoCuenta;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sobrevuelos\MovimientoCuenta\Traits\Scope;
use App\Models\Sobrevuelos\MovimientoCuenta\Traits\Attribute;
use App\Models\Sobrevuelos\MovimientoCuenta\Traits\Relationship;
class MovimientoCuenta extends Model
{
    use Scope,
		Attribute,
		Relationship;

    protected $connection = 'sobrevuelo';
    protected $table = 'movimiento_cuenta';

    public $fillable   = [
        'id',
        'cliente_id',
        'fecha',
        'monto',
        'tipo_monto',
        'origen',
        'tipo',
        'glosa',
        'estado',
        'nota_debito_id',
        'numero_factura'
    ];
}



