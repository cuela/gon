<?php

namespace App\Models\FragmentoCategoria;

use Illuminate\Database\Eloquent\Model;
use App\Models\FragmentoCategoria\Traits\Attribute;

class FragmentoCategoria extends Model
{
	use 
		Attribute;
    public $timestamps    = false;

    protected $fillable   = [
    	'id', 'nombre', 'tipo',
    ];
}
