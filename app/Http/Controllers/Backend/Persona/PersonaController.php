<?php

namespace App\Http\Controllers\Backend\Persona;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Persona\Persona;
use App\Http\Requests\Backend\Persona\ManageRequest;
use App\Http\Requests\Backend\Persona\StoreRequest;
use Carbon\Carbon;
class PersonaController extends Controller
{
    

    public function index()
    {
        return view('backend.persona.index');
    }

    
    public function create()
    {
        $maximo = is_null(Persona::all()->max('orden'))?0:Persona::all()->max('orden')+1;
        return view('backend.persona.create',[
            'maximo' => $maximo
        ]);
    }

    
    public function store(StoreRequest $request)
    {
        $foto = $request->file('foto');
        $campos = $request->all();
        if(!is_null($foto))
            $campos = self::subirImagen($foto, $campos);
        Persona::create($campos);
        return redirect()->route('admin.persona.persona.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $persona = Persona::find($id);
        return view('backend.persona.edit',[
                'persona'=>$persona,
                'maximo'=>null,
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
       $persona = Persona::find($id);
        $foto = $request->file('foto');
        $campos = $request->all();
        if(!is_null($foto))
            $campos = self::subirImagen($foto, $campos);
        $persona->update($campos);
        return redirect()->route('admin.persona.persona.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();
        return redirect()->route('admin.persona.persona.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($persona) {
                return $persona->action_buttons;
            })
            ->addColumn('_estado', function($persona){
                if($persona->estado=='1'){
                    return '<span class="label label-success">Habilitado</span>';;
                } else {
                    return '<span class="label label-warning">Deshabilitado</span>';;
                }
            })
            ->addColumn('_estado_civil', function($persona){
                switch ($persona->estado_civil) {
                    case 'C':
                        $ec = 'Casado(a)';
                        break;
                    case 'S':
                        $ec = 'Soltero(a)';
                        break;
                    case 'V':
                        $ec = 'Viudo(a)';
                        break;
                    case 'D':
                        $ec = 'Divorciado(a)';
                        break;
                    default:
                        $ec='';
                        break;
                }
                return $ec;
            })
            ->addColumn('_foto', function($persona){
                if($persona->foto){
                    return '<img src="'.asset($persona->foto).'" width="100">';
                }
                return '';
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'asc')
    {
        return Persona::orderBy($order_by, $sort)
               ->get();
    }


    public function subirImagen($archivo, $campos)
    {
        if(!is_null($archivo)){
            $nombre = Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->second;
            $campos['foto'] = 'uploads/'.$nombre.'.'.$archivo->getClientOriginalExtension();
                $nombreArchivo = $nombre.'.'.$archivo->getClientOriginalExtension();
                \Storage::disk('uploads')->put($nombreArchivo, \File::get($archivo));
        }
        return $campos;
    }
}
