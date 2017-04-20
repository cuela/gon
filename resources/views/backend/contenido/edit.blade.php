@extends ('backend.layouts.app')

@section ('title', 'Gestion Contenido | Editar')

@section('page-header')
    <h1>
        Gestion Contenido {{$taxonomiaCategoria->nombre}}
        <small>Editar</small>
    </h1>
@endsection

@section('content')

@if($taxonomiaCategoria->id=='post')
    @if (access()->hasAccion('ver-articulo'))
        {{ Form::model($contenido, ['route' => ['admin.contenido.contenido.update', $contenido], 'class' => 'form-horizontal', 'contenido' => 'form', 'method' => 'PATCH', 'id' => 'editar-contenido-categoria','files'=>true]) }}
            <input type="hidden" name="taxonomia" id="taxonomia" value="{{$taxonomiaCategoria->id}}">
            <input type="hidden" name="categoria_id" id="categoria_id" value="{{$taxonomiaCategoria->id}}">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                  <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Contenido</h3>
                        </div>
                        @include('backend.contenido.form')
                  </div><!--box-->
                </div>
                <div class="col-md-3">
                    @include('backend.contenido.form_opciones')
                </div>
                <!--/.col (right) -->
            </div>

            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                        {{ link_to_route('admin.contenido.contenido.index', trans('buttons.general.cancel'), ['taxonomia'=>$taxonomiaCategoria->id], ['class' => 'btn btn-danger btn-xs']) }}
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
@endif

@if($taxonomiaCategoria->id=='page')
    @if (access()->hasAccion('ver-individual'))
        {{ Form::model($contenido, ['route' => ['admin.contenido.contenido.update', $contenido], 'class' => 'form-horizontal', 'contenido' => 'form', 'method' => 'PATCH', 'id' => 'editar-contenido-categoria','files'=>true]) }}
            <input type="hidden" name="taxonomia" id="taxonomia" value="{{$taxonomiaCategoria->id}}">
            <input type="hidden" name="categoria_id" id="categoria_id" value="{{$taxonomiaCategoria->id}}">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                  <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Contenido</h3>
                        </div>
                        @include('backend.contenido.form')
                  </div><!--box-->
                </div>
                <div class="col-md-3">
                    @include('backend.contenido.form_opciones')
                </div>
                <!--/.col (right) -->
            </div>

            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                        {{ link_to_route('admin.contenido.contenido.index', trans('buttons.general.cancel'), ['taxonomia'=>$taxonomiaCategoria->id], ['class' => 'btn btn-danger btn-xs']) }}
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
@endif

@stop
