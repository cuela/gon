<?php

namespace App\Http\Controllers\Backend\Transparencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Transparencia\Articulo;
use App\Models\Transparencia\ArticuloMedia;
use App\Models\Transparencia\Grupo;
use App\Http\Requests\Backend\Articulo\ManageRequest;
use App\Http\Requests\Backend\Articulo\StoreRequest;
use App\Models\Media\Media;
use Carbon\Carbon;
class ArticuloController extends Controller
{
    
    public function index()
    {
        return view('backend.articulo.index');
    }

    
    public function create()
    {
        $maximo = is_null(Articulo::all()->max('orden'))?0:Articulo::all()->max('orden')+1;

        $grupos = Grupo::where('estado',1)->get();

        $listaGrupo=[];
        foreach ($grupos as $grupo) {
            $listaGrupo[$grupo->id] = $grupo->gestion->gestion.' '.$grupo->titulo;
        }
            $listaEstado['1'] = 'Creado';
            $listaEstado['2'] = 'Concluido';
            if (access()->hasAccion('publicar-contenido-transparencia')){
                $listaEstado['3'] = 'Autorizado';
            }
        
        return view('backend.articulo.create',[
            'maximo' => $maximo,
            'listaGrupo' => $listaGrupo,
            'listaEstado' => $listaEstado,
        ]);
    }

    
    public function store(StoreRequest $request)
    {
        $imagen = $request->file('imagen');
        $campos = $request->all();
        $campos['usuario_id'] = \Auth::user()->id;
        $campos['estado'] = empty($campos['estado'])?1:$campos['estado'];//1= pendiente
        $campos['visibilidad'] = empty($campos['visibilidad'])?1:$campos['visibilidad'];//1= privado
        
        if(!is_null($imagen))
            $campos = self::subirImagen($imagen, $campos);

        $objeto =Articulo::create($campos);
        if(is_object($objeto)){
            $archivos = $request->file('archivo');
            if($request->hasFile('archivo'))
            {
                foreach ($archivos as $archivo) {
                    $resultado = self::subirArchivo($archivo);
                    if($resultado){
                        $articuloMedia = new ArticuloMedia;
                        $articuloMedia->articulo_id=$objeto->id;
                        $articuloMedia->media_id=$resultado->id;
                        $articuloMedia->save();
                    } 
                }
            }
        }
        return redirect()->route('admin.transparencia.articulo.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $articulo = Articulo::find($id);
        $listaArchivos = ArticuloMedia::where('articulo_id', $id)->get();
        $listaMedia=[];
        if(count($listaArchivos)>0){
            foreach ($listaArchivos as $convocatoriaMedia) {
                $listaMedia[] = $convocatoriaMedia->media;
            }
        }
        $grupos = Grupo::where('estado',1)->get();
        $listaGrupo=[];
        foreach ($grupos as $grupo) {
            $listaGrupo[$grupo->id] = $grupo->gestion->gestion.' '.$grupo->titulo;
        }
        
        $listaEstado['1'] = 'Creado';
        $listaEstado['2'] = 'Concluido';
        if (access()->hasAccion('publicar-contenido-transparencia') ){
            $listaEstado['3'] = 'Autorizado';
        }
        
        return view('backend.articulo.edit',[
                'articulo'=>$articulo,
                'maximo'=>null,
                'listaGrupo' => $listaGrupo,
                'listaMedia' => $listaMedia,
                'listaEstado' => $listaEstado,
            ]);
    }

    
    public function update($id, StoreRequest $request)
    {
        $articulo = Articulo::find($id);
        
        $campos = $request->all();
        $imagen = $request->file('imagen');
        $campos = $request->all();
        $campos['modificador_usuario_id'] = \Auth::user()->id;

        if(!is_null($imagen))
            $campos = self::subirImagen($imagen, $campos);
        
        $articulo->update($campos);
        if(is_object($articulo)){
            $archivos = $request->file('archivo');
            if($request->hasFile('archivo'))
            {
                foreach ($archivos as $archivo) {
                    $resultado = self::subirArchivo($archivo);
                    if($resultado){
                        $articuloMedia = new ArticuloMedia;
                        $articuloMedia->articulo_id=$articulo->id;
                        $articuloMedia->media_id=$resultado->id;
                        $articuloMedia->save();
                    } 
                }
            }
        }
        return redirect()->route('admin.transparencia.articulo.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect()->route('admin.transparencia.articulo.index')->withFlashSuccess('Registro Eliminado');
    }

    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($articulo) {
                return $articulo->action_buttons;
            })
            ->addColumn('_estado', function($menu){
                if($menu->estado=='1'){
                    return '<span class="label label-warning">Creado</span>';
                } 
                if($menu->estado=='2'){
                    return '<span class="label label-primary">Concluido</span>';
                }
                if($menu->estado=='3'){
                    return '<span class="label label-success">Autorizado</span>';
                }
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'desc')
    {
        if(access()->hasRole('contenido_validar'))
            return Articulo::orderBy($order_by, $sort)
               ->get();
        else
            return Articulo::where('usuario_id',\Auth::user()->id)->orderBy($order_by, $sort)
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

    public function subirArchivo($archivo)
    {
        
        if(!is_null($archivo)){
            $uniqid  = uniqid();
            $nombre = Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->second.$uniqid.'.'.$archivo->getClientOriginalExtension();
            $disco = 'files';
            $media = new Media;
            $media->nombre_archivo = $nombre;
            $media->nombre_original = $archivo->getClientOriginalName();
            $media->ruta = 'uploads/'.$disco;
            $media->tipo = $archivo->getClientOriginalExtension();
            $media->tamanio = $archivo->getSize();
            $media->orden = 0;
            $media->estado = 1;
            $resultado = $media->save();
            \Storage::disk($disco)->put($nombre, \File::get($archivo));
            return $media;
        }
            return false;
    }

    public function eliminarmedia(ManageRequest $request){
        $id = $request->get('id');
        $articulo = ArticuloMedia::find($id);
        $articulo->delete();
    }


    public function listaArticulo(ManageRequest $request)
    {

        return view('backend.articulo.lista');
        
    }
    public function actualizarLista(ManageRequest $request)
    {
        $lista = $request->all();
        foreach ($lista as $key => $value) {
            if($key!='_token' && $key!='contenido-table_length'){
                $articulo = Articulo::find($key);
                $articulo->estado = $value;
                $articulo->save();
            }
        }

        return redirect()->route('admin.transparencia.articulo.listaarticulo')->withFlashSuccess('Datos guardados Correctamente');

    }

    public function lista(ManageRequest $request)
    {
        return Datatables::of(self::getForDataTableLista())

            ->addColumn('_estado_creado', function($contenido){
                $checked = ($contenido->estado=='1')?'checked':'';
                return '<input type="radio" name="'.$contenido->id.'" value="1" '.$checked.'>';
            })
            ->addColumn('_estado_concluido', function($contenido){
                $checked = ($contenido->estado=='2')?'checked':'';
                return '<input type="radio" name="'.$contenido->id.'" value="2"  '.$checked.'>';
            })
            ->addColumn('_estado_publicado', function($contenido){
                $checked = ($contenido->estado=='3')?'checked':'';
                return '<input type="radio" name="'.$contenido->id.'" value="3"  '.$checked.'>';
            })
            ->addColumn('_vista', function($contenido){
                return '<a href="'.route('frontend.postDetalle',['id'=>$contenido->id]).'" target="_blank">Vista previa</a>';
            })
            ->make(true);
    }

    public function getForDataTableLista($order_by = 'orden', $sort = 'desc')
    {
        return Articulo::orderBy($order_by, $sort)
             ->get();
        
    }
}
