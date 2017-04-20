<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transparencia\Gestion;
use App\Models\Transparencia\Grupo;
use App\Models\Transparencia\Articulo;

class TransparenciaController extends Controller
{
	public function index()
	{
		$listaGestiones = Gestion::where('estado',1)->get();
		$gestion='';
		return view('frontend.transparencia.index',[
    		'listaGestiones' => $listaGestiones,
			'gestion' => $gestion,
    	]);
	}
    public function listaCategoria($gestionId)
    {
    	$listaGestiones = Gestion::where('estado',1)->get();
    	$gestion = Gestion::find($gestionId);
    	$listaCategoria = Grupo::where('gestion_id', $gestionId)->where('estado',1)->orderBy('orden', 'desc')->get();
    	return view('frontend.transparencia.index',[
    		'listaGestiones' => $listaGestiones,
    		'listaCategoria' => $listaCategoria,
    		'gestion' => $gestion,
    	]);
    }

    public function listaArticulo($gestionId, $grupoId)
    {
    	$listaArticulo = Articulo::where('grupo_id', $grupoId)->where('estado','<>',1)->orderBy('orden', 'desc')->paginate(5);
    	$gestion = Gestion::find($gestionId);
    	$categoria = Grupo::find($grupoId);
    	$listaCategoria = Grupo::where('gestion_id', $gestionId)->where('estado',1)->orderBy('orden', 'desc')->get();
    	return view('frontend.transparencia.listaArticulo',[
    		'listaArticulo' => $listaArticulo,
    		'listaCategoria' => $listaCategoria,
    		'gestion' => $gestion,
    		'categoria' => $categoria,
    	]);	
    }

    public function detalleArticulo($gestionId, $grupoId, $articuloId)
    {
    	$articulo = Articulo::find($articuloId);
    	$gestion = Gestion::find($gestionId);
    	$categoria = Grupo::find($grupoId);
    	$listaCategoria = Grupo::where('gestion_id', $gestionId)->where('estado',1)->orderBy('orden', 'desc')->get();
    	return view('frontend.transparencia.detalleArticulo',[
    		'articulo' => $articulo,
    		'listaCategoria' => $listaCategoria,
    		'gestion' => $gestion,
    		'categoria' => $categoria,
    	]);		
    }
}
