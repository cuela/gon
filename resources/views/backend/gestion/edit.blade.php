@extends ('backend.layouts.app')

@section ('title', 'Administración de Gestión | Editar')

@section('page-header')
    <h1>
        Administración de Gestión
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-clasif-gestion'))
    {{ Form::model($gestion, ['route' => ['admin.transparencia.gestion.update', $gestion], 'class' => 'form-horizontal', 'gestion' => 'form', 'method' => 'PATCH', 'id' => 'editar-gestion','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar gestión</h3>
            </div><!-- /.box-header -->
            @include('backend.gestion.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.transparencia.gestion.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
