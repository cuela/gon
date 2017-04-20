<?php

namespace App\Models\Media\Traits;


trait RelationshipMedia
{
    public function convocatoriaMedias()
    {
        return $this->hasOne('App\Models\ConvocatoriaMedia\ConvocatoriaMedia');
    }

    public function contenidoMedias()
    {
        return $this->hasOne('App\Models\ContenidoMedia\ContenidoMedia');
    }
}