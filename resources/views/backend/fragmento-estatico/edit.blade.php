@extends ('backend.layouts.app')

@section ('title', 'Gestion Fragmento Estático | Editar')

@section('page-header')
    <h1>
        Gestion Fragmento Estático
        <small>Editar</small>
    </h1>
@endsection

@section('content')
@if (access()->hasRole('fragestatico_editar'))
    {{ Form::model($fragmentoEstatico, ['route' => ['admin.fragmento.fragmento-estatico.update', $fragmentoEstatico], 'class' => 'form-horizontal', 'fragmentoEstatico' => 'form', 'method' => 'PATCH', 'id' => 'editar-fragmento', 'files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Fragmento</h3>
            </div><!-- /.box-header -->
            @include('backend.fragmento-estatico.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.fragmento.fragmento-estatico.index', trans('buttons.general.cancel'), ['type'=>$type,'fragmentoId'=>$fragmentoId], ['class' => 'btn btn-danger btn-xs']) }}
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
