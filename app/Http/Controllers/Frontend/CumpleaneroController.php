<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Persona\Persona;

class CumpleaneroController extends Controller
{
    public function lista()
    {
    	$listaPersona = Persona::orderBy('id', 'desc')
		->paginate(20);
        $listaCumpleaneros = Persona::where();
    	return view('frontend.cumpleanero.lista',[
    		'listaPersona' => $listaPersona
    	]);
    }
}
