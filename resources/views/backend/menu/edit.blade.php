@extends ('backend.layouts.app')

@section ('title', 'Gestión Menú | Editar')

@section('page-header')
    <h1>
        Gestión Menú
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-menu'))
    {{ Form::model($menu, ['route' => ['admin.menu.menu.update', $menu], 'class' => 'form-horizontal', 'menu' => 'form', 'method' => 'PATCH', 'id' => 'editar-menu-categoria']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Categoría Menú</h3>
            </div><!-- /.box-header -->
            @include('backend.menu.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.menu.menu.index', trans('buttons.general.cancel'), ['menu_categoria_id'=>session()->get('menuCategoriaId')], ['class' => 'btn btn-danger btn-xs']) }}
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
