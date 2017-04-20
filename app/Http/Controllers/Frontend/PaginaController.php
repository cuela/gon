<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Contenido\Contenido;
use App\Models\Taxonomia\Taxonomia;
use Illuminate\Http\Request;


class PaginaController extends Controller
{
	
	public function index()
	{
		
		$contenidos = Contenido::where('categoria_id','page')
		->where('estado',3)//3= publicado
		->orderBy('id', 'desc')
		->paginate(10);

		$categorias = Taxonomia::join('contenidos', 'taxonomias.id', '=', 'contenidos.taxonomia_id')
		->where('taxonomias.categoria_id','page')
		->select(DB::raw('count(contenidos.id) as cantidad, taxonomias.id, taxonomias.nombre'))
		->groupBy('taxonomias.id', 'taxonomias.nombre')
		->get();

		$recientes = Contenido::where('estado',3)//3=publicado
		->where('categoria_id','page')
		->orderBy('id', 'desc')
		->limit(5)
		->get();

		$masvisitadas = Contenido::where('estado',3)//3=publicado
		->where('categoria_id','page')
		->orderBy('cantidad_visita', 'desc')
		->limit(5)
		->get();
		
		return view('frontend.pagina.lista',[
			'contenidos' => $contenidos,
			'categorias' => $categorias,
			'recientes' => $recientes,
			'masvisitadas' => $masvisitadas,
		]);
	}

	public function paginaDetalle($id)
	{
		$contenido = Contenido::where('estado',3)//3=publicado
		->where('id',$id)
		->first();
		if(is_object($contenido)){
			$contenido->cantidad_visita += 1;
			$contenido->save();
			return view('frontend.pagina.detalle',[
				'contenido' => $contenido,
			]);	
		}else{
			return view('frontend.error');
		}
	}

	public function paginaCategoria($taxonomia_id)
	{
		$contenidos = Contenido::where('categoria_id','page')
		->where('estado',1)//1=publicado
		->where('visibilidad',1)
		->where('taxonomia_id',$taxonomia_id)
		->orderBy('id', 'desc')
		->paginate(10);
		$categorias = Taxonomia::join('contenidos', 'taxonomias.id', '=', 'contenidos.taxonomia_id')
		->where('taxonomias.categoria_id','page')
		->select(DB::raw('count(contenidos.id) as cantidad, taxonomias.id, taxonomias.nombre'))
		->groupBy('taxonomias.id', 'taxonomias.nombre')
		->get();

		$taxonomia = Taxonomia::where('id', $taxonomia_id)->first();

		$titulo = 'Categoría: '.$taxonomia->nombre;
		
		return view('frontend.pagina.lista',[
			'contenidos' => $contenidos,
			'categorias' => $categorias,
			'titulo' => $titulo,
		]);
	}

	public function buscar(Request $request){
		$texto = $request->get('buscar');
		$contenidos = Contenido::where('categoria_id','page')
		->where('estado',1)//1=publicado
		->where('visibilidad',1)
		->where('cuerpo', 'like', '%'.$texto.'%') 
		->orderBy('id', 'desc')
		->paginate(10);

		$categorias = Taxonomia::join('contenidos', 'taxonomias.id', '=', 'contenidos.taxonomia_id')
		->where('taxonomias.categoria_id','page')
		->select(DB::raw('count(contenidos.id) as cantidad, taxonomias.id, taxonomias.nombre'))
		->groupBy('taxonomias.id', 'taxonomias.nombre')
		->get();

		$recientes = Contenido::where('estado',1)//1=publicado
		->where('categoria_id','page')
		->where('visibilidad',1)
		->orderBy('id', 'desc')
		->limit(5)
		->get();

		$masvisitadas = Contenido::where('estado',1)//1=publicado
		->where('categoria_id','page')
		->where('visibilidad',1)
		->orderBy('cantidad_visita', 'desc')
		->limit(5)
		->get();

		$titulo = 'Buscando: '.$texto;

		return view('frontend.pagina.lista',[
			'contenidos' => $contenidos,
			'categorias' => $categorias,
			'recientes' => $recientes,
			'masvisitadas' => $masvisitadas,
			'titulo' => $titulo,
		]);
		
	}

	
}
