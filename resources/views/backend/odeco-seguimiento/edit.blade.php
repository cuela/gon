@extends ('backend.layouts.app')

@section ('title', 'Seguimiento a Odeco | Editar')

@section('page-header')
    <h1>
        Seguimiento a Odeco
        <small>Código: {{$odeco->id.' '.$odeco->nombres.' '.$odeco->apellido_paterno}}</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('editar-odeco'))
    {{ Form::model($seguimientoOdeco, ['route' => ['admin.odeco.odecoSeguimiento.update', $seguimientoOdeco], 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'PATCH', 'id' => 'editar-odeco-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar </h3>
            </div><!-- /.box-header -->
            @include('backend.odeco-seguimiento.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.odeco.odecoSeguimiento.index', trans('buttons.general.cancel'), ['id'=>$odeco->id], ['class' => 'btn btn-danger btn-xs']) }}
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
