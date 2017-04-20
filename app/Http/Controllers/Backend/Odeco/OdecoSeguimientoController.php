<?php

namespace App\Http\Controllers\Backend\Odeco;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\SeguimientoOdeco\SeguimientoOdeco;
use App\Models\Odeco\Odeco;
use App\Http\Requests\Backend\OdecoSeguimiento\ManageRequest;
use App\Http\Requests\Backend\OdecoSeguimiento\StoreRequest;
use Carbon\Carbon;

class OdecoSeguimientoController extends Controller
{
    
    public function index(ManageRequest $request)
    {
        $id  = $request->get('id');

        return view('backend.odeco-seguimiento.index',[
            'odecoId'=>$id
        ]);
    }

    
    public function create(ManageRequest $request)
    {
        $odecoId  = $request->get('odecoId');
        $odeco = Odeco::find($odecoId); 
        return view('backend.odeco-seguimiento.create',[
            'odecoId' => $odecoId,
            'odeco' => $odeco,
        ]);
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();
        $archivo = $request->file('archivo');
        if(!is_null($archivo))
            $campos = self::subirArchivoBoletin($archivo, $campos);
        
        $odecoId = $request->get('odeco_id');
        $objeto = SeguimientoOdeco::create($campos);
        return redirect()->route('admin.odeco.odecoSeguimiento.index', ['id'=>$odecoId])->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {  
        $seguimientoOdeco = SeguimientoOdeco::find($id);
        $odeco = Odeco::find($seguimientoOdeco->odeco_id);
        return view('backend.odeco-seguimiento.edit',[
            'seguimientoOdeco' => $seguimientoOdeco,
            'odeco' => $odeco,
        ]);
    }

    
    public function update($id, ManageRequest $request)
    {
        $campos = $request->all();
        $seguimientoOdeco = SeguimientoOdeco::find($id);
        $odecoId = $seguimientoOdeco->odeco_id;
        $archivo = $request->file('archivo');
        if(!is_null($archivo))
            $campos = self::subirArchivoBoletin($archivo, $campos);
        $seguimientoOdeco->update($campos);
        
        return redirect()->route('admin.odeco.odecoSeguimiento.index', ['id'=>$odecoId])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    public function show($id)
    {
        
    }

    
    public function destroy($id)
    {
        $seguimientoOdeco = SeguimientoOdeco::find($id);
        $odecoId = $seguimientoOdeco->odeco_id;
        $seguimientoOdeco->delete();
        return redirect()->route('admin.odeco.odecoSeguimiento.index',['id'=>$odecoId])->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke(ManageRequest $request)
    {
        $odecoId  = $request->get('odecoId');
       
        return Datatables::of(self::getForDataTable($odecoId))
            ->addColumn('actions', function($odeco) {
                return $odeco->action_buttons;
            })
            ->addColumn('_archivo', function($odeco){
                if($odeco->archivo)
                {
                    return '<a href="'.asset($odeco->archivo).'" target="_blank">Descargar</a>';;
                }
            })
            ->addColumn('_estado', function($odeco){
                if($odeco->estado=='1'){
                    return '<span class="label label-primary">Activo</span>';;
                } 
                if($odeco->estado=='0')
                {
                    return '<span class="label label-danger">Inactivo</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($odecoId, $order_by = 'created_at', $sort = 'desc')
    {
        return SeguimientoOdeco::where('odeco_id', $odecoId)->orderBy($order_by, $sort)
               ->get();
    }

    public function subirArchivoBoletin($archivo, $campos)
    {
        if(!is_null($archivo)){
            $nombre = Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->second;
            $campos['archivo'] = 'uploads/'.$nombre.'.'.$archivo->getClientOriginalExtension();
                $nombreArchivo = $nombre.'.'.$archivo->getClientOriginalExtension();
                \Storage::disk('uploads')->put($nombreArchivo, \File::get($archivo));
        }
        return $campos;
    }
    
}
