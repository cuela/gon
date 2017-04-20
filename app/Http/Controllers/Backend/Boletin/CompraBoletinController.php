<?php

namespace App\Http\Controllers\Backend\Boletin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\CompraBoletin\CompraBoletin;
use App\Http\Requests\Backend\Boletin\CompraBoletin\ManageRequest;
use Carbon\Carbon;

class CompraBoletinController extends Controller
{
    

    public function index(ManageRequest $request)
    {
        $inputs = $request->all();
        if(isset($inputs['boletin_id']))
            session()->put('boletin_id', $inputs['boletin_id']);
        return view('backend.compra-boletin.index');
    }

    public function show($id)
    {
        $compraBoletin = CompraBoletin::find($id);

        
        if($compraBoletin->fecha_inicio_activacion){
            $fechaTemp = $compraBoletin->fecha_inicio_activacion;
            $compraBoletin->fecha_inicio_activacion = date("d/m/Y", strtotime($compraBoletin->fecha_inicio_activacion));
        }
        if($compraBoletin->fecha_fin_activacion){
            $fechaTemp = $compraBoletin->fecha_fin_activacion;
            $compraBoletin->fecha_fin_activacion = date("d/m/Y", strtotime($compraBoletin->fecha_fin_activacion));
            
        }
        
        return view('backend.compra-boletin.show',[
                'compraBoletin'=>$compraBoletin
            ]);
    }

    
    public function create()
    {
        $maximo = is_null(CompraBoletin::all()->max('orden'))?0:CompraBoletin::all()->max('orden')+1;
        return view('backend.compra-boletin.create',[
            'maximo' => $maximo
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();
        $campos['usuario_creador'] = \Auth::user()->id;

        $imagen = $request->file('imagen');
        if(!is_null($imagen))
            $campos = self::subirImagen($imagen, $campos);

        $archivo = $request->file('archivo');
        if(!is_null($archivo))
            $campos = self::subirArchivoBoletin($archivo, $campos);

        CompraBoletin::create($campos);
        
        return redirect()->route('admin.boletin.compra-boletin.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   
        $boletin = CompraBoletin::find($id);
        
        
        return view('backend.compra-boletin.edit',[
                'boletin'=>$boletin,
                'maximo'=>null,
        
        ]);
    }

    
    public function update($id, ManageRequest $request)
    {
        $campos = $request->all();
        $boletin = CompraBoletin::find($id);
        $boletin->update($campos);
        
        return redirect()->route('admin.boletin.compra-boletin.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $boletin = CompraBoletin::find($id);
        $boletin->delete();
        return redirect()->route('admin.boletin.compra-boletin.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($boletin) {
                return $boletin->action_buttons;
            })
            ->addColumn('_estado', function($boletin){
                if($boletin->estado=='1'){
                    return '<span class="label label-success">Habilitado</span>';;
                } 
                
                if($boletin->estado=='2'){
                    return '<span class="label label-warning">Deshabilitado</span>';;
                }

                if($boletin->estado=='3'){
                    return '<span class="label label-danger">Finalizado / Caducado</span>';;
                }
            })
            ->addColumn('_detalle', function($boletin) {
                return '<a href="'.route("admin.boletin.compra-boletin.index", ['boletin_id'=>$boletin->id]).'"> Ver Pedidos</a>';
            })
            ->addColumn('_papeleta_bancaria', function($boletin) {
                return '<a target="_blank" href="'.asset($boletin->papeleta_bancaria).'"> Descargar</a>';
            })
            ->addColumn('_vigente', function($boletin){
                if($boletin->vigente=='1'){
                    return '<span class="label label-primary">Vigente</span>';;
                } else {
                    return '<span class="label label-danger">No vigente</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'id', $sort = 'desc')
    {
        return CompraBoletin::orderBy($order_by, $sort)
                ->where('boletin_id',session()->get('boletin_id'))
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
            $img->resize(92, 59);
            $img->save('uploads/thumb/'.$nombreArchivo);
            $campos['miniatura'] = 'uploads/thumb/'.$nombreArchivo;
        }
        return $campos;
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
