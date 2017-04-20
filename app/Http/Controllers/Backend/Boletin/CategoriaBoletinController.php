<?php

namespace App\Http\Controllers\Backend\Boletin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\CategoriaBoletin\CategoriaBoletin;
use App\Http\Requests\Backend\CategoriaBoletin\ManageRequest;
use App\Http\Requests\Backend\CategoriaBoletin\StoreRequest;
use Carbon\Carbon;

class CategoriaBoletinController extends Controller
{
    

    public function index()
    {
        $lista = self::getTreeObject();
        return view('backend.categoria-boletin.index',[
        	'lista' => $lista
        ]);
    }

    
    public function create()
    {
        $maximo = is_null(CategoriaBoletin::all()->max('orden'))?0:CategoriaBoletin::all()->max('orden')+1;
        $listaPadre = self::getArrayTree();

        return view('backend.categoria-boletin.create',[
            'maximo' => $maximo,
            'listaPadre' => $listaPadre,
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();

        CategoriaBoletin::create($campos);
        
        return redirect()->route('admin.boletin.categoria-boletin.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   
        $categoriaBoletin = CategoriaBoletin::find($id);
        $listaPadre = self::getArrayTree($categoriaBoletin);
        
        return view('backend.categoria-boletin.edit',[
                'categoriaBoletin'=>$categoriaBoletin,
                'listaPadre'=>$listaPadre,
                'maximo'=>null,
        
        ]);
    }

    
    public function update($id, StoreRequest $request)
    {
        $campos = $request->all();
        
        $boletin = CategoriaBoletin::find($id);
        $boletin->update($campos);
        
        return redirect()->route('admin.boletin.categoria-boletin.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $boletin = CategoriaBoletin::find($id);
        $boletin->delete();
        return redirect()->route('admin.boletin.categoria-boletin.index')->withFlashSuccess('Registro Eliminado');
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
                    return '<span class="label label-success">Público</span>';;
                } else {
                    return '<span class="label label-warning">Privado</span>';;
                }
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'orden', $sort = 'asc')
    {
        return CategoriaBoletin::orderBy($order_by, $sort)
               ->get();
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
        
        $options = '<option value="0">La Raiz</option>';

        $found=false;
        if(is_object($model))
            $padre = $model->padre_id;
        
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

    public function getTreeObject(){
        return  self::getArrayTreeInternal(0,0);
    }
}
