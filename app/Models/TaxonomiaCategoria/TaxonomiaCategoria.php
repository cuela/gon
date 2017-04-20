<?php

namespace App\Models\TaxonomiaCategoria;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaxonomiaCategoria\Traits\Scope;
use App\Models\TaxonomiaCategoria\Traits\Attribute;
use App\Models\TaxonomiaCategoria\Traits\Relationship;

class TaxonomiaCategoria extends Model
{
    use Scope,
		Attribute,
		Relationship;



    public $primaryKey = 'id';

    public $fillable   = ['id', 'nombre', 'descripcion'];

    public $incrementing  = false;
    
    public $timestamps    = false;
}
