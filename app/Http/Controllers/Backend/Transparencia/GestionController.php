<?php

namespace App\Http\Controllers\Backend\Transparencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Transparencia\Gestion;
use App\Http\Requests\Backend\Gestion\ManageRequest;
use App\Http\Requests\Backend\Gestion\StoreRequest;
use Carbon\Carbon;
class GestionController extends Controller
{
    

    public function index()
    {
        return view('backend.gestion.index');
    }

    
    public function create()
    {
        $maximo = is_null(Gestion::all()->max('orden'))?0:Gestion::all()->max('orden')+1;
        return view('backend.gestion.create',[
            'maximo' => $maximo
        ]);
    }

    
    public function store(StoreRequest $request)
    {
        
        $campos = $request->all();
        Gestion::create($campos);
        return redirect()->route('admin.transparencia.gestion.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $gestion = Gestion::find($id);
        return view('backend.gestion.edit',[
                'gestion'=>$gestion,
                'maximo'=>null,
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
       $gestion = Gestion::find($id);
        
        $campos = $request->all();
        
        $gestion->update($campos);
        return redirect()->route('admin.transparencia.gestion.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $gestion = Gestion::find($id);
        $gestion->delete();
        return redirect()->route('admin.transparencia.gestion.index')->withFlashSuccess('Registro Eliminado');
    }

    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($gestion) {
                return $gestion->action_buttons;
            })
            ->addColumn('_estado', function($gestion){
                if($gestion->estado=='1'){
                    return '<span class="label label-success">Habilitado</span>';;
                } else {
                    return '<span class="label label-warning">Deshabilitado</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'asc')
    {
        return Gestion::orderBy($order_by, $sort)
               ->get();
    }


}
