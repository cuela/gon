@extends ('backend.layouts.app')

@section ('title', 'Gestion Taxonomia Categoría | Editar')

@section('page-header')
    <h1>
        Gestion Taxonomia Categoría
        <small>Editar</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($taxonomiaCategoria, ['route' => ['admin.taxonomia.taxonomia-categoria.update', $taxonomiaCategoria], 'class' => 'form-horizontal', 'taxonomiaCategoria' => 'form', 'method' => 'PATCH', 'id' => 'editar-taxonomiaCategoria-categoria']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Categoría Menú</h3>
            </div><!-- /.box-header -->
            @include('backend.taxonomia-categoria.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.taxonomia.taxonomia-categoria.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
