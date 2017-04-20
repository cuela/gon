<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Contenido\Contenido;
use App\Models\Fragmento\Fragmento;
use App\Models\FragmentoEstatico\FragmentoEstatico;
use App\Models\Taxonomia\Taxonomia;
use Illuminate\Http\Request;


class FragmentoEstaticoController extends Controller
{
	
	public function index($id)
	{
		$fragmento = Fragmento::find($id);
		switch ($fragmento->categoria_id) {
			case 8:
				$vista = 'galeria';
				break;

			case 9:
				$vista = 'video';
				break;
			
			default:
				$vista = 'lista';
				break;
		}
		$contenidos = FragmentoEstatico::where('fragmento_id',$id)
			->where('estado','1')->orderBy('orden')->get(); 
		$fragmento = Fragmento::find($id);
		return view('frontend.fragmentoEstatico.'.$vista,[
			'contenidos' => $contenidos,
			'fragmento' => $fragmento,
		]);
	}
}