@extends ('backend.layouts.app')

@section ('title', 'Gestion  Convocatoria | Editar')

@section('page-header')
    <h1>
        Gestion  Convocatoria
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-convocatoria'))
    {{ Form::model($convocatoria, ['route' => ['admin.convocatoria.convocatoria.update', $convocatoria], 'class' => 'form-horizontal', 'convocatoria' => 'form', 'method' => 'PATCH', 'id' => 'editar-convocatoria-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar </h3>
            </div><!-- /.box-header -->
            @include('backend.convocatoria.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.convocatoria.convocatoria.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
