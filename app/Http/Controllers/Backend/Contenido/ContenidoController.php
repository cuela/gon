<?php

namespace App\Http\Controllers\Backend\Contenido;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Contenido\ContenidoRepository;
use App\Http\Requests\Backend\Contenido\ManageRequest;
use App\Http\Requests\Backend\Contenido\StoreRequest;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Contenido\Contenido;
use App\Models\TaxonomiaCategoria\TaxonomiaCategoria;
use App\Models\ContenidoMedia\ContenidoMedia;
use App\Models\Media\Media;
use Carbon\Carbon;

class ContenidoController extends Controller
{
    protected $contenido;

    
    public function __construct(ContenidoRepository $contenido)
	{
        $this->contenido = $contenido;
    }

    public function index(ManageRequest $request)
    {
        $taxonomia = $request->get('taxonomia');
        if(!is_null($taxonomia)){
            $taxonomiaCategoria = TaxonomiaCategoria::find($taxonomia);
            return view('backend.contenido.index',[
                'taxonomiaCategoria'=>$taxonomiaCategoria,
                'taxonomia'=>$taxonomia,
            ]);
        }
        return  view('backend.contenido.error');
    }

    
    public function create(ManageRequest $request)
    {
        $taxonomia = $request->get('taxonomia');
        if(!is_null($taxonomia)){
            $taxonomiaCategoria = TaxonomiaCategoria::find($taxonomia);
            $maximo = is_null(Contenido::all()->max('orden'))?0:Contenido::all()->max('orden')+1;
            $listaTaxonomia = $this->contenido->getArrayTree($taxonomia);
            
            $listaEstado['1'] = 'Creado';
            $listaEstado['2'] = 'Concluido';
            if (access()->hasAccion('publicar-articulo') || access()->hasAccion('publicar-individual') ){
                $listaEstado['3'] = 'Autorizado';
            }
            return view('backend.contenido.create',[
                'listaTaxonomia'=>$listaTaxonomia,
                'maximo'=>$maximo,
                'taxonomiaCategoria'=>$taxonomiaCategoria,
                'listaEstado'=>$listaEstado,
            ]);
        }
        return  view('backend.contenido.error');
    }

    
    public function store(StoreRequest $request)
    {
        $imagen = $request->file('imagen');
        $campos = $request->all();
        $campos['usuario_id'] = \Auth::user()->id;
        $campos['estado'] = empty($campos['estado'])?1:$campos['estado'];//1= creado
        $taxonomia =$request->get('taxonomia');
        if(!is_null($taxonomia)){
        
            if(!is_null($imagen))
                $campos = self::subirImagen($imagen, $campos);

            $objetoContenido = $this->contenido->create($campos);
            if(is_object($objetoContenido)){
                $archivos = $request->file('archivo');
                if($request->hasFile('archivo'))
                {
                    foreach ($archivos as $archivo) {
                        $resultado = self::subirArchivo($archivo);
                        if($resultado){
                            $contenidoMedia = new ContenidoMedia;
                            $contenidoMedia->contenido_id=$objetoContenido->id;
                            $contenidoMedia->media_id=$resultado->id;
                            $contenidoMedia->save();
                        } 
                    }
                }
            }

            return redirect()->route('admin.contenido.contenido.index',['taxonomia'=>$taxonomia])->withFlashSuccess('Datos guardados Correctamente');
        }
        return  view('backend.contenido.error');
    }

    
    public function edit($id, ManageRequest $request)
    {   
        $contenido = Contenido::find($id);
        $taxonomiaCategoria = TaxonomiaCategoria::find($contenido->categoria_id);
        $maximo = is_null(Contenido::all()->max('orden'))?0:Contenido::all()->max('orden')+1;
        $listaTaxonomia = $this->contenido->getArrayTree($contenido->categoria_id,$contenido);

        $listaArchivos = ContenidoMedia::where('contenido_id', $id)
               ->get();
        $listaMedia=[];
        if(count($listaArchivos)>0){
            foreach ($listaArchivos as $contenidoMedia) {
                $listaMedia[] = $contenidoMedia->media;
            }
        }   
        
        $listaEstado['1'] = 'Creado';
        $listaEstado['2'] = 'Concluido';
        if (access()->hasAccion('publicar-articulo') || access()->hasAccion('publicar-individual') ){
            $listaEstado['3'] = 'Autorizado';
        }
        
        return view('backend.contenido.edit',[
                'contenido'=>$contenido,
                'listaTaxonomia'=>$listaTaxonomia,
                'taxonomiaCategoria'=>$taxonomiaCategoria,
                'maximo'=>null,
                'listaMedia'=>$listaMedia,
                'listaEstado'=>$listaEstado,
            ]);
    }

    
    public function update(Contenido $contenido, StoreRequest $request)
    {
        $contenido->modificador_usuario_id = \Auth::user()->id;
        $this->contenido->update($contenido, $request->all());


        if(is_object($contenido)){
            $archivos = $request->file('archivo');
            if($request->hasFile('archivo'))
            {
                foreach ($archivos as $archivo) {
                    $resultado = self::subirArchivo($archivo);
                    if($resultado){
                        $contenidoMedia = new ContenidoMedia;
                        $contenidoMedia->contenido_id=$contenido->id;
                        $contenidoMedia->media_id=$resultado->id;
                        $contenidoMedia->save();
                    } 
                }
            }
        }
        return redirect()->route('admin.contenido.contenido.index',['taxonomia'=>$request->get('taxonomia')])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id, ManageRequest $request)
    {
        $contenido = Contenido::find($id);
        $this->contenido->delete($contenido);
        return redirect()->route('admin.contenido.contenido.index',['taxonomia'=>$contenido->categoria_id])->withFlashSuccess('Registro Eliminado');
    }

    public function listaContenido(ManageRequest $request)
    {
        $taxonomia = $request->get('taxonomia');
        if(!is_null($taxonomia)){
            $taxonomiaCategoria = TaxonomiaCategoria::find($taxonomia);
            return view('backend.contenido.lista',[
                'taxonomiaCategoria'=>$taxonomiaCategoria,
                'taxonomia'=>$taxonomia,
            ]);
        }
        return  view('backend.contenido.error');
    }

    public function actualizarLista(ManageRequest $request)
    {
        $lista = $request->all();
        $taxonomia = $request->get('taxonomia');
        foreach ($lista as $key => $value) {
            if($key!='_token' && $key!='contenido-table_length' && $key!= 'taxonomia' ){
                $contenido = Contenido::find($key);
                $contenido->estado = $value;
                $contenido->save();
            }
        }

        return redirect()->route('admin.contenido.contenido.listacontenido',['taxonomia'=>$taxonomia])->withFlashSuccess('Datos guardados Correctamente');

    }

    public function lista(ManageRequest $request)
    {
        $taxonomia = $request->get('taxonomia');
        return Datatables::of($this->contenido->getForDataTableLista($taxonomia))

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

    //Table Controller
    public function __invoke(ManageRequest $request)
    {
        $taxonomia = $request->get('taxonomia');
        return Datatables::of($this->contenido->getForDataTable($taxonomia))
            ->addColumn('actions', function($contenido) {
                return $contenido->action_buttons;
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
}
