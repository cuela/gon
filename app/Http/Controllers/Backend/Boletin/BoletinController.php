<?php

namespace App\Http\Controllers\Backend\Boletin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Boletin\Boletin;
use App\Models\CategoriaBoletin\CategoriaBoletin;
use App\Http\Requests\Backend\Boletin\ManageRequest;
use App\Http\Requests\Backend\Boletin\StoreRequest;
use App\Http\Requests\Backend\Boletin\UploadRequest;
use Carbon\Carbon;

class BoletinController extends Controller
{
    

    public function index()
    {
        
        return view('backend.boletin.index');
    }

    
    public function create()
    {
        $maximo = is_null(Boletin::all()->max('orden'))?0:Boletin::all()->max('orden')+1;
        $listaCategoria = self::getArrayTree();
        return view('backend.boletin.create',[
            'maximo' => $maximo,
            'listaCategoria' => $listaCategoria,
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

        Boletin::create($campos);
        
        return redirect()->route('admin.boletin.boletin.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   
        $boletin = Boletin::find($id);
        $listaCategoria = self::getArrayTree($boletin);
        
        return view('backend.boletin.edit',[
                'boletin'=>$boletin,
                'maximo'=>null,
                'listaCategoria' => $listaCategoria,
        
        ]);
    }

    
    public function update($id, UploadRequest $request)
    {
        $campos = $request->all();
        $campos['usuario_creador'] = \Auth::user()->id;

        $imagen = $request->file('imagen');
        if(!is_null($imagen))
            $campos = self::subirImagen($imagen, $campos);
        $archivo = $request->file('archivo');
        if(!is_null($archivo))
            $campos = self::subirArchivoBoletin($archivo, $campos);

        $boletin = Boletin::find($id);
        $boletin->update($campos);
        
        return redirect()->route('admin.boletin.boletin.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $boletin = Boletin::find($id);
        $boletin->delete();
        return redirect()->route('admin.boletin.boletin.index')->withFlashSuccess('Registro Eliminado');
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
                    return '<span class="label label-primary">Público</span>';;
                } else {
                    return '<span class="label label-danger">Privado</span>';;
                }
                
            })
            ->addColumn('_visibilidad', function($boletin){
                if($boletin->visibilidad=='1'){
                    return '<span class="label label-warning">Visible</span>';;
                } else {
                    return '<span class="label label-success">No Visible</span>';;
                }
                
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'asc')
    {
        return Boletin::orderBy($order_by, $sort)
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

    //metodos para el arbol de categorías
    public  function getArrayTree($model = null)
    {
        
        $lista =  self::getArrayTreeInternal(0,0);
        return self::buildTreeOptionsForSelf($lista, $model);
        
    }
    

    public function getArrayTreeInternal($parentId = 0, $level = 0)
    {
        $children = CategoriaBoletin::where('padre_id',$parentId)
               ->orderBy('orden', 'asc')
               ->get();
        $items =[];
        foreach ($children as $child)
        {
            $child->level=$level;
            $items[$child->id]=$child;
            $temp = self::getArrayTreeInternal($child->id, $level + 1);
            $items = array_merge($items, $temp);
        }
        return $items;
    }

    public  function buildTreeOptionsForSelf($treeArray,$model=null)
    {
        
        $options = '<option value="0">La Raiz</option>';

        $found=false;
        if(is_object($model))
            $padre = $model->categoria_boletin_id;
        
        foreach($treeArray as $row)
        {
            $theId = intval($row->level);
            $style = '';

            if($model!=null)
            {
                if($row->id === $padre)
                {
                    $style = ' selected';
                }
                if($model->id===$theId)
                {
                    $model->level=intval($row->level);
                    $found=true;
                    continue;
                }
                if($found)
                {
                    if(intval($row->level)>$model->level)
                    {
                        continue;
                    }
                    else
                    {
                        $found=false;
                    }
                }
            }

            $options .= '<option value="' . $row->id . '"' . $style . '>' . str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$row->level) . $row->nombre . '</option>';
        }
        return $options;
    }
}
