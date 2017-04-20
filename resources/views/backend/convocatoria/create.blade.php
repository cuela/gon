@extends ('backend.layouts.app')

@section ('title', ' Gestión de Convocatoria | Crear')

@section('page-header')
    <h1>
        Gestión de Convocatoria
        <small>Crear</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('crear-convocatoria'))
    {{ Form::open(['route' => 'admin.convocatoria.convocatoria.store', 'class' => 'form-horizontal', 'convocatoria' => 'form', 'method' => 'post', 'id' => 'create-convocatoria','files'=>true]) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.convocatoria.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.convocatoria.convocatoria.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@else
@include('backend.includes.alert')
@endif
@stop
