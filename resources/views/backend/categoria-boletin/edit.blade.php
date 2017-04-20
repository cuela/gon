@extends ('backend.layouts.app')

@section ('title', 'Gestión de Categoría Boletín AIP  | Editar')

@section('page-header')
    <h1>
        Gestión de Categoría Boletín AIP 
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-categoriaBoletin'))
    {{ Form::model($categoriaBoletin, ['route' => ['admin.boletin.categoria-boletin.update', $categoriaBoletin], 'class' => 'form-horizontal', 'boletin' => 'form', 'method' => 'PATCH', 'id' => 'editar-boletin-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar </h3>
            </div><!-- /.box-header -->
            @include('backend.categoria-boletin.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.boletin.categoria-boletin.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
