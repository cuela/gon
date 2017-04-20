<?php

namespace App\Models\CompraBoletin\Traits;


trait Relationship
{
    public function convocatoriaMedias()
    {
        return $this->hasMany('App\Models\ConvocatoriaMedia\ConvocatoriaMedia');
    }
}