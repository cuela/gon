<?php

namespace App\Models\Transparencia\GrupoTraits;


trait GrupoRelationship
{
    public function gestion()
    {
        return $this->belongsTo('App\Models\Transparencia\Gestion');
    }
}