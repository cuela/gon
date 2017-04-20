<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\Denuncia\StoreRequest;
use App\Http\Requests\Backend\Denuncia\ManageRequest;
use App\Http\Controllers\Controller;
use App\Models\Denuncia\Denuncia;
use \Auth;
use \PDF;

class DenunciaController extends Controller
{

    public function lista()
    {
        if(is_object(\Auth::user())){
            $listaDenuncia = Denuncia::where('usuario_creador',\Auth::user()->id)->orderBy('created_at','desc')->get();
            return view('frontend.denuncia.lista', [
                'listaDenuncia' => $listaDenuncia
            ]);
        } else {
            return view('frontend.permiso');
        }
    }

    public function crear()
    {
    	return view('frontend.denuncia.crear');
    }

    public function guardar(StoreRequest $request)
    {
        $campos = $request->all();
        $maximo = is_null(Denuncia::all()->max('codigo_correlativo'))?1:Denuncia::all()->max('codigo_correlativo')+1;
        $campos['codigo_correlativo'] = $maximo;
        //$campos['usuario_creador'] = \Auth::user()->id;
        $campos['estado'] = 1;
        $objeto = Denuncia::create($campos);
        //\Session::set('denunciaId',$objeto->id);
        return redirect()->route('frontend.denuncia.detalle',['id'=>$objeto->id])->withFlashSuccess('Su denuncia fue registrada correctamente, inprima el formulario y luego envíe el formulario al área de denuncias de AASANA');
    }

    public function detalle($id)
    {
    	$denuncia = Denuncia::find($id);
    	return view('frontend.denuncia.detalle',[
    		'denuncia' => $denuncia
    	]);	
    }

    public function descargar($id)
    {
        $denuncia = Denuncia::find($id);
        $logo = public_path().'/img/frontend/logo.png';
        $fecha = date('d-m-Y');
        $pdf = PDF::loadView('frontend.denuncia.pdf', [
            'denuncia'=>$denuncia, 
            'logo'=>$logo,
            'fecha'=>$fecha
            ]);
        return $pdf->download($denuncia->nombres.$denuncia->codigo_correlativo.'.pdf'); 
    }
}
