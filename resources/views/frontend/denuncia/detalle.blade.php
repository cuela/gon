@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Detalle de la denuncia</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        {{ Form::open(['route' => 'frontend.denuncia.guardar', 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'post', 'id' => 'create-denuncia']) }}
        {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Detalle de la denuncia.</h3>
                </div>
                <div class="box-body">

                <div class="form-group">
                    {{ Form::label('nombres', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->nombres.' '.$denuncia->apellido_paterno.' '.$denuncia->apellido_materno }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('carnet', 'Cedula de Identidad', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->carnet }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('telefono', 'Telefono Fijo / Celular', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->telefono }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('correo', 'Correo Electrónico', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->correo }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('denunciados', 'Denunciados', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->denunciados }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripción de la Denuncia', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {!! $denuncia->descripcion !!}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('estado__', 'Estado', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
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

                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('descripcion', 'Descargar Formulario', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <a href="{{route('frontend.denuncia.archivo',['id'=>$denuncia->id])}}">
                        
                    Descargar Formulario
                    </a>
                    </div>
                </div>
    
                </div>

            </div><!--box-->

        {{ Form::close() }}
    </div>
</div>
@stop