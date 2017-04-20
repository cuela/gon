@extends ('backend.layouts.app')

@section ('title', 'Detalle de los datos de Contactos | Ver Detalle')

@section('page-header')
    <h1>
        Detalle de los datos de Contactos
        <small>Ver Detalle</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($contacto, ['route' => ['admin.contacto.contacto.update', $contacto], 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'PATCH', 'id' => 'editar-denuncia-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Ver Detalle </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('id', 'Código', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->id }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('nombres', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->nombres }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('telefono', 'Telefono Fijo / Celular', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->telefono }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('correo', 'Correo Electrónico', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->correo }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('empresa', 'Empresa', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->empresa }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('pais_id', 'País', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->pais_id }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('asunto', 'Asunto', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->asunto }}
                    </div>
                </div>
                
                <div class="form-group">
                    {{ Form::label('solicitud', 'Contenido de la Solicitud', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $contacto->solicitud }}
                    </div>
                </div>
                

                <div class="form-group">
                    {{ Form::label('estado', 'Cambiar Estado', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::radio('estado', '1', true) }} Activo
                        {{ Form::radio('estado', '0') }}                       Inactivo
                    </div>
                </div>
                
            </div>
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.contacto.contacto.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
