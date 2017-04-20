<?php

namespace App\Repositories\Frontend\Site;

use App\Repositories\Repository;
use App\Models\Menu\Menu;
use App\Models\FragmentoEstatico\FragmentoEstatico;
use App\Models\FragmentoCodigo\FragmentoCodigo;
use App\Models\Configuracion\Configuracion;
use App\Models\Taxonomia\Taxonomia;
use App\Models\Contenido\Contenido;
use App\Models\Plantilla\Plantilla;
use Illuminate\Support\Facades\DB;


class SiteRepository extends Repository
{
	public static function getMenu($category,$parentId)
    {
        $items = self::getChildren($category,$parentId,1);
        return self::getMenuHtmlInternal($category, $items);
    }

    public static function getChildren($category,$parentId,$status=null)
    {
        $items = [];
        $menus = self::getMenusByCategory($category);
        foreach ($menus as $menu)
        {
            if((int)$menu->padre_id == $parentId)
            {
                if($status && (int)$menu->estado!==1)
                {
                    continue;
                }
                $items[]=$menu;
            }
        }
        return $items;
    }

    public static function getMenusByCategory($category,$fromCache = true)
    {
        $values = self::getArrayTreeInternal($category,0,0);
        
        return $values;
    }

    public static function getArrayTreeInternal($category, $parentId = 0, $level = 0)
    {
        $children = Menu::where('menu_categoria_id',$category)
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

    private static function getMenuHtmlInternal($category,$items)
    {
        $html='';
        foreach ($items as $menu)
        {
            $children = self::getChildren($category,$menu['id'],1);

            if(count($children)>0)
            {
                $html .= '<li id="menu-item-'.$menu['id'].'" class="dropdown menu-item menu-item-type-'.$category.' menu-item-'.$menu['id'].' menu-item-has-children"><a href="'.url($menu['url']).'" target="'.$menu['destino'].'" data-toggle="dropdown" class="dropdown-toggle border-hover-color1">'.$menu['nombre'].' <i class="fa fa-angle-down"></i></a>';
                $html.='<ul class="dropdown-menu sub-menu sub-menu-'.$menu['id'].'">';
                $html.=self::getMenuHtmlInternal($category, $children);
                $html.='</ul>';
                $html.='</li>';
            }
            else
            {
                $html .= '<li id="menu-item-'.$menu['id'].'" class="menu-item menu-item-type-'.$category.' menu-item-'.$menu['id'].'"><a href="'.$menu['url'].'" target="'.$menu['destino'].'">'.$menu['nombre'].'</a>';
                $html.='</li>';
            }
        }
        return $html;
    }

    public static function getFragmentoEstaticoPorID($id)
    {
        return FragmentoEstatico::where('fragmento_id',$id)
                ->where('estado',1)
               ->get();
    }

    public static function getFragmentoCodigoPorID($id)
    {
        return FragmentoCodigo::where('fragmento_id',$id)
                ->where('estado',1)
               ->get();
    }

    public static function getSlogan()
    {
        $slogan = Configuracion::where('id','sitio_slogan')
               ->first();
        return $slogan->valor;
    }

    public static function getConfig()
    {
        $inputs=[];
        $lista = Configuracion::get();
        foreach($lista as $objeto){
            $inputs[$objeto->id]=$objeto->valor;
        }
        return $inputs;
    }
    
    public static function getCategorias($tipo = 'post')
    {
        return Taxonomia::join('contenidos', 'taxonomias.id', '=', 'contenidos.taxonomia_id')
        ->where('taxonomias.categoria_id',$tipo)
        ->select(DB::raw('count(contenidos.id) as cantidad, taxonomias.id, taxonomias.nombre'))
        ->groupBy('taxonomias.id', 'taxonomias.nombre')
        ->get();
    }

    public static function getUltimasEntradas($tipo = 'post')
    {
        return Contenido::where('estado',3)//3=publicado
        ->where('categoria_id',$tipo)
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get();
    }

    public static function getMasVisitados($tipo = 'post')
    {
        return Contenido::where('estado',3)//3=publicado
        ->where('categoria_id',$tipo)
        ->orderBy('cantidad_visita', 'desc')
        ->limit(5)
        ->get();
    }

    public static function getDatosBloque($bloque){
        $bloques = Plantilla::where('bloque',$bloque)
        ->orderBy('orden')->get();
        $listas=[];
        foreach ($bloques as $bloque) {
            $objeto = DB::table($bloque->tipo)->where('id',$bloque->codigo)->where('estado',1)->first();
            $lista = DB::table($bloque->tabla_datos)->where('fragmento_id',$bloque->codigo)->where('estado',1)->get();
            $listas[] = ['objeto'=>$objeto, 'lista'=>$lista];
        }
        return $listas;
    }
}