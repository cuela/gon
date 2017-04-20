@extends ('backend.layouts.app')

@section ('title', 'Gestion Media | Editar')

@section('page-header')
    <h1>
        Gestion Media
        <small>Editar</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($media, ['route' => ['admin.media.media.update', $media], 'class' => 'form-horizontal', 'media' => 'form', 'method' => 'PATCH', 'id' => 'editar-media']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Media</h3>
            </div><!-- /.box-header -->
            @include('backend.media.form')
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.media.media.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
