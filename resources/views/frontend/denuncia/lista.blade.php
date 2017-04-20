@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Listado de Denuncias</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        @if ($logged_in_user)
        <h3 class="titulo">Denuncias Registradas</h3>
        <a href="{{route('frontend.denuncia.crear')}}" class="btn btn-sm btn-primary"> Registrar Una denuncia </a><br><br>
        <table class="table">
            <tr>
                <th>N°</th>
                <th>Código Generado</th>
                <th>Nombres</th>
                <th>Fecha Registro</th>
                <th>Estado</th>
                <th>Archivo</th>
                <th>Detalle</th>
            </tr>
            @if(isset($listaDenuncia))
            <?php $contador = 1; ?>
            @foreach($listaDenuncia as $denuncia)

            <tr>
                <td>{{$contador}}</td>
                <td>{{$denuncia->codigo_correlativo}}</td>
                <td>{{$denuncia->nombres.' '.$denuncia->apellido_paterno.' '.$denuncia->apellido_materno}}</td>
                <td>
                   {{$denuncia->created_at}}
                </td>
                <td>
                     @php
                        if($denuncia->estado=='1'){
                            echo '<span class="label label-danger">Creado</span>';;
                        } 
                        if($denuncia->estado=='2')
                        {
                            echo '<span class="label label-warning">Recepcionado</span>';;
                        }
                        if($denuncia->estado=='3')
                        {
                            echo '<span class="label label-info">Proceso</span>';;
                        }
                        if($denuncia->estado=='4')
                        {
                            echo '<span class="label label-success">Finalizado</span>';;
                        }
                    @endphp

                </td>
                <td>
                    <a href="{{route('frontend.denuncia.archivo',['id'=>$denuncia->id])}}">
                        
                    Descargar Formulario
                    </a>
                </td>
                <td>
                <a href="{{route('frontend.denuncia.detalle',['id'=>$denuncia->id])}}">Ver detalles</a>
                </td>
            </tr>
            <?php $contador++;?>
            @endforeach
            @endif
        </table>
        @else
        <div class="alert alert-info">
          <strong>Información!</strong> Este módulo esta disponible solo para usuarios registrados
        </div>
        @endif
    </div>
</div>
@stop