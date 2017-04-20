<?php

namespace App\Http\Controllers\Backend\Fragmento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\FragmentoCodigo\FragmentoCodigo;
use App\Http\Requests\Backend\FragmentoCodigo\ManageRequest;
use App\Http\Requests\Backend\FragmentoCodigo\StoreRequest;

class FragmentoCodigoController extends Controller
{
    

    public function index(Request $request)
    {
        $type = $request->get('type');
        $fragmentoId = $request->get('fragmentoId');
        if(!is_null($type) && !is_null($fragmentoId)){
            session()->put('type', $type);
            return view('backend.fragmento-codigo.index',[
                'type'=>$type,
                'fragmentoId' => $fragmentoId
            ]);
        }
        return  view('backend.fragmento-codigo.error');
    }

    
    public function create(Request $request)
    {
        $type = $request->get('type');
        $fragmentoId = $request->get('fragmentoId');
        $maximo = is_null(FragmentoCodigo::all()->max('orden'))?0:FragmentoCodigo::all()->max('orden')+1;
        return view('backend.fragmento-codigo.create',[
                'type'=>$type,
                'fragmentoId' => $fragmentoId,
                'maximo' => $maximo,
            ]);
    }

    
    public function store(Request $request)
    {
        $type = $request->get('type');
        $fragmentoId = $request->get('fragmentoId');
        FragmentoCodigo::create($request->all());
        return redirect()->route('admin.fragmento.fragmento-codigo.index',[
                'type'=>$type,
                'fragmentoId' => $fragmentoId,
            ])->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $fragmentoCodigo = FragmentoCodigo::find($id);
        return view('backend.fragmento-codigo.edit',[
                'fragmentoCodigo'=>$fragmentoCodigo,
                'type'=>session()->get('type'),
                'fragmentoId' => $fragmentoCodigo->fragmento_id,
                'maximo' => null,
            ]);
    }

    
    public function update($id, Request $request)
    {
        $fragmento = FragmentoCodigo::find($id);
        $fragmento->update($request->all());
        return redirect()->route('admin.fragmento.fragmento-codigo.index',[
                'type'=>session()->get('type'),
                'fragmentoId' => $fragmento->fragmento_id,
            ])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $fragmento = FragmentoCodigo::find($id);
        $fragmento_id =$fragmento->fragmento_id;
        $fragmento->delete();
        return redirect()->route('admin.fragmento.fragmento-codigo.index',[
                'type'=>session()->get('type'),
                'fragmentoId' => $fragmento_id,
            ])->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke(Request $request)
    {
            $parametros = explode('_',$request->get('params'));
     
        return Datatables::of(self::dataTable($parametros[1], $parametros[0]))
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

    public function dataTable($type, $fragmentoId){
        return FragmentoCodigo::where('fragmento_id', $fragmentoId)
              // ->orderBy($order_by, $sort)
               ->get();
    }
}
