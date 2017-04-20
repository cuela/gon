@extends ('backend.layouts.app')

@section ('title', 'Detalle de la Denuncia | Ver Detalle')

@section('page-header')
    <h1>
        Detalle de la Denuncia
        <small>Ver Detalle</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-denuncia'))
    {{ Form::model($denuncia, ['route' => ['admin.denuncia.denuncia.update', $denuncia], 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'PATCH', 'id' => 'editar-denuncia-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Ver Detalle </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('codigo_correlativo', 'Código Correlativo', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->codigo_correlativo }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('nombres', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->nombres }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('apellido_paterno', 'Apellido Materno', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->apellido_paterno }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('apellido_materno', 'Apellido Paterno', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->apellido_materno }}
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
                        {{ $denuncia->descripcion }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('orden', 'Orden', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $denuncia->orden }}
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
                    {{ Form::label('estado', 'Cambiar Estado', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::radio('estado', '1', true) }} Creado
                        {{ Form::radio('estado', '2') }}                       Recepcionado
                        {{ Form::radio('estado', '3') }}                       Proceso
                        {{ Form::radio('estado', '4') }}                       Finalizado

                    </div>
                </div>
                
            </div>
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.denuncia.denuncia.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@else
@include('backend.includes.alert')
@endif
@stop
