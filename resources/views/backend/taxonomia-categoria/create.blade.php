@extends ('backend.layouts.app')

@section ('title', ' Gestión de Taxonomia Categoría | Crear')

@section('page-header')
    <h1>
        Gestión de Taxonomia Categoría
        <small>Crear</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.taxonomia.taxonomia-categoria.store', 'class' => 'form-horizontal', 'taxonomia-categoria' => 'form', 'method' => 'post', 'id' => 'create-taxonomia-categoria']) }}
        {{ Form::hidden('menu_categoria_id', session()->get('menuCategoriaId')) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.taxonomia-categoria.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.taxonomia.taxonomia-categoria.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
