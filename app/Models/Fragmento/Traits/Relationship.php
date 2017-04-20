<?php

namespace App\Models\Fragmento\Traits;


trait Relationship
{
    public function fragmento()
    {
        return $this->hasOne('App\Models\FragmentoEstatico\FragmentoEstatico');
    }
}