<?php

namespace App\Models\CategoriaBoletin\Traits;


trait Relationship
{
    public function convocatoriaMedias()
    {
        return $this->hasMany('App\Models\ConvocatoriaMedia\ConvocatoriaMedia');
    }
}