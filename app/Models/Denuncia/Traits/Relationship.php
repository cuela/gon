<?php

namespace App\Models\Denuncia\Traits;


trait Relationship
{
    public function convocatoriaMedias()
    {
        return $this->hasMany('App\Models\ConvocatoriaMedia\ConvocatoriaMedia');
    }
}