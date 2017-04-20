<?php

namespace App\Models\ContenidoMedia\Traits;


trait Relationship
{
    public function media()
    {
        return $this->belongsTo('App\Models\Media\Media');
    }
}