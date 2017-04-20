@extends ('backend.layouts.app')

@section ('title', ' Gestión de Denuncia | Crear')

@section('page-header')
    <h1>
        Gestión de Denuncia
        <small>Crear</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('crear-denuncia'))
    {{ Form::open(['route' => 'admin.denuncia.denuncia.store', 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'post', 'id' => 'create-denuncia','files'=>true]) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.denuncia.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.denuncia.denuncia.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
