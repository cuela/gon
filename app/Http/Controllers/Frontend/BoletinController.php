<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Boletin\Boletin;
use App\Models\CategoriaBoletin\CategoriaBoletin;
use App\Models\CompraBoletin\CompraBoletin;
use App\Models\Access\User\User;
use App\Http\Requests\Backend\CompraBoletin\StoreRequest;
use App\Http\Requests\Backend\CompraBoletin\ManageRequest;
use \Auth;
use \PDF;
use Carbon\Carbon;


class BoletinController extends Controller
{

    public function lista()
    {
        $listaCategoria = self::getArrayTree();
        $listaBoletin = Boletin::where('visibilidad',1)->orderBy('orden','desc')->get();
        $boletinSolicitado='';
        $fechaSistema ='';
        if(!is_null(\Auth::user())) {
            $fechaSistema = date('Y-m-d');
            $boletinSolicitado = CompraBoletin::where('usuario_id',\Auth::user()->id)
            ->where('vigente', 1)
            ->first();
        }
        return view('frontend.boletin.lista', [
            'listaCategoria' => $listaCategoria,
            'listaBoletin' => $listaBoletin,
            'boletinSolicitado' => $boletinSolicitado,
            'fechaSistema' => $fechaSistema,
        ]);
    }

    public function solicitar()
    {
        $datosUsuario = User::find(\Auth::user()->id);

        return view('frontend.boletin.solicitar',[
            'datosUsuario'=> $datosUsuario,
        ]);
    }

    public function categoria(ManageRequest $request)
    {
        $id = $request->get('id');
        $listaBoletin = Boletin::where('categoria_boletin_id', $id)->get();
        
        return view('frontend.boletin.boletines',[
            'listaBoletin'=> $listaBoletin,
        ]);
    }
    public function guardar(StoreRequest $request)
    {
        $boletinSolicitado = CompraBoletin::where('usuario_id',\Auth::user()->id)
            ->where('vigente', 1)
            ->first();
        if(is_object($boletinSolicitado)){
            $boletinSolicitado->vigente=0;
            $boletinSolicitado->save();
        }

        $campos = $request->all();
        $campos['usuario_id'] = \Auth::user()->id;
        $campos['estado'] = 2;
        $campos['vigente'] = 1;

        $archivo = $request->file('papeleta_bancaria');
        if(!is_null($archivo))
            $campos = self::subirArchivoBoletin($archivo, $campos);
        $objeto = CompraBoletin::create($campos);
        return redirect()->route('frontend.boletin')->withFlashSuccess('Su solicitud fue registrada correctamente en el transcurso del día validaremos los datos que nos envío y podra acceder al documento');
    }

    public function detalle($id)
    {
        $boletin = Boletin::find($id);
    	return view('frontend.boletin.detalle',[
    		'boletin' => $boletin
    	]);	
    }

    public function subirArchivoBoletin($archivo, $campos)
    {
        if(!is_null($archivo)){
            $nombre = Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->second;
            $campos['papeleta_bancaria'] = 'uploads/'.$nombre.'.'.$archivo->getClientOriginalExtension();
                $nombreArchivo = $nombre.'.'.$archivo->getClientOriginalExtension();
                \Storage::disk('uploads')->put($nombreArchivo, \File::get($archivo));
        }
        return $campos;
    }

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
        
        $options = '';

        $found=false;
        
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

            $options .= '<li class="list-group-item" ><a href="#" onclick="listaBoletinPorCategoria(' . $row->id . ')">' . str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$row->level) . $row->nombre . '</a></li>';
        }
        return $options;
    }
}
