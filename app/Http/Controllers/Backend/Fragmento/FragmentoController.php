<?php

namespace App\Http\Controllers\Backend\Fragmento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Fragmento\Fragmento;
use App\Models\FragmentoCategoria\FragmentoCategoria;
use App\Http\Requests\Backend\FragmentoCategoria\ManageRequest;
use App\Http\Requests\Backend\FragmentoCategoria\StoreRequest;

class FragmentoController extends Controller
{
    

    public function index(Request $request)
    {
        $type = $request->get('type');
        if(!is_null($type)){
            return view('backend.fragmento.index',[
                'type'=>$type
            ]);
        }
        return  view('backend.fragmento.error');
    }

    
    public function create(Request $request)
    {
        $type = $request->get('type');
        $lista = FragmentoCategoria::where('tipo', $type)
               ->get();
        foreach ($lista as $objeto) {
            $nuevaLista[$objeto->id] = $objeto->nombre;
        }
        return view('backend.fragmento.create',[
                'type'=>$type,
                'listaCategoria'=>$nuevaLista
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $type = $request->get('tipo');
        Fragmento::create($request->all());
        return redirect()->route('admin.fragmento.fragmento.index',[
                'type'=>$type
            ])->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $fragmento = Fragmento::find($id);
        $lista = FragmentoCategoria::where('tipo', $fragmento->tipo)
               ->get();
        foreach ($lista as $objeto) {
            $nuevaLista[$objeto->id] = $objeto->nombre;
        }
        return view('backend.fragmento.edit',[
                'fragmento'=>$fragmento,
                'type'=>$fragmento->tipo,
                'listaCategoria'=>$nuevaLista
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
        $fragmento = Fragmento::find($id);
        $fragmento->update($request->all());
        return redirect()->route('admin.fragmento.fragmento.index',[
                'type'=>$fragmento->tipo
            ])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $fragmento = Fragmento::find($id);
        $tipo =$fragmento->tipo;
        $fragmento->delete();
        return redirect()->route('admin.fragmento.fragmento.index',[
                'type'=>$tipo
            ])->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke(Request $request)
    {
            $type = $request->get('type');
        return Datatables::of(self::dataTable($type))
            ->addColumn('actions', function($fragmento) {
                return $fragmento->action_buttons;
            })
            ->addColumn('_tipo', function($fragmento){
                if($fragmento->tipo=='1'){
                    return '<span class="label label-success">Fragmentos de Código</span>';;
                } else {
                    return '<span class="label label-info">Fragmentos Estáticos</span>';;
                }
            })
            ->addColumn('_nombre', function($fragmento) {
                if($fragmento->tipo=='1'){
                    return '<a href="'.route("admin.fragmento.fragmento-codigo.index", ['type'=>$fragmento->tipo, 'fragmentoId'=>$fragmento->id]).'">'.$fragmento->nombre.'</a>';
                } else {
                    return '<a href="'.route("admin.fragmento.fragmento-estatico.index", ['type'=>$fragmento->tipo, 'fragmentoId'=>$fragmento->id]).'">'.$fragmento->nombre.'</a>';
                }
                
            })
            ->make(true);
    }

    public function dataTable($type){
        return Fragmento::where('tipo', $type)
              // ->orderBy($order_by, $sort)
               ->get();
    }
}
