@extends('frontend.layouts.app')



@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Lista de Convocatorias</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <h3 class="titulo">Convocatorias</h3>
    	<table class="table">
    		<tr>
    			<th>N°</th>
    			<th>Título / Convocatoria</th>
                <th>Resumen</th>
    			<th>Documentos</th>
                <th>Fecha de Públicación</th>
    			<th>Fecha Límite de Presentación</th>
                <th>Estado</th>
    			<th>Detalle</th>
    		</tr>
    		@if(isset($listaConvocatoria))
    		<?php $contador = 1; ?>
    		@foreach($listaConvocatoria as $convocatoria)

    		<tr>
    			<td>{{$contador}}</td>
                <td>{{$convocatoria->titulo}}</td>
    			<td>{{$convocatoria->resumen}}</td>
    			<td>
                @if($convocatoria->estado)
    				@foreach($convocatoria->convocatoriaMedias as $convocatoriaMedia)
    				<a href="{{asset($convocatoriaMedia->media->ruta.'/'.$convocatoriaMedia->media->nombre_archivo)}}">{{$convocatoriaMedia->media->nombre_original}}</a>
    				@endforeach
                @endif
    			</td>
    			<td>
                {{Date::parse($convocatoria->fecha_inicio.' '.$convocatoria->hora_inicio)->format('d/m/Y')}}
                </td>
                <td>
                {{Date::parse($convocatoria->fecha_fin.' '.$convocatoria->hora_fin)->format('d/m/Y')}}
                </td>
    			<td>@if($convocatoria->estado==1)
    				Habilitado
    				@else
    				No habilitado
    				@endif
    			</td>
                <td>
                <a href="{{route('frontend.detalleConvocatoria',['id'=>$convocatoria->id])}}">Ver detalles</a>
                </td>
    		</tr>
    		<?php $contador++;?>
    		@endforeach
    		@endif
    	</table>
    </div>
</div>
@stop