<?php

namespace App\Http\Controllers\Backend\Fragmento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\FragmentoEstatico\FragmentoEstatico;
use App\Http\Requests\Backend\FragmentoEstatico\ManageRequest;
use App\Http\Requests\Backend\FragmentoEstatico\StoreRequest;
use Carbon\Carbon;

class FragmentoEstaticoController extends Controller
{
    

    public function index(Request $request)
    {
        $type = $request->get('type');
        $fragmentoId = $request->get('fragmentoId');
        if(!is_null($type) && !is_null($fragmentoId)){
            session()->put('type', $type);
            return view('backend.fragmento-estatico.index',[
                'type'=>$type,
                'fragmentoId' => $fragmentoId
            ]);
        }
        return  view('backend.fragmento-estatico.error');
    }

    
    public function create(Request $request)
    {
        $type = $request->get('type');
        $fragmentoId = $request->get('fragmentoId');
        $maximo = is_null(FragmentoEstatico::all()->max('orden'))?0:FragmentoEstatico::all()->max('orden')+1;
        return view('backend.fragmento-estatico.create',[
                'type'=>$type,
                'fragmentoId' => $fragmentoId,
                'maximo' => $maximo,
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $type = $request->get('type');
        $fragmentoId = $request->get('fragmentoId');
        $imagen = $request->file('imagen');
        $campos = $request->all();
        $campos = self::subirImagen($imagen, $campos);
        FragmentoEstatico::create($campos);
        return redirect()->route('admin.fragmento.fragmento-estatico.index',[
                'type'=>$type,
                'fragmentoId' => $fragmentoId,
            ])->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $fragmentoEstatico = FragmentoEstatico::find($id);

        return view('backend.fragmento-estatico.edit',[
                'fragmentoEstatico'=>$fragmentoEstatico,
                'type'=>session()->get('type'),
                'fragmentoId' => $fragmentoEstatico->fragmento_id,
                'maximo' => null,
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
        $fragmento = FragmentoEstatico::find($id);
        $imagen = $request->file('imagen');
        $campos = $request->all();
        $campos = self::subirImagen($imagen, $campos);
        $fragmento->update($campos);
        return redirect()->route('admin.fragmento.fragmento-estatico.index',[
                'type'=>session()->get('type'),
                'fragmentoId' => $fragmento->fragmento_id,
            ])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $fragmento = FragmentoEstatico::find($id);
        $fragmento_id =$fragmento->fragmento_id;
        $fragmento->delete();
        return redirect()->route('admin.fragmento.fragmento-estatico.index',[
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
        return FragmentoEstatico::where('fragmento_id', $fragmentoId)
              // ->orderBy($order_by, $sort)
               ->get();
    }
    public function subirImagen($archivo, $campos)
    {
        if(!is_null($archivo)){
            $nombre = Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->second;
            $campos['imagen'] = 'uploads/'.$nombre.'.'.$archivo->getClientOriginalExtension();
                $nombreArchivo = $nombre.'.'.$archivo->getClientOriginalExtension();
                \Storage::disk('uploads')->put($nombreArchivo, \File::get($archivo));

            $img = \Image::make('uploads/'.$nombreArchivo);
            $img->resize(130, 95);
            $img->save('uploads/thumb/'.$nombreArchivo);
            $campos['miniatura'] = 'uploads/thumb/'.$nombreArchivo;
        }
        return $campos;
    }
}
