<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\FragmentoEstatico\FragmentoEstatico;
use App\Models\Convocatoria\Convocatoria;
use App\Http\Requests\Frontend\ContactoRequest;

use App\Models\Contenido\Contenido;
use App\Models\Contacto\Contacto;
use App\Repositories\Frontend\Site\SiteRepository;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

use App\Models\Sobrevuelos\Cliente\Cliente;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
	public function __construct()
    {
        Date::setLocale('es');
    }
	
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		
		$contenidos = DB::table('contenidos')
		->where('estado',3)//3=publicado
		->where('titular',1)
		->orderBy('id', 'desc')
		->limit(5)
		->get();

		$enlacesInteres = FragmentoEstatico::where('fragmento_id',4)->get();

		$noticias = Contenido::where('taxonomia_id',1)//1 noticias	
		->where('estado',3)//3=publicado
		->where('titular', '<>', 1)
		->orderBy('id', 'desc')
		->paginate(5);

		$listaGaleria = SiteRepository::getDatosBloque('bloqueGaleria');
		
		$listaVideo = SiteRepository::getDatosBloque('bloqueVideo');

		$convocatorias = Convocatoria::where('estado',1)
			->orderBy('created_at','desc')
			->limit(3)
			->get();		

		$sliders = FragmentoEstatico::where('fragmento_id',2)->get();
		

		return view('frontend.index',[
			'contenidos' => $contenidos,
			'enlacesInteres'=>$enlacesInteres,
			'noticias'=>$noticias,
			'convocatorias'=>$convocatorias,
			'sliders'=>$sliders,
			'listaGaleria'=>$listaGaleria,
			'listaVideo'=>$listaVideo,
		]);
	}

	public function buscar(Request $request)
	{
		$texto = $request->get('texto');
		$contenidos = Contenido::where('estado',3)//3=publicado
		->where(function($query) use ($texto){
			return $query->where('titulo','ilike',"%$texto%")
			->orWhere('cuerpo','ilike',"%$texto%")
			->orWhere('resumen','ilike',"%$texto%")
			->orWhere('subtitulo','ilike',"%$texto%");
		})
		->orderBy('id', 'desc')
		->paginate(10);

		return view('frontend.buscar',[
			'contenidos' => $contenidos,
			'texto' => $texto,
		]);

	}
	public function macros()
	{
		return view('frontend.macros');
	}

	public function contacto()
	{
		return view('frontend.contacto');
	}

	public function guardarContacto(ContactoRequest $request)
	{
		$campos = $request->all();
		$campos['estado']=1;
		$objeto = Contacto::create($campos);
        return redirect()->route('frontend.contacto')->withFlashSuccess('Datos enviados Correctamente');

	}
}
