<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu\MenuTraits\MenuScope;
use App\Models\Menu\MenuTraits\MenuAttribute;
use App\Models\Menu\MenuTraits\MenuRelationship;
use Carbon\Carbon;

class Menu extends Model
{
	use MenuScope,
		MenuAttribute,
		MenuRelationship;

    public $timestamps    = false;

    protected $fillable   = [
    	'id', 'padre_id', 'menu_categoria_id',
    	'nombre', 'url', 'destino',
    	'descripcion', 'imagen', 'estado',
    	'orden'
    ];
   
}
