<?php

namespace App\Models\FragmentoEstatico\Traits;


trait Relationship
{
    public function fragmentosEstaticos()
    {
        return $this->belongsTo('App\Models\Fragmento\Fragmento');
    }
}