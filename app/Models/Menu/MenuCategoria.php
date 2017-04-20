<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu\MenuCategoriaTraits\MenuCategoriaScope;
use App\Models\Menu\MenuCategoriaTraits\MenuCategoriaAttribute;
use App\Models\Menu\MenuCategoriaTraits\MenuCategoriaRelationship;

class MenuCategoria extends Model
{
	use MenuCategoriaScope,
		MenuCategoriaAttribute,
		MenuCategoriaRelationship;

    
    protected $table;

    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'nombre', 'descripcion'];

    public $incrementing  = false;
    
    public $timestamps    = false;


    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'menu_categorias';
    }
}
