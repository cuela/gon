<?php

namespace App\Http\Controllers\Backend\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuracion\Configuracion;
use Carbon\Carbon;

class ConfiguracionController extends Controller
{
    
    public function basico(Request $request)
    {
    	$lista = Configuracion::where('id', 'like', 'sitio%')
                ->get();
        foreach($lista as $objeto){
        	$campos[$objeto->id]=$objeto->valor;
        }
        return view('backend.configuracion.basico', ['campos'=>$campos]);
    }

    public function basicoStore(Request $request)
    {
    	$lista = Configuracion::where('id', 'like', 'sitio%')
                ->get();
        $inputs = $request->all();
        $imagen = $request->file('sitio_logo');
        $imagenSecundario = $request->file('sitio_logo_secundario');
        if(!is_null($imagen))
            $inputs['sitio_logo'] = self::subirImagen($imagen);
        if(!is_null($imagenSecundario))
            $inputs['sitio_logo_secundario'] = self::subirImagen($imagenSecundario);
        foreach($lista as $objeto){
        	if(isset($inputs[$objeto->id])){
        		Configuracion::where('id', $objeto->id)
            	->update(['valor' => $inputs[$objeto->id]]);
        	}
        }
        return redirect()->route('admin.configuracion.basico')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    public function subirImagen($archivo)
    {
        if(!is_null($archivo)){
                $nombreArchivo = 'logo.'.$archivo->getClientOriginalExtension();
                \Storage::disk('images')->put($nombreArchivo, \File::get($archivo));
        }
        return $nombreArchivo;
    }

}
