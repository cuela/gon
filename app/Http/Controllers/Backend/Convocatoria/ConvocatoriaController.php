<?php

namespace App\Http\Controllers\Backend\Convocatoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Convocatoria\Convocatoria;
use App\Models\ConvocatoriaMedia\ConvocatoriaMedia;
use App\Models\Media\Media;
use App\Http\Requests\Backend\Convocatoria\ManageRequest;
use App\Http\Requests\Backend\Convocatoria\StoreRequest;
use Carbon\Carbon;

class ConvocatoriaController extends Controller
{
    

    public function index()
    {
        
        return view('backend.convocatoria.index');
    }

    
    public function create()
    {
        $maximo = is_null(Convocatoria::all()->max('orden'))?0:Convocatoria::all()->max('orden')+1;
        return view('backend.convocatoria.create',[
            'maximo' => $maximo
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $inputs = $request->all();
        $inputs['fecha_inicio'] = Convocatoria::getDate($inputs['fecha_inicio']) ?: null;
        $inputs['fecha_fin'] = Convocatoria::getDate($inputs['fecha_fin']) ?: null;
        $objeto = Convocatoria::create($inputs);
        if(is_object($objeto)){
            $archivos = $request->file('archivo');
            if($request->hasFile('archivo'))
            {
                foreach ($archivos as $archivo) {
                    $resultado = self::subirImagen($archivo);
                    if($resultado){
                        $convocatoriaMedia = new ConvocatoriaMedia;
                        $convocatoriaMedia->convocatoria_id=$objeto->id;
                        $convocatoriaMedia->media_id=$resultado->id;
                        $convocatoriaMedia->save();
                    } 
                }
            }
        }
        return redirect()->route('admin.convocatoria.convocatoria.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   
        $convocatoria = Convocatoria::find($id);
        
        

        $listaArchivos = ConvocatoriaMedia::where('convocatoria_id', $id)
               ->get();
        $listaMedia=[];
        if(count($listaArchivos)>0){
            foreach ($listaArchivos as $convocatoriaMedia) {
                $listaMedia[] = $convocatoriaMedia->media;
            }
        }
        if($convocatoria->fecha_inicio){
            $fechaTemp = $convocatoria->fecha_inicio.' '.$convocatoria->hora_inicio;
            //$convocatoria->hora_inicio = date('h:i A', strtotime($fechaTemp));
            $convocatoria->fecha_inicio = date("d/m/Y", strtotime($convocatoria->fecha_inicio));
        }
        if($convocatoria->fecha_fin){
            $fechaTemp = $convocatoria->fecha_fin.' '.$convocatoria->hora_fin;
            //$convocatoria->hora_fin = date('h:i A', strtotime($fechaTemp));
            $convocatoria->fecha_fin = date("d/m/Y", strtotime($convocatoria->fecha_fin));
            
        }

        return view('backend.convocatoria.edit',[
                'convocatoria'=>$convocatoria,
                'listaMedia'=>$listaMedia,
                'maximo' => null
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
        $inputs = $request->all();
        $inputs['fecha_inicio'] = Convocatoria::getDate($inputs['fecha_inicio']) ?: null;
        $inputs['fecha_fin'] = Convocatoria::getDate($inputs['fecha_fin']) ?: null;
        $convocatoria = Convocatoria::find($id);
        $convocatoria->update($inputs);
        if(is_object($convocatoria)){
            $archivos = $request->file('archivo');
            if($request->hasFile('archivo'))
            {
                foreach ($archivos as $archivo) {
                    $resultado = self::subirImagen($archivo);
                    if($resultado){
                        $convocatoriaMedia = new ConvocatoriaMedia;
                        $convocatoriaMedia->convocatoria_id=$convocatoria->id;
                        $convocatoriaMedia->media_id=$resultado->id;
                        $convocatoriaMedia->save();
                    } 
                }
            }
        }
        return redirect()->route('admin.convocatoria.convocatoria.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $convocatoria = Convocatoria::find($id);
        $convocatoria->delete();
        return redirect()->route('admin.convocatoria.convocatoria.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($fragmento) {
                return $fragmento->action_buttons;
            })
            ->addColumn('_estado', function($menu){
                if($menu->estado=='1'){
                    return '<span class="label label-success">Habilitado</span>';;
                } else {
                    return '<span class="label label-warning">Deshabilitado</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'asc')
    {
        return Convocatoria::orderBy($order_by, $sort)
               ->get();
    }

    public function subirImagen($archivo)
    {
        
        if(!is_null($archivo)){
            $uniqid  = uniqid();
            $nombre = Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->second.$uniqid.'.'.$archivo->getClientOriginalExtension();
            $disco = 'files';
            $media = new Media;
            $media->nombre_archivo = $nombre;
            $media->nombre_original = $archivo->getClientOriginalName();
            $media->ruta = 'uploads/'.$disco;
            $media->tipo = $archivo->getClientOriginalExtension();
            $media->tamanio = $archivo->getSize();
            $media->orden = 0;
            $media->estado = 1;
            $resultado = $media->save();
            \Storage::disk($disco)->put($nombre, \File::get($archivo));
            return $media;
        }
            return false;
    }
}
