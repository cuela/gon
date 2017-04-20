<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\Boletin\Boletin;
// use App\Models\CategoriaBoletin\CategoriaBoletin;
// use App\Models\CompraBoletin\CompraBoletin;
// use App\Models\Access\User\User;
// use App\Http\Requests\Backend\CompraBoletin\StoreRequest;
// use App\Http\Requests\Backend\CompraBoletin\ManageRequest;
// use \Auth;
// use \PDF;
// use Carbon\Carbon;

use App\Models\Sobrevuelos\UsuarioCliente\UsuarioCliente;
use App\Models\Sobrevuelos\Cliente\Cliente;
use App\Models\Sobrevuelos\NotaDebito\NotaDebito;
use App\Models\Sobrevuelos\Sobrevuelo\Sobrevuelo;
use App\Models\Sobrevuelos\MovimientoCuenta\MovimientoCuenta;

class SobrevueloController extends Controller
{

    public function index()
    {
        if(isset(\Auth::user()->id)){

            $usuarioCliente = UsuarioCliente::where('usuario_id', \Auth::user()->id)->first();
            if(is_object($usuarioCliente)){
                $cliente = Cliente::find($usuarioCliente->cliente_id);
                $listaNotaDebito = NotaDebito::where('cliente_id', $usuarioCliente->cliente_id)->orderBy('gestion', 'DESC')->orderBy('mes', 'DESC')->paginate(10, ['*'], 'page_nota');
                $listaSobrevuelo = Sobrevuelo::where('cliente_id', $usuarioCliente->cliente_id)->orderBy('fecha', 'DESC')->paginate(10, ['*'], 'page_sobrevuelo');
            } else {
                $cliente = null;
                $listaNotaDebito = null;
                $listaSobrevuelo = null;
            }
            return view('frontend.sobrevuelo.index', [
                'cliente' => $cliente,
                'listaNotaDebito' => $listaNotaDebito,
                'listaSobrevuelo' => $listaSobrevuelo,
            ]);
        } else {
            return view('frontend.permiso');
        }
    }

    public function estado(Request $request)
    {
        $notaId = $request->get('notaId');
        $listaMovimientoCuenta = MovimientoCuenta::where('nota_debito_id',$notaId)->orderBy('fecha', 'DESC')->get();
        $table="<table class='table'>
            <tr><th>Cargo</th><th>Descargo</th><tr><tr>";
            $table .="<td>";
            foreach($listaMovimientoCuenta as $movimientoCuenta){
                if($movimientoCuenta->tipo_monto=='c')
                    $table .= "$movimientoCuenta->monto<br>";
            }
            $table .="</td>";
            $table .="<td>";
            foreach($listaMovimientoCuenta as $movimientoCuenta){
                if($movimientoCuenta->tipo_monto=='c')
                    $table .= "$movimientoCuenta->monto<br>";
            }
            $table .="</td>";
        echo $table.="</tr></table>";
    }
}
