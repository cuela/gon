@extends ('backend.layouts.app')

@section ('title', 'Administración de Categoría/Grupo | Editar')

@section('page-header')
    <h1>
        Administración de Categoría/Grupo
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-clasif-categoria'))
    {{ Form::model($grupo, ['route' => ['admin.transparencia.grupo.update', $grupo], 'class' => 'form-horizontal', 'grupo' => 'form', 'method' => 'PATCH', 'id' => 'editar-grupo','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar gestión</h3>
            </div><!-- /.box-header -->
            @include('backend.grupo.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.transparencia.grupo.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
