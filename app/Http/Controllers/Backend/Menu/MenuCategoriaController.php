<?php

namespace App\Http\Controllers\Backend\Menu;

use App\Models\Menu\MenuCategoria;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Menu\ManageMenuCategoriaRequest;
use App\Http\Requests\Backend\Menu\StoreMenuCategoriaRequest;
use App\Repositories\Backend\Menu\MenuCategoriaRepository;

class MenuCategoriaController extends Controller
{
	/**
     * @var MenuCategoriaRepository
     */
    protected $menu_categorias;

    
    public function __construct(MenuCategoriaRepository $menu_categorias)
	{
        $this->menu_categorias = $menu_categorias;
    }

    public function index(ManageMenuCategoriaRequest $request)
    {
        return view('backend.menu-categoria.index');
    }

    public function create(ManageMenuCategoriaRequest $request)
    {
        return view('backend.menu-categoria.create');
    }

    public function store(StoreMenuCategoriaRequest $request)
    {
        $this->menu_categorias->create($request->all());
        return redirect()->route('admin.menu.menu-categoria.index')->withFlashSuccess('El Registro Fue creado con éxito...');
    }

    public function edit(MenuCategoria $menuCategoria, ManageMenuCategoriaRequest $request)
    {
        return view('backend.menu-categoria.edit' , array(
            'menuCategoria' => $menuCategoria
        ));
    }


    
    public function destroy(MenuCategoria $menuCategoria, ManageMenuCategoriaRequest $request)
    {
        $this->menu_categorias->delete($menuCategoria);
        return redirect()->route('admin.menu.menu-categoria.index')->withFlashSuccess(' Se elimino el registro');
    }

    

	public function __invoke(ManageMenuCategoriaRequest $request)
	{
		return Datatables::of($this->menu_categorias->getForDataTable())
			->addColumn('actions', function($menuCategoria) {
                return $menuCategoria->action_buttons;
            })
            ->addColumn('menu', function($menuCategoria) {
				return '<a href="'.route("admin.menu.menu.index", ['menu_categoria_id'=>$menuCategoria->id]).'">'.$menuCategoria->nombre.'</a>';
			})
			->make(true);
	}


}
