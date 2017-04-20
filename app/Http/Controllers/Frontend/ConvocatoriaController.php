<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Convocatoria\Convocatoria;
use Jenssegers\Date\Date;

class ConvocatoriaController extends Controller
{
    public function __construct()
    {
        Date::setLocale('es');
    }
    public function lista()
    {
    	$listaConvocatoria = Convocatoria::orderBy('orden', 'desc')
        ->where('estado',1)
		->paginate(15);
    	return view('frontend.convocatoria.lista',[
    		'listaConvocatoria' => $listaConvocatoria
    	]);
    }

    public function detalle($id)
    {
    	$convocatoria = Convocatoria::find($id);
    	return view('frontend.convocatoria.detalle',[
    		'convocatoria' => $convocatoria
    	]);	
    }
}
