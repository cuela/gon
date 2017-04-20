<?php

namespace App\Models\Fragmento;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fragmento\Traits\Scope;
use App\Models\Fragmento\Traits\Attribute;
use App\Models\Fragmento\Traits\Relationship;

class Fragmento extends Model
{
    use Scope,
		Attribute,
		Relationship;




    public $fillable   = ['id', 'categoria_id', 'nombre', 'descripcion', 'tipo','estado'];

    
    public $timestamps    = false;
}
