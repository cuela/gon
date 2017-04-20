<?php

namespace App\Repositories\Backend\Menu;

use App\Models\Menu\Menu;

class EloquentMenu implements MenuRepository
{

	private $model;


    public function __construct(Menu $model)
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

	

	public function getForDataTable($order_by = 'orden', $sort = 'asc')
	{
		$categoriaId = session()->get('menuCategoriaId');

		return $this->model->where('menu_categoria_id', $categoriaId)
               ->orderBy($order_by, $sort)
               ->get();
	}

	public  function getArrayTree($categoria, $model = null)
    {
        //dd($model);
        $lista =  self::getArrayTreeInternal($categoria,0,0);
        return self::buildTreeOptionsForSelf($lista, $model);
        
    }

    public function getTreeObject($categoria){
        return  self::getArrayTreeInternal($categoria,0,0);
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

   	public function getArrayTreeInternal($category, $parentId = 0, $level = 0)
    {
        $children = $this->model->where('menu_categoria_id',$category)
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
