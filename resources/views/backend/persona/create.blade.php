@extends ('backend.layouts.app')

@section ('title', ' Gestión de Persona | Crear')

@section('page-header')
    <h1>
        Gestión de Persona
        <small>Crear</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.persona.persona.store', 'class' => 'form-horizontal', 'persona' => 'form', 'method' => 'post', 'id' => 'create-persona','files'=>true]) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.persona.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.persona.persona.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
