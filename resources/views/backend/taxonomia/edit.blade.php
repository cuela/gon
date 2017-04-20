@extends ('backend.layouts.app')

@section ('title', 'Gestion Taxonomia  | Editar')

@section('page-header')
    <h1>
        Gestion Taxonomia 
        <small>Editar</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($taxonomia, ['route' => ['admin.taxonomia.taxonomia.update', $taxonomia], 'class' => 'form-horizontal', 'taxonomia' => 'form', 'method' => 'PATCH', 'id' => 'editar-taxonomia','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar  </h3>
            </div><!-- /.box-header -->
            @include('backend.taxonomia.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.taxonomia.taxonomia.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
