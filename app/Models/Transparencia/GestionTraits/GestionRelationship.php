<?php

namespace App\Models\Transparencia\GestionTraits;


trait GestionRelationship
{
    public function grupos()
    {
        return $this->hasMany('App\Models\Transparencia\Grupo');
    }
}