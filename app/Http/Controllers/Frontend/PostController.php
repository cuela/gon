<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Contenido\Contenido;
use App\Models\Taxonomia\Taxonomia;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Site\SiteRepository;

class PostController extends Controller
{
	
	public function index()
	{
		
		$contenidos = Contenido::where('categoria_id','post')
		->where('estado','<>',1)//1=creado
		->orderBy('id', 'desc')
		->paginate(10);
		
		return view('frontend.post.lista',[
			'contenidos' => $contenidos,
			'categorias' => SiteRepository::getCategorias(),
			'recientes' => SiteRepository::getUltimasEntradas(),
			'masvisitadas' => SiteRepository::getMasVisitados(),
		]);
	}

	public function postDetalle($id)
	{
		$contenido = Contenido::where('estado','<>',1)//1=creado
		->where('id',$id)
		->first();
		if(is_object($contenido)){
			$contenido->cantidad_visita += 1;
			$contenido->save();
			
			return view('frontend.post.detalle',[
				'contenido' => $contenido,
				'categorias' => SiteRepository::getCategorias(),
				'recientes' => SiteRepository::getUltimasEntradas(),
				'masvisitadas' => SiteRepository::getMasVisitados(),
			]);	
		} else {
			return view('frontend.error');	
		}
		
	}

	public function postCategoria($taxonomia_id)
	{
		$contenidos = Contenido::where('categoria_id','post')
		->where('estado','<>',1)//1=creado
		->where('taxonomia_id',$taxonomia_id)
		->orderBy('id', 'desc')
		->paginate(10);
		$categorias = Taxonomia::join('contenidos', 'taxonomias.id', '=', 'contenidos.taxonomia_id')
		->where('taxonomias.categoria_id','post')
		->select(DB::raw('count(contenidos.id) as cantidad, taxonomias.id, taxonomias.nombre'))
		->groupBy('taxonomias.id', 'taxonomias.nombre')
		->get();

		$taxonomia = Taxonomia::where('id', $taxonomia_id)->first();

		$titulo = 'Lista de '.$taxonomia->nombre;
		
		return view('frontend.post.categoria',[
			'contenidos' => $contenidos,
			'categorias' => $categorias,
			'titulo' => $titulo,
		]);
	}

	public function buscar(Request $request){
		$texto = $request->get('buscar');
		$contenidos = Contenido::where('categoria_id','post')
		->where(function($query) use ($texto){
			return $query->where('titulo','ilike',"%$texto%")
			->orWhere('cuerpo','ilike',"%$texto%")
			->orWhere('resumen','ilike',"%$texto%")
			->orWhere('subtitulo','ilike',"%$texto%");
		})
		->where('estado','<>',1)//1=creado
		->orderBy('id', 'desc')
		->paginate(10);

		$titulo = $texto;

		return view('frontend.post.buscar',[
			'contenidos' => $contenidos,
			'categorias' => SiteRepository::getCategorias(),
			'recientes' => SiteRepository::getUltimasEntradas(),
			'masvisitadas' => SiteRepository::getMasVisitados(),
			'titulo' => $titulo,
		]);
		
	}

	
}
