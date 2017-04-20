@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.menu.menu-category.management') . ' | Editar')

@section('page-header')
    <h1>
        {{ trans('labels.backend.menu.menu-category.managementt') }}
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-menu'))
    {{ Form::model($menuCategoria, ['route' => ['admin.menu.menu-categoria.update', $menuCategoria], 'class' => 'form-horizontal', 'menuCategoria' => 'form', 'method' => 'PATCH', 'id' => 'editar-menu-categoria']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Categoría Menú</h3>
            </div><!-- /.box-header -->
            {{$menuCategoria}}
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('id', 'Código', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('id', $menuCategoria->id, ['class' => 'form-control', 'placeholder' => 'Introduzca un código tipo texto']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('nombre', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.role.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
