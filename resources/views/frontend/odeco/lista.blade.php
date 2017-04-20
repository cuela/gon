@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Listado de Denuncias de ODECO</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        @if ($logged_in_user)
        <h3 class="titulo">Denuncias Registradas</h3>
        <a href="{{route('frontend.odeco.crear')}}" class="btn btn-sm btn-primary"> Registrar Una denuncia </a><br><br>
        <table class="table">
            <tr>
                <th>N°</th>
                <th>Nombres</th>
                <th>Fecha Registro</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
            @if(isset($listaOdeco))
            <?php $contador = 1; ?>
            @foreach($listaOdeco as $odeco)

            <tr>
                <td>{{$contador}}</td>
                <td>{{$odeco->nombres.' '.$odeco->apellido_paterno.' '.$odeco->apellido_materno}}</td>
                <td>
                   {{$odeco->created_at}}
                </td>
                <td>
                     @php
                        if($odeco->estado=='1'){
                            echo '<span class="label label-danger">Creado</span>';;
                        } 
                        if($odeco->estado=='2')
                        {
                            echo '<span class="label label-warning">Recepcionado</span>';;
                        }
                        if($odeco->estado=='3')
                        {
                            echo '<span class="label label-info">Proceso</span>';;
                        }
                        if($odeco->estado=='4')
                        {
                            echo '<span class="label label-success">Finalizado</span>';;
                        }
                    @endphp

                </td>
                <td>
                <a href="{{route('frontend.odeco.detalle',['id'=>$odeco->id])}}">Ver detalles</a>
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