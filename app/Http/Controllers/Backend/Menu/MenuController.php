<?php

namespace App\Http\Controllers\Backend\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Menu\MenuRepository;
use App\Http\Requests\Backend\Menu\ManageMenuRequest;
use App\Http\Requests\Backend\Menu\StoreMenuRequest;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Menu\Menu;
use App\Models\Menu\MenuCategoria;
use Carbon\Carbon;

class MenuController extends Controller
{

	protected $menu;

    
    public function __construct(MenuRepository $menu)
	{
        $this->menu = $menu;
    }

    public function index(ManageMenuRequest $request)
    {

        $inputs = $request->all();
        if(isset($inputs['menu_categoria_id']))
            session()->put('menuCategoriaId', $inputs['menu_categoria_id']);
        $menuCategoria = MenuCategoria::find($inputs['menu_categoria_id']);

        $padreMenu = $this->menu->getTreeObject(session()->get('menuCategoriaId'));
        
        return view('backend.menu.index',[
            'menuCategoria' => $menuCategoria,
            'padreMenu' => $padreMenu,
        ]);
    }

    
    public function create(ManageMenuRequest $request)
    {   
        $maximo = is_null(Menu::all()->max('orden'))?0:Menu::all()->max('orden')+1;

        $padreMenu = $this->menu->getArrayTree(session()->get('menuCategoriaId'));

        return view('backend.menu.create',[
                'padreMenu'=>$padreMenu,
                'maximo'=>$maximo,
            ]);
    }

    
    public function store(StoreMenuRequest $request)
    {
        $imagen = $request->file('imagen');
        $campos = $request->all();
        $campos = self::subirImagen($imagen, $campos);
        
        $this->menu->create($campos);
        return redirect()->route('admin.menu.menu.index',[
            'menu_categoria_id'=>session()->get('menuCategoriaId')
            ])->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit(Menu $menu, ManageMenuRequest $request)
    {
         $padreMenu = $this->menu->getArrayTree(session()->get('menuCategoriaId'),$menu);
        return view('backend.menu.edit',[
                'padreMenu'=>$padreMenu,
                'maximo'=>null,
            ])
            ->withMenu($menu);
    }

    
    public function update(Menu $menu, StoreMenuRequest $request)
    {
        $imagen = $request->file('imagen');
        $campos = $request->all();
        $campos = self::subirImagen($imagen, $campos);
        $this->menu->update($menu, $campos);
        return redirect()->route('admin.menu.menu.index',[
            'menu_categoria_id'=>session()->get('menuCategoriaId')
            ])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy(Menu $menu, ManageMenuRequest $request)
    {
        $this->menu->delete($menu);
        return redirect()->route('admin.menu.menu.index',[
            'menu_categoria_id'=>session()->get('menuCategoriaId')
            ])->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller

    public function __invoke(ManageMenuRequest $request)
    {
        return Datatables::of($this->menu->getForDataTable())
            ->addColumn('_destino', function($menu){
                if($menu->destino=='_self'){
                    return 'Ventana Actual';
                } else {
                    return 'Nueva ventana';
                }
            })
            ->addColumn('_estado', function($menu){
                if($menu->estado=='1'){
                    return '<span class="label label-success">Habilitado</span>';;
                } else {
                    return '<span class="label label-warning">Deshabilitado</span>';;
                }
            })
            ->addColumn('actions', function($menu) {
                return $menu->action_buttons;
            })
            ->make(true);
    }


    //metodos adicionales
    public function subirImagen($archivo, $campos)
    {
        if(!is_null($archivo)){
            $nombre = Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->second;
            $campos['imagen'] = $nombre.'.'.$archivo->getClientOriginalExtension();
                $nombreArchivo = $nombre.'.'.$archivo->getClientOriginalExtension();
                \Storage::disk('uploads')->put($nombreArchivo, \File::get($archivo));
        }
        return $campos;
    }

}
