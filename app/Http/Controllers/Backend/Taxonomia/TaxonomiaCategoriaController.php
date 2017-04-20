<?php

namespace App\Http\Controllers\Backend\Taxonomia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\TaxonomiaCategoria\TaxonomiaCategoriaRepository;
use App\Http\Requests\Backend\TaxonomiaCategoria\ManageRequest;
use App\Http\Requests\Backend\TaxonomiaCategoria\StoreRequest;
use Yajra\Datatables\Facades\Datatables;
use App\Models\TaxonomiaCategoria\TaxonomiaCategoria;

class TaxonomiaCategoriaController extends Controller
{
    protected $taxonomiaCategoria;

    
    public function __construct(TaxonomiaCategoriaRepository $taxonomiaCategoria)
	{
        $this->taxonomiaCategoria = $taxonomiaCategoria;
    }

    public function index(ManageRequest $request)
    {
        
        return view('backend.taxonomia-categoria.index');
    }

    
    public function create(ManageRequest $request)
    {
        return view('backend.taxonomia-categoria.create');
    }

    
    public function store(StoreRequest $request)
    {
        $this->taxonomiaCategoria->create($request->all());
        return redirect()->route('admin.taxonomia.taxonomia-categoria.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id, ManageRequest $request)
    {   $taxonomiaCategoria = TaxonomiaCategoria::find($id);
        return view('backend.taxonomia-categoria.edit',[
                'taxonomiaCategoria'=>$taxonomiaCategoria
            ]);
    }

    
    public function update(TaxonomiaCategoria $taxonomiaCategoria, StoreRequest $request)
    {
        $taxonomiaCategoria = TaxonomiaCategoria::find($request->get('id'));
        $this->taxonomiaCategoria->update($taxonomiaCategoria, $request->all());
        return redirect()->route('admin.taxonomia.taxonomia-categoria.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id, ManageRequest $request)
    {
        $taxonomiaCategoria = TaxonomiaCategoria::find($id);
        $this->taxonomiaCategoria->delete($taxonomiaCategoria);
        return redirect()->route('admin.taxonomia.taxonomia-categoria.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke(ManageRequest $request)
    {
        return Datatables::of($this->taxonomiaCategoria->getForDataTable())
            ->addColumn('actions', function($taxonomiaCategoria) {
                return $taxonomiaCategoria->action_buttons;
            })
            ->addColumn('taxonomia', function($menuCategoria) {
                return '<a href="'.route("admin.taxonomia.taxonomia.index", ['categoria_id'=>$menuCategoria->id]).'">'.$menuCategoria->nombre.'</a>';
            })
            ->make(true);
    }
}
