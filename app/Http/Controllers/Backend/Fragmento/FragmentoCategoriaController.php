<?php

namespace App\Http\Controllers\Backend\Fragmento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\FragmentoCategoria\FragmentoCategoria;
use App\Http\Requests\Backend\FragmentoCategoria\ManageRequest;
use App\Http\Requests\Backend\FragmentoCategoria\StoreRequest;

class FragmentoCategoriaController extends Controller
{
    

    public function index()
    {
        
        return view('backend.fragmento-categoria.index');
    }

    
    public function create()
    {
        return view('backend.fragmento-categoria.create');
    }

    
    public function store(StoreRequest $request)
    {
        FragmentoCategoria::create($request->all());
        return redirect()->route('admin.fragmento.fragmento-categoria.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $fragmentoCategoria = FragmentoCategoria::find($id);
        return view('backend.fragmento-categoria.edit',[
                'fragmentoCategoria'=>$fragmentoCategoria
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
        $fragmentoCategoria = FragmentoCategoria::find($id);
        $fragmentoCategoria->update($request->all());
        return redirect()->route('admin.fragmento.fragmento-categoria.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $fragmentoCategoria = FragmentoCategoria::find($id);
        $fragmentoCategoria->delete();
        return redirect()->route('admin.fragmento.fragmento-categoria.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(FragmentoCategoria::all())
            ->addColumn('actions', function($fragmento) {
                return $fragmento->action_buttons;
            })
            ->addColumn('_tipo', function($fragmentoCategoria){
                if($fragmentoCategoria->tipo=='1'){
                    return '<span class="label label-success">Fragmento Estático</span>';;
                } else {
                    return '<span class="label label-warning">Fragmento de Código</span>';;
                }
            })
            ->make(true);
    }
}
