<?php

namespace App\Models\Convocatoria\Traits;


trait Relationship
{
    public function convocatoriaMedias()
    {
        return $this->hasMany('App\Models\ConvocatoriaMedia\ConvocatoriaMedia');
    }
}