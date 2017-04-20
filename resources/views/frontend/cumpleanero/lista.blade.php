@extends('frontend.layouts.app')
@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Lista de Cumpleañeros</li>
</ol>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-image hide-panel-body" style="text-align: center; padding: 5px;">
            <img src="http://www.nstp.org//images/Instructors/Nina_Tross_130x130_images_instructor.jpg" width="140" class="img-circle" />
            </div>
            <div class="panel-footer">
                sfdsf
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <h3 class="titulo">Cumpleañeros</h3>
    	<table class="table">
    		<tr>
    			<th>N°</th>
    			<th>Nombre</th>
    			<th>Estado Civil</th>
    			<th>Fecha Nacimiento</th>
                <th>Foto</th>
    		</tr>
    		@if(isset($listaPersona))
    		<?php $contador = 1; ?>
    		@foreach($listaPersona as $persona)

    		<tr>
    			<td>{{$contador}}</td>
    			<td>{{$persona->nombre}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</td>
    			<td>
                    @php
                    switch ($persona->estado_civil) {
                        case 'C':
                            $ec = 'Casado(a)';
                            break;
                        case 'S':
                            $ec = 'Soltero(a)';
                            break;
                        case 'V':
                            $ec = 'Viudo(a)';
                            break;
                        case 'D':
                            $ec = 'Divorciado(a)';
                            break;
                        default:
                            $ec='';
                            break;
                    }
                    @endphp
    				{{$ec}}
    			</td>
    			<td>{{$persona->fecha_nacimiento}} </td>
    			<td>  <img src="{{asset($persona->foto)}}" width="50" >
    			</td>
    		</tr>
    		<?php $contador++;?>
    		@endforeach
    		@endif
    	</table>
    </div>
</div>
@stop