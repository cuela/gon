<?php

namespace App\Http\Controllers\Backend\Odeco;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Odeco\Odeco;
use App\Http\Requests\Backend\Odeco\ManageRequest;
use App\Http\Requests\Backend\Odeco\StoreRequest;
use Carbon\Carbon;

class OdecoController extends Controller
{
    
    public function index()
    {
        
        return view('backend.odeco.index');
    }

    
    public function create()
    {
        $maximo = is_null(Odeco::all()->max('orden'))?0:Odeco::all()->max('orden')+1;
        return view('backend.odeco.create',[
            'maximo' => $maximo
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();
        $objeto = Odeco::create($campos);
        return redirect()->route('admin.odeco.odeco.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $odeco = Odeco::find($id);
        
        return view('backend.odeco.edit',[
                'denuncia'=>$odeco,
                'maximo' => null
            ]);
    }

    public function show($id)
    {
        $odeco = Odeco::find($id);
        
        return view('backend.odeco.show',[
                'odeco'=>$odeco,
                'maximo' => null
            ]);
    }

    
    public function update($id, ManageRequest $request)
    {
        $inputs = $request->all();
        $odeco = Odeco::find($id);
        $odeco->update($inputs);
        
        return redirect()->route('admin.odeco.odeco.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $odeco = Odeco::find($id);
        $odeco->delete();
        return redirect()->route('admin.odeco.odeco.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(Odeco::all())
            ->addColumn('actions', function($odeco) {
                return $odeco->action_buttons;
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
            ->addColumn('_seguimiento', function($odeco){
                return '<a href="'.route('admin.odeco.odecoSeguimiento.index',['id'=>$odeco->id]).'">Ver Seguimiento</a>';
            })
            ->make(true);
    }
    
}
