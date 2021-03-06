@extends ('backend.layouts.app')

@section ('title', 'Gestion Persona | Editar')

@section('page-header')
    <h1>
        Gestion Persona
        <small>Editar</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($persona, ['route' => ['admin.persona.persona.update', $persona], 'class' => 'form-horizontal', 'persona' => 'form', 'method' => 'PATCH', 'id' => 'editar-persona','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Persona</h3>
            </div><!-- /.box-header -->
            @include('backend.persona.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.persona.persona.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
