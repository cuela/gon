<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\Odeco\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Odeco\Odeco;
use \Auth;
use \PDF;

class OdecoController extends Controller
{

    public function lista()
    {

        if(is_object(\Auth::user())){
            $listaOdeco = Odeco::where('usuario_creador',Auth::user()->id)->orderBy('created_at','desc')->get();
            return view('frontend.odeco.lista', [
                'listaOdeco' => $listaOdeco
            ]);
        } else {
            return view('frontend.permiso');
        }
        
    }

    public function crear()
    {
    	return view('frontend.odeco.crear');
    }

    public function guardar(StoreRequest $request)
    {
        $campos = $request->all();
        $maximo = is_null(Odeco::all()->max('orden'))?0:Odeco::all()->max('orden')+1;
        $campos['orden'] = $maximo;
        //$campos['usuario_creador'] = \Auth::user()->id;
        $campos['estado'] = 1;
        $objeto = Odeco::create($campos);
        return redirect()->route('frontend.odeco.detalle',['id'=>$objeto->id])->withFlashSuccess('Su denuncia fue registrada correctamente y fue enviada al área correspondiente');
    }

    public function detalle($id)
    {
    	$odeco = Odeco::find($id);
    	return view('frontend.odeco.detalle',[
    		'odeco' => $odeco
    	]);	
    }
}
