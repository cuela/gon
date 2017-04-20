@extends ('backend.layouts.app')

@section ('title', 'Gestion de Denuncia ODECO | Editar')

@section('page-header')
    <h1>
        Gestion de Denuncia ODECO
        <small>Editar</small>
    </h1>
@endsection

@section('content')
    @if (access()->hasAccion('editar-odeco'))
    {{ Form::model($odeco, ['route' => ['admin.odeco.odeco.update', $odeco], 'class' => 'form-horizontal', 'odeco' => 'form', 'method' => 'PATCH', 'id' => 'editar-odeco-categoria','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar </h3>
            </div><!-- /.box-header -->
            @include('backend.odeco.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.odeco.odeco.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
