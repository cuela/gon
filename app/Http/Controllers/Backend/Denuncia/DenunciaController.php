<?php

namespace App\Http\Controllers\Backend\Denuncia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Denuncia\Denuncia;
use App\Http\Requests\Backend\Denuncia\ManageRequest;
use App\Http\Requests\Backend\Denuncia\StoreRequest;
use Carbon\Carbon;

class DenunciaController extends Controller
{
    
    public function index()
    {
        
        return view('backend.denuncia.index');
    }

    
    public function create()
    {
        $maximo = is_null(Denuncia::all()->max('orden'))?0:Denuncia::all()->max('orden')+1;
        return view('backend.denuncia.create',[
            'maximo' => $maximo
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();
        $objeto = Denuncia::create($campos);
        return redirect()->route('admin.denuncia.denuncia.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $denuncia = Denuncia::find($id);
        
        return view('backend.denuncia.edit',[
                'denuncia'=>$denuncia,
                'maximo' => null
            ]);
    }

    
    public function update($id, ManageRequest $request)
    {
        $inputs = $request->all();
        $denuncia = Denuncia::find($id);
        $denuncia->update($inputs);
        
        return redirect()->route('admin.denuncia.denuncia.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    public function show($id)
    {
        $denuncia = Denuncia::find($id);
        
        return view('backend.denuncia.show',[
                'denuncia'=>$denuncia,
                'maximo' => null
            ]);
    }

    
    public function destroy($id)
    {
        $denuncia = Denuncia::find($id);
        $denuncia->delete();
        return redirect()->route('admin.denuncia.denuncia.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($denuncia) {
                return $denuncia->action_buttons;
            })
            ->addColumn('_nombre', function($denuncia){
                return $denuncia->nombres.' '.$denuncia->apellido_paterno.' '.$denuncia->apellido_materno;
            })
            ->addColumn('_estado', function($denuncia){

                if($denuncia->estado=='1'){
                    return '<span class="label label-danger">Creado</span>';;
                } 
                if($denuncia->estado=='2')
                {
                    return '<span class="label label-warning">Recepcionado</span>';;
                }
                if($denuncia->estado=='3')
                {
                    return '<span class="label label-info">Proceso</span>';;
                }
                if($denuncia->estado=='4')
                {
                    return '<span class="label label-success">Finalizado</span>';;
                }
            })
            ->addColumn('_seguimiento', function($denuncia){
                return '<a href="'.route('admin.denuncia.denunciaSeguimiento.index',['id'=>$denuncia->id]).'">Ver Seguimiento</a>';
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'desc')
    {
        return Denuncia::orderBy($order_by, $sort)
               ->get();
    }
    
}
