@extends ('backend.layouts.app')

@section ('title', 'Gestion Configuración Básica  | Actualizar')

@section('page-header')
    <h1>
        Gestion Configuración Básica 
        <small>Actualizar</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.configuracion.basicostore', 'class' => 'form-horizontal', 'configuracion' => 'form', 'method' => 'post', 'id' => 'create-configuracion','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Configuración Básica  </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                {{ Form::label('titulo', 'Nombre del Sitio', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('sitio_titulo', $campos['sitio_titulo'], ['class' => 'form-control', 'placeholder' => 'Introduzca el Nombre del Sitio']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {!! Form::textarea('sitio_descripcion',$campos['sitio_descripcion'],['class'=>'form-control tiny-descripcion', 'rows' => 3, 'cols' => 40]) !!}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('sitio_email', 'Nombre del Sitio', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('sitio_email', $campos['sitio_email'], ['class' => 'form-control', 'placeholder' => 'Introduzca el Correo electrónico del sitio']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('sitio_url', 'URL', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('sitio_url', $campos['sitio_url'], ['class' => 'form-control', 'placeholder' => 'Introduzca el Nombre del Sitio']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('sitio_estado', 'Estado del Sitio', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::radio('sitio_estado', '1', true) }} Habilitado
                    {{ Form::radio('sitio_estado', '0') }}
                    Deshabilitado
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('sitio_slogan', 'Slogan', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('sitio_slogan', $campos['sitio_slogan'], ['class' => 'form-control', 'placeholder' => 'Introduzca el Nombre del Sitio']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('sitio_logo', 'Logo Principal', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::file('sitio_logo') }}
                    @if(isset($campos['sitio_logo']))
                        @if($campos['sitio_logo'])
                            <img src="/img/frontend/{{$campos['sitio_logo']}}" >
                        @endif
                    @endif
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('sitio_logo_secundario', 'Logo Secundario', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::file('sitio_logo_secundario') }}
                    @if(isset($campos['sitio_logo_secundario']))
                        @if($campos['sitio_logo_secundario'])
                            <img src="/img/frontend/{{$campos['sitio_logo_secundario']}}" >
                        @endif
                    @endif
                </div>
            </div>
            </div>
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
