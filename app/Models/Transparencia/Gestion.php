<?php

namespace App\Models\Transparencia;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transparencia\GestionTraits\GestionScope;
use App\Models\Transparencia\GestionTraits\GestionAttribute;
use App\Models\Transparencia\GestionTraits\GestionRelationship;
class Gestion extends Model
{
    use GestionScope,
		GestionAttribute,
		GestionRelationship;

    public $timestamps    = false;

    protected $fillable   = [
    	'id', 'gestion', 'estado',    	'orden'
    ];
}
