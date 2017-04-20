@extends ('backend.layouts.app')

@section ('title', ' Gestión de Fragmento Estático | Crear')

@section('page-header')
    <h1>
        Gestión de Fragmento Estático
        <small>Crear</small>
    </h1>
@endsection

@section('content')
@if (access()->hasRole('fragestatico_crear'))
    {{ Form::open(['route' => 'admin.fragmento.fragmento-estatico.store', 'class' => 'form-horizontal', 'fragmento' => 'form', 'method' => 'post', 'id' => 'create-fragmento', 'files'=>true]) }}
        {{ Form::hidden('type', $type) }}
        {{ Form::hidden('fragmentoId', $fragmentoId) }}
        {{ Form::hidden('fragmento_id', $fragmentoId) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.fragmento-estatico.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.fragmento.fragmento-estatico.index', trans('buttons.general.cancel'), ['type'=>$type,'fragmentoId'=>$fragmentoId], ['class' => 'btn btn-danger btn-xs']) }}
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
