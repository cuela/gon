@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li><a href="{{route('frontend.boletin')}}">Lista de Boletines</a></li>
  <li class="active">Solicitar Boletín</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        @if ($logged_in_user)
        {{ Form::open(['route' => 'frontend.boletin.guardar', 'class' => 'form-horizontal', 'boletin' => 'form', 'method' => 'post', 'id' => 'create-boletin','files'=>true]) }}
        {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Solicitar</h3>
                </div>
                <div class="box-body">
                <div class="form-group">
                    {{ Form::label('nombre_completo', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('nombre_completo', $datosUsuario->name, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombres']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('pais_id', 'País', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::selectCountryAlpha('pais_id', 'ISO 3166-2:BO', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('correo', 'Correo Electrónico', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('correo', $datosUsuario->email, ['class' => 'form-control', 'placeholder' => 'Introduzca el correo']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {!! Form::textarea('descripcion',null,['class'=>'form-control tiny-cuerpo', 'rows' => 5, 'cols' => 40]) !!}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('papeleta_bancaria', 'Papeleta Bancaria ', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('papeleta_bancaria') }}
                    </div>
                </div>
    
                </div>

            </div><!--box-->

            <div class="box box-success">
                <div class="box-body">

                    <div class="pull-right">
                        {{ Form::submit('Solicitar', ['class' => 'btn btn-success btn-xs']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->

        {{ Form::close() }}
        @else
        <div class="alert alert-info">
          <strong>Información!</strong> Este módulo esta disponible solo para usuarios registrados
        </div>
        @endif
    </div>
</div>
@stop