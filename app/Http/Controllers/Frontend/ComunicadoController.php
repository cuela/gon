<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Contenido\Contenido;
use App\Models\Taxonomia\Taxonomia;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Site\SiteRepository;


class ComunicadoController extends Controller
{
	
	public function index()
	{
		
		$contenidos = Contenido::where('categoria_id','post')
		->where('estado',1)//1=publicado
		->where('taxonomia_id',3) //3=comunicados
		->orderBy('id', 'desc')
		->paginate(10);
		
		return view('frontend.comunicado.lista',[
			'contenidos' => $contenidos,
			'categorias' => SiteRepository::getCategorias(),
			'recientes' => SiteRepository::getUltimasEntradas(),
			'masvisitadas' => SiteRepository::getMasVisitados(),
		]);
	}

	public function comunicadoDetalle($id)
	{
		$contenido = Contenido::where('estado',1)//1=publicado
		->where('id',$id)
		->first();
		$contenido->cantidad_visita += 1;
		$contenido->save();


		return view('frontend.comunicado.detalle',[
			'contenido' => $contenido,
			'categorias' => SiteRepository::getCategorias(),
			'recientes' => SiteRepository::getUltimasEntradas(),
			'masvisitadas' => SiteRepository::getMasVisitados(),
		]);	
	}

	

	
}
