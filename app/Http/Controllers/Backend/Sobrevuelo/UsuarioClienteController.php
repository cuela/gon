<?php

namespace App\Http\Controllers\Backend\Sobrevuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Sobrevuelos\UsuarioCliente\UsuarioCliente;
// use App\Http\Requests\Backend\Odeco\ManageRequest;
// use App\Http\Requests\Backend\Odeco\StoreRequest;
use Carbon\Carbon;

class UsuarioClienteController extends Controller
{
    
    public function index()
    {
        
        return view('backend.usuario-cliente.index');
    }

    
    public function create()
    {
        $maximo = is_null(Odeco::all()->max('orden'))?0:Odeco::all()->max('orden')+1;
        return view('backend.usuario-cliente.create',[
            'maximo' => $maximo
            ]);
    }

    
    public function store(StoreRequest $request)
    {
        $campos = $request->all();
        $objeto = Odeco::create($campos);
        return redirect()->route('admin.odeco.odeco.index')->withFlashSuccess('Datos guardados Correctamente');
    }

    
    public function edit($id)
    {   $odeco = Odeco::find($id);
        
        return view('backend.usuario-cliente.edit',[
                'denuncia'=>$odeco,
                'maximo' => null
            ]);
    }

    public function show($id)
    {
        $odeco = Odeco::find($id);
        
        return view('backend.usuario-cliente.show',[
                'odeco'=>$odeco,
                'maximo' => null
            ]);
    }

    
    public function update($id, ManageRequest $request)
    {
        $inputs = $request->all();
        $odeco = Odeco::find($id);
        $odeco->update($inputs);
        
        return redirect()->route('admin.odeco.odeco.index')->withFlashSuccess('Los datos Fueron Actualizados');
    }

    
    public function destroy($id)
    {
        $odeco = Odeco::find($id);
        $odeco->delete();
        return redirect()->route('admin.odeco.odeco.index')->withFlashSuccess('Registro Eliminado');
    }

    //Table Controller
    public function __invoke()
    {
        return Datatables::of(self::getForDataTable())
            ->addColumn('actions', function($odeco) {
                return $odeco->action_buttons;
            })
            ->make(true);
    }

    public function getForDataTable($order_by = 'updated_at', $sort = 'desc')
    {
        return UsuarioCliente::
            join('users', 'usuario_clientes.usuario_id', '=', 'users.id')
            ->orderBy($order_by, $sort)
            ->select('users.*')
            ->get();
    }
    
}
