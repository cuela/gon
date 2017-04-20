@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Registrar una Denuncia</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        {{ Form::open(['route' => 'frontend.odeco.guardar', 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'post', 'id' => 'create-denuncia']) }}
        {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear</h3>
                </div>
                <div class="box-body">

                <div class="form-group">
                    {{ Form::label('nombres', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombres']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('apellido_paterno', 'Apellido Materno', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Materno']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('apellido_materno', 'Apellido Paterno', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Paterno']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('carnet', 'Cedula de Identidad', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('carnet', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el carnet']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('telefono', 'Telefono Fijo / Celular', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el telefono']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('correo', 'Correo Electrónico', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el correo']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('denuncia', 'Descripción de la Denuncia', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {!! Form::textarea('denuncia',null,['class'=>'form-control tiny-denuncia', 'rows' => 5, 'cols' => 40]) !!}
                    </div>
                </div>
    
                </div>

            </div><!--box-->

            <div class="box box-success">
                <div class="box-body">

                    <div class="pull-right">
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->

        {{ Form::close() }}
    </div>
</div>
@stop