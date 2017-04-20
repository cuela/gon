@extends ('backend.layouts.app')

@section ('title', ' Seguimiento a Denuncia ODECO | Crear')

@section('page-header')
    <h1>
        Seguimiento a Denuncia ODECO:
        <small> Código: {{$odeco->id.' '.$odeco->nombres.' '.$odeco->apellido_paterno}}</small>
    </h1>
@endsection

@section('content')
@if (access()->hasAccion('crear-odeco'))
    {{ Form::open(['route' => 'admin.odeco.odecoSeguimiento.store', 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'post', 'id' => 'create-denuncia','files'=>true]) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Crear</h3>
            </div>
            @include('backend.odeco-seguimiento.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.odeco.odecoSeguimiento.index', trans('buttons.general.cancel'), ['id'=>$odecoId], ['class' => 'btn btn-danger btn-xs']) }}
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
