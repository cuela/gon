<?php

namespace App\Http\Controllers\Backend\Taxonomia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Taxonomia\TaxonomiaRepository;
use App\Http\Requests\Backend\Taxonomia\ManageTaxonomiaRequest;
use App\Http\Requests\Backend\Taxonomia\StoreTaxonomiaRequest;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Taxonomia\Taxonomia;
use App\Models\TaxonomiaCategoria\TaxonomiaCategoria;
use Carbon\Carbon;

class TaxonomiaController extends Controller
{
    protected $taxonomia;

    
    public function __construct(TaxonomiaRepository $taxonomia)
	{
        $this->taxonomia = $taxonomia;
    }

    public function index(ManageTaxonomiaRequest $request)
    {
        $inputs = $request->all();
        if(isset($inputs['categoria_id']))
            session()->put('taxCategoriaId', $inputs['categoria_id']);
        $taxonomiaCategoria = TaxonomiaCategoria::find($inputs['categoria_id']);
        $padreCategoria = $this->taxonomia->getTreeObject(session()->get('taxCategoriaId'));
//echo '<pre>';
//var_dump($padreCategoria);

        return view('backend.taxonomia.index', [
            'taxonomiaCategoria' => $taxonomiaCategoria,
            'padreCategoria' => $padreCategoria,
        ]);
    }

    
    public function create(ManageTaxonomiaRequest $request)
    {
        $maximo = is_null(Taxonomia::all()->max('orden'))?0:Taxonomia::all()->max('orden')+1;

        $listaPadre = $this->taxonomia->getArrayTree(session()->get('taxCategoriaId'));
        return view('backend.taxonomia.create',[
                'listaPadre'=>$listaPadre,
                'maximo'=>$maximo,
            ]);
    }

    
    public function store(StoreTaxonomiaRequest $request)
    {
        $imagen = $request->file('imagen');
        $campos = $request->all();
        if(!is_null($imagen))
            $campos = self::subirImagen($imagen, $campos);
        $this->taxonomia->create($campos);
        return redirect()->route('admin.taxonomia.taxonomia.index',[
            'categoria_id'=>session()->get('taxCategoriaId')
            ])->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id,  ManageTaxonomiaRequest $request)
    {
        $taxonomia = Taxonomia::find($id);
        $listaPadre = $this->taxonomia->getArrayTree(session()->get('taxCategoriaId'),$taxonomia);
        return view('backend.taxonomia.edit',[
                'taxonomia'=>$taxonomia,
                'listaPadre'=>$listaPadre,
                'maximo'=>null,
            ]);
    }

    
    public function update($id, Taxonomia $taxonomia, StoreTaxonomiaRequest $request)
    {
        $imagen = $request->file('imagen');
        $campos = $request->all();
        if(!is_null($imagen))
            $campos = self::subirImagen($imagen, $campos);
        $taxonomiaObject = Taxonomia::find($id);
        $this->taxonomia->update($taxonomiaObject, $campos);
        return redirect()->route('admin.taxonomia.taxonomia.index',[
            'categoria_id'=>session()->get('taxCategoriaId')
            ])->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id, ManageTaxonomiaRequest $request)
    {
        $taxonomia = Taxonomia::find($id);
        $this->taxonomia->delete($taxonomia);
        return redirect()->route('admin.taxonomia.taxonomia.index',[
            'categoria_id'=>session()->get('taxCategoriaId')
            ])->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke(ManageTaxonomiaRequest $request)
    {
        return Datatables::of($this->taxonomia->getForDataTable())
            ->addColumn('actions', function($taxonomia) {
                return $taxonomia->action_buttons;
            })
            ->make(true);
    }
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
