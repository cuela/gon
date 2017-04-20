<?php

namespace App\Repositories\Backend\Contenido;

use App\Models\Contenido\Contenido;
use App\Models\Taxonomia\Taxonomia;

class EloquentContenido implements ContenidoRepository
{

	private $model;


    public function __construct(Contenido $model)
    {
        $this->model = $model;
    }

	public function getAll()
	{

		return $this->model->all();
	}

	public function getById($id)
	{
		return $this->findById($id);
	}

	public function create(array $attributes)
	{	
		return $this->model->create($attributes);
	}

	public function update($object, array $attributes)
	{
		$object->update($attributes);

		if ($object) {
			app('cache')->flush();
		}

		return $object;
	}

	public function delete($object)
	{
		$object->delete();
		return true;
	}


	public function getForDataTable($taxonomia, $order_by = 'orden', $sort = 'desc')
    {
        /*
        if(access()->hasRole('articulo_validar') || access()->hasRole('individual_validar')){

            if(access()->hasRole('articulo_crear') || access()->hasRole('individual_crear')){
                return $this->model->where('contenidos.categoria_id', $taxonomia)
                       ->join('taxonomias', 'contenidos.taxonomia_id', '=', 'taxonomias.id')
                       ->orderBy($order_by, $sort)
                       ->select('contenidos.*', 'taxonomias.nombre')
                       ->get();    
            } else {
                return $this->model->where('contenidos.categoria_id', $taxonomia)
                       ->where('contenidos.estado',2) //publicado
                       ->join('taxonomias', 'contenidos.taxonomia_id', '=', 'taxonomias.id')
                       ->orderBy($order_by, $sort)
                       ->select('contenidos.*', 'taxonomias.nombre')
                       ->get();    
            }
        } else {
            return $this->model->where('contenidos.categoria_id', $taxonomia)
                    ->where('contenidos.usuario_id',\Auth::user()->id)
                    ->join('taxonomias', 'contenidos.taxonomia_id', '=', 'taxonomias.id')
                   ->orderBy($order_by, $sort)
                   ->select('contenidos.*', 'taxonomias.nombre')
                   ->get();
        }*/

        return $this->model->where('contenidos.categoria_id', $taxonomia)
                    ->where('contenidos.usuario_id',\Auth::user()->id)
                    ->join('taxonomias', 'contenidos.taxonomia_id', '=', 'taxonomias.id')
                   ->orderBy($order_by, $sort)
                   ->select('contenidos.*', 'taxonomias.nombre')
                   ->get();

    }

    public function getForDataTableLista($taxonomia, $order_by = 'orden', $sort = 'desc')
	{
        return $this->model->where('contenidos.categoria_id', $taxonomia)
                    ->join('taxonomias', 'contenidos.taxonomia_id', '=', 'taxonomias.id')
                   ->orderBy($order_by, $sort)
                   ->select('contenidos.*', 'taxonomias.nombre')
                   ->get();

	}


	public  function getArrayTree($categoria, $model = null)
    {
        $lista =  self::getArrayTreeInternal($categoria,0,0);
        return self::buildTreeOptionsForSelf($lista, $model);
    }

    public function getTreeObject($categoria)
    {
        return  self::getArrayTreeInternal($categoria,0,0);
    }

    public  function buildTreeOptionsForSelf($treeArray,$model=null)
    {
        $options = '';

        $found=false;
        if(is_object($model))
            $taxonomia = $model->taxonomia_id;   
        foreach($treeArray as $row)
        {
            $theId = intval($row->level);
            $style = '';
            if($model!=null)
            {
                if($row->id === $taxonomia)
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

   	public function getArrayTreeInternal($category, $parentId = 0, $level = 0)
    {
        $children = Taxonomia::where('categoria_id',$category)
        		->where('padre_id',$parentId)
        	   ->orderBy('orden', 'asc')
               ->get();

        $items =[];
        foreach ($children as $child)
        {
            $child->level=$level;
            $items[$child->id]=$child;
            $temp = self::getArrayTreeInternal($category,$child->id, $level + 1);
            $items = array_merge($items, $temp);
        }
        return $items;
    }
}
