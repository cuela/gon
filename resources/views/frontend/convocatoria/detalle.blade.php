@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li><a href="{{route('frontend.listaConvocatoria')}}">Lista de Convocatorias</a></li>
  <li class="active">Convocatoria: {{$convocatoria->titulo}}</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h3 class="titulo">Detalle de la convocatoria</h3>
        <table class="table">
            <tr> <td><b>Título / Convocatoria:</b></td> <td>{{$convocatoria->titulo}}</td></tr>
            <tr> <td><b>Resumen:</b></td> <td>{{$convocatoria->resumen}}</td></tr>
            <tr> <td><b>Descripción:</b></td> <td>{!!$convocatoria->descripcion!!}</td></tr>
            <tr> <td><b>Fecha de Publicación:</b></td> <td>{{Date::parse($convocatoria->fecha_inicio.' '.$convocatoria->hora_inicio)->format('d/m/Y')}}</td></tr>
            <tr> <td><b>Fecha Límite:</b></td> <td>{{Date::parse($convocatoria->fecha_fin.' '.$convocatoria->hora_fin)->format('d/m/Y')}}</td></tr>
            <tr> <td><b>Lugar:</b></td> <td>{{$convocatoria->lugar}}</td></tr>
            <tr> <td><b>Documentos Adjuntos:</b></td> 
                <td>
                @if($convocatoria->estado)
                    @foreach($convocatoria->convocatoriaMedias as $convocatoriaMedia)
                    <a href="{{asset($convocatoriaMedia->media->ruta.'/'.$convocatoriaMedia->media->nombre_archivo)}}" target="_blank">{{$convocatoriaMedia->media->nombre_original}}</a>
                    @endforeach
                @endif
                </td>
            </tr>
            
            <tr> <td><b>Estado:</b></td> <td>@if($convocatoria->estado==1)
                    Habilitado
                    @else
                    No Habilitado
                    @endif</td></tr>
        </table>
    </div>
</div>
@stop
