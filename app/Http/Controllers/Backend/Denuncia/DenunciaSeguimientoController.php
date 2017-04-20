<?php

namespace App\Http\Controllers\Backend\Denuncia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\SeguimientoDenuncia\SeguimientoDenuncia;
use App\Models\Denuncia\Denuncia;
use App\Http\Requests\Backend\DenunciaSeguimiento\ManageRequest;
use App\Http\Requests\Backend\DenunciaSeguimiento\StoreRequest;
use Carbon\Carbon;

class DenunciaSeguimientoController extends Controller
{
    
    public function index(ManageRequest $request)
    {
        $id  = $request->get('id');

        return view('backend.denuncia-seguimiento.index',[
            'denunciaId'=>$id
        ]);
    }

    
    public function create(ManageRequest $request)
    {
        $denunciaId  = $request->get('denunciaId');
        $denuncia = Denuncia::find($denunciaId); 
        return view('backend.denuncia-seguimiento.create',[
            'denunciaId' => $denunciaId,
            'denuncia' => $denuncia,
        ]);
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();
        $archivo = $request->file('archivo');
        if(!is_null($archivo))
            $campos = self::subirArchivoBoletin($archivo, $campos);
        
        $denunciaId = $request->get('denuncia_id');
        $objeto = SeguimientoDenuncia::create($campos);
        return redirect()->route('admin.denuncia.denunciaSeguimiento.index', ['id'=>$denunciaId])->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {  
        $seguimientoDenuncia = SeguimientoDenuncia::find($id);
        $denuncia = Denuncia::find($seguimientoDenuncia->denuncia_id);
        return view('backend.denuncia-seguimiento.edit',[
            'seguimientoDenuncia' => $seguimientoDenuncia,
            'denuncia' => $denuncia,
        ]);
    }

    
    public function update($id, ManageRequest $request)
    {
        $campos = $request->all();
        $seguimientoDenuncia = SeguimientoDenuncia::find($id);
        $denunciaId = $seguimientoDenuncia->denuncia_id;
        $archivo = $request->file('archivo');
        if(!is_null($archivo))
            $campos = self::subirArchivoBoletin($archivo, $campos);
        $seguimientoDenuncia->update($campos);
        
        return redirect()->route('admin.denuncia.denunciaSeguimiento.index', ['id'=>$denunciaId])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    public function show($id)
    {
        
    }

    
    public function destroy($id)
    {
        $seguimientoDenuncia = SeguimientoDenuncia::find($id);
        $denunciaId = $seguimientoDenuncia->denuncia_id;
        $seguimientoDenuncia->delete();
        return redirect()->route('admin.denuncia.denunciaSeguimiento.index',['id'=>$denunciaId])->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke(ManageRequest $request)
    {
        $denunciaId  = $request->get('denunciaId');
       
        return Datatables::of(self::getForDataTable($denunciaId))
            ->addColumn('actions', function($denuncia) {
                return $denuncia->action_buttons;
            })
            ->addColumn('_archivo', function($denuncia){
                if($denuncia->archivo)
                {
                    return '<a href="'.asset($denuncia->archivo).'" target="_blank">Descargar</a>';;
                }
            })
            ->addColumn('_estado', function($denuncia){
                if($denuncia->estado=='1'){
                    return '<span class="label label-primary">Activo</span>';;
                } 
                if($denuncia->estado=='0')
                {
                    return '<span class="label label-danger">Inactivo</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($denunciaId, $order_by = 'created_at', $sort = 'desc')
    {
        return SeguimientoDenuncia::where('denuncia_id', $denunciaId)->orderBy($order_by, $sort)
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
