<?php

namespace App\Models\Sobrevuelos\NotaDebito;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sobrevuelos\NotaDebito\Traits\Scope;
use App\Models\Sobrevuelos\NotaDebito\Traits\Attribute;
use App\Models\Sobrevuelos\NotaDebito\Traits\Relationship;

class NotaDebito extends Model
{
    use Scope,
		Attribute,
		Relationship;

    protected $connection = 'sobrevuelo';
    protected $table = 'nota_debito';

    public $fillable   = [
        'id',
        'cliente_id',
        'gestion',
        'mes',
        'numero',
        'periodo',
        'fecha',
        'glosa',
        'monto1',
        'saldo1',
        'monto2',
        'fecha_entrega',
        'fecha_vencimiento',
        'estado',
        'formula',
        'tipocambio',
    ];


}