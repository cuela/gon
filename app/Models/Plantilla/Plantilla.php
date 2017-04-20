<?php

namespace App\Models\Plantilla;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    public $fillable   = [
		    'id', 
                  'bloque', 
                  'tipo', 
                  'orden', 
                  'codigo', 
                  'tabla_datos', 
		];

}
