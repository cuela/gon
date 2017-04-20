<?php

namespace App\Http\Controllers\Backend\Contacto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Contacto\Contacto;
use App\Http\Requests\Backend\Contacto\ManageRequest;
use App\Http\Requests\Backend\Contacto\StoreRequest;
use Carbon\Carbon;

class ContactoController extends Controller
{
    public function index()
    {
        
        return view('backend.contacto.index');
    }

    
    public function create()
    {
        return view('backend.contacto.create');
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();
        $objeto = Contacto::create($campos);
        return redirect()->route('admin.contacto.contacto.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $contacto = Contacto::find($id);
        
        return view('backend.contacto.edit',[
                'denuncia'=>$contacto,
                'maximo' => null
            ]);
    }

    
    public function update($id, ManageRequest $request)
    {
        $inputs = $request->all();
        $contacto = Contacto::find($id);
        $contacto->update($inputs);
        
        return redirect()->route('admin.contacto.contacto.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    public function show($id)
    {
        $contacto = Contacto::find($id);
        
        return view('backend.contacto.show',[
                'contacto'=>$contacto,
                'maximo' => null
            ]);
    }

    
    public function destroy($id)
    {
        $contacto = Contacto::find($id);
        $contacto->delete();
        return redirect()->route('admin.contacto.contacto.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($contacto) {
                return $contacto->action_buttons;
            })
            ->addColumn('_nombre', function($contacto){
                return $contacto->nombres.' '.$contacto->apellido_paterno.' '.$contacto->apellido_materno;
            })
            ->addColumn('_estado', function($contacto){

                if($contacto->estado=='1'){
                    return '<span class="label label-primary">Activo</span>';;
                } 
                if($contacto->estado=='0')
                {
                    return '<span class="label label-warning">Inactivo</span>';;
                }
            })
            ->addColumn('_asunto', function($contacto){

                if($contacto->asunto=='consulta'){
                    return '<span class="label label-danger">Consulta</span>';;
                } 
                if($contacto->asunto=='reclamo')
                {
                    return '<span class="label label-warning">Reclamo</span>';;
                }
                if($contacto->asunto=='sugerencia')
                {
                    return '<span class="label label-info">Sugerencia</span>';;
                }
                if($contacto->asunto=='felicitacion')
                {
                    return '<span class="label label-success">Felicitación</span>';;
                }
                if($contacto->asunto=='otros')
                {
                    return '<span class="label label-primary">Otros</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'id', $sort = 'desc')
    {
        return Contacto::orderBy($order_by, $sort)
               ->get();
    }
}