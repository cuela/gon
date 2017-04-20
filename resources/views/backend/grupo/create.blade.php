@extends ('backend.layouts.app')

@section ('title', ' Administración de categoría/grupo | Crear')

@section('page-header')
    <h1>
        Administración de categoría/grupo
        <small>Crear</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('crear-clasif-categoria'))
    {{ Form::open(['route' => 'admin.transparencia.grupo.store', 'class' => 'form-horizontal', 'grupo' => 'form', 'method' => 'post', 'id' => 'create-grupo','files'=>true]) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.grupo.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.transparencia.grupo.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
