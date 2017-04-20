@extends ('backend.layouts.app')

@section ('title', 'Detalle de la Denuncia | Ver Detalle')

@section('page-header')
    <h1>
        Detalle de la Denuncia
        <small>Ver Detalle</small>
    </h1>
@endsection
@section('after-styles-end')
    {{ Html::style("js/backend/plugin/datepicker/datepicker3.css") }}
@stop
@section('content')
    {{ Form::model($compraBoletin, ['route' => ['admin.boletin.compra-boletin.update', $compraBoletin], 'class' => 'form-horizontal', 'boletin' => 'form', 'method' => 'PATCH', 'id' => 'editar-boletin-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Ver Detalle </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('id', 'ID', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $compraBoletin->id }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('nombre_completo', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $compraBoletin->nombre_completo }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('pais_id', 'País', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $compraBoletin->pais_id }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('correo', 'Correo Electrónico', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ $compraBoletin->correo }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('papeleta_bancaria', 'Papeleta Bancaria', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        @if($compraBoletin->papeleta_bancaria)
                        <a href="{{ asset($compraBoletin->papeleta_bancaria) }}">Descargar</a>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('fecha_inicio_activacion', 'Fecha Inicio de Activación', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('fecha_inicio_activacion', null, ['class' => 'form-control datepicker', 'placeholder' => 'Introduzca la fecha de inicio de activación']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('fecha_fin_activacion', 'Fecha Fin de Activación', ['class' => 'col-lg-2 control-label ']) }}

                    <div class="col-lg-10">
                        {{ Form::text('fecha_fin_activacion', null, ['class' => 'form-control datepicker', 'placeholder' => 'Introduzca la fecha límite de activación' ]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('estado', 'Cambiar Estado', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::radio('estado', '1', true) }} Habilitado
                        {{ Form::radio('estado', '2') }}   Deshabilitado
                        {{ Form::radio('estado', '3') }}   Finalizado / Caducado

                    </div>
                </div>
                
            </div>
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.boletin.compra-boletin.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
@section('after-scripts-end')
{{ Html::script("js/backend/plugin/datepicker/bootstrap-datepicker.js") }}
 <script>
    $('#fecha_inicio_activacion').datepicker({  
        autoclose: true,
        format: "dd/mm/yyyy",
        forceParse: false,
        language: "es",
    });
    $('#fecha_fin_activacion').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy",
        forceParse: false,
        language: "es",
    });
</script>
@stop