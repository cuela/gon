<?php

namespace App\Models\SeguimientoDenuncia;

use Illuminate\Database\Eloquent\Model;
use App\Models\SeguimientoDenuncia\Traits\Scope;
use App\Models\SeguimientoDenuncia\Traits\Attribute;
use App\Models\SeguimientoDenuncia\Traits\Relationship;
class SeguimientoDenuncia extends Model
{
       use Scope,
		Attribute,
		Relationship;

		public $fillable   = [
			'id',
            'denuncia_id',
            'descripcion',
            'archivo',
            'estado',
		];
}