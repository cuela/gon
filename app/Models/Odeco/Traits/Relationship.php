<?php

namespace App\Models\Odeco\Traits;


trait Relationship
{
    public function convocatoriaMedias()
    {
        return $this->hasMany('App\Models\ConvocatoriaMedia\ConvocatoriaMedia');
    }
}