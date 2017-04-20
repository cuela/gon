<?php

namespace App\Models\SeguimientoOdeco;

use Illuminate\Database\Eloquent\Model;
use App\Models\SeguimientoOdeco\Traits\Scope;
use App\Models\SeguimientoOdeco\Traits\Attribute;
use App\Models\SeguimientoOdeco\Traits\Relationship;
class SeguimientoOdeco extends Model
{
    use Scope,
		Attribute,
		Relationship;

		public $fillable   = [
			'id',
            'odeco_id',
            'descripcion',
            'archivo',
            'estado',
		];
}
