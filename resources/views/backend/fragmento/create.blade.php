@extends ('backend.layouts.app')

@section ('title', ' Gestión de Fragmento | Crear')

@section('page-header')
    <h1>
        Gestión de Fragmento
        <small>Crear</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.fragmento.fragmento.store', 'class' => 'form-horizontal', 'fragmento' => 'form', 'method' => 'post', 'id' => 'create-fragmento']) }}
        {{ Form::hidden('tipo', $type) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.fragmento.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.fragmento.fragmento.index', trans('buttons.general.cancel'), ['type'=>$type], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
