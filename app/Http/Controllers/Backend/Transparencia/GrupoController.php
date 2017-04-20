<?php

namespace App\Http\Controllers\Backend\Transparencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Transparencia\Grupo;
use App\Models\Transparencia\Gestion;
use App\Http\Requests\Backend\Grupo\ManageRequest;
use App\Http\Requests\Backend\Grupo\StoreRequest;
use Carbon\Carbon;
class GrupoController extends Controller
{
    

    public function index()
    {
        return view('backend.grupo.index');
    }

    
    public function create()
    {
        $maximo = is_null(Grupo::all()->max('orden'))?0:Grupo::all()->max('orden')+1;

        $gestiones = Gestion::where('estado',1)->get();
        foreach ($gestiones as $gestion) {
            $listaGestion[$gestion->id] = $gestion->gestion;
        }
        return view('backend.grupo.create',[
            'maximo' => $maximo,
            'listaGestion' => $listaGestion
        ]);
    }

    
    public function store(StoreRequest $request)
    {
        
        $campos = $request->all();
        Grupo::create($campos);
        return redirect()->route('admin.transparencia.grupo.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $grupo = Grupo::find($id);
        $gestiones = Gestion::where('estado',1)->get();
        foreach ($gestiones as $gestion) {
            $listaGestion[$gestion->id] = $gestion->gestion;
        }
        return view('backend.grupo.edit',[
                'grupo'=>$grupo,
                'maximo'=>null,
                'listaGestion' => $listaGestion
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
       $grupo = Grupo::find($id);
        
        $campos = $request->all();
        
        $grupo->update($campos);
        return redirect()->route('admin.transparencia.grupo.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect()->route('admin.transparencia.grupo.index')->withFlashSuccess('Registro Eliminado');
    }

    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($grupo) {
                return $grupo->action_buttons;
            })
            ->addColumn('_estado', function($grupo){
                if($grupo->estado=='1'){
                    return '<span class="label label-success">Habilitado</span>';;
                } else {
                    return '<span class="label label-warning">Deshabilitado</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'asc')
    {
        return Grupo::orderBy($order_by, $sort)
               ->get();
    }


}
