<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Model;
use App\Models\Configuracion\Traits\Scope;
use App\Models\Configuracion\Traits\Attribute;
use App\Models\Configuracion\Traits\Relationship;
class Configuracion extends Model
{
    use Scope,
		Attribute,
		Relationship;



    public $primaryKey = 'id';

    public $fillable   = ['id', 'valor'];

    public $incrementing  = false;
}
