@extends ('backend.layouts.app')

@section ('title', 'Gestión Boletín AIP  | Editar')

@section('page-header')
    <h1>
        Gestión Boletín AIP 
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-boletin'))
    {{ Form::model($boletin, ['route' => ['admin.boletin.boletin.update', $boletin], 'class' => 'form-horizontal', 'boletin' => 'form', 'method' => 'PATCH', 'id' => 'editar-boletin-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar </h3>
            </div><!-- /.box-header -->
            @include('backend.boletin.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.boletin.boletin.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
