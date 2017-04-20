<?php

namespace App\Models\Transparencia\ArticuloMediaTraits;


trait Relationship
{
    public function media()
    {
        return $this->belongsTo('App\Models\Media\Media');
    }

    public function convocatoria()
    {
        return $this->belongsTo('App\Models\Convocatoria\Convocatoria');
    }
}