@extends ('backend.layouts.app')

@section ('title', ' Gestión de Boletín | Crear')

@section('page-header')
    <h1>
        Gestión de Boletín
        <small>Crear</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.boletin.boletin.store', 'class' => 'form-horizontal', 'boletin' => 'form', 'method' => 'post', 'id' => 'create-boletin','files'=>true]) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.boletin.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.boletin.boletin.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
