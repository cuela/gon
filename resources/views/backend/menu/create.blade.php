@extends ('backend.layouts.app')

@section ('title', ' Gestión de Menú | Crear')

@section('page-header')
    <h1>
        Gestión de Menú
        <small>Crear</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('crear-menu'))
    {{ Form::open(['route' => 'admin.menu.menu.store', 'class' => 'form-horizontal', 'menu' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files'=>true]) }}
        {{ Form::hidden('menu_categoria_id', session()->get('menuCategoriaId')) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Menú</h3>
            </div>
            @include('backend.menu.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.menu.menu.index', trans('buttons.general.cancel'), ['menu_categoria_id'=>session()->get('menuCategoriaId')], ['class' => 'btn btn-danger btn-xs']) }}
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
