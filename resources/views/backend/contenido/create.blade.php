@extends ('backend.layouts.app')

@section ('title', ' Gestión de Contenido | Crear')

@section('page-header')
    <h1>
        Gestión de Contenido {{$taxonomiaCategoria->nombre}}
        <small>Crear</small>
    </h1>
@endsection

@section('content')
@if($taxonomiaCategoria->id=='post')
    @if (access()->hasAccion('ver-articulo'))
        {{ Form::open(['route' => 'admin.contenido.contenido.store', 'class' => 'form-horizontal', 'contenido' => 'form', 'method' => 'post', 'id' => 'create-contenido','files'=>true]) }}
            <input type="hidden" name="taxonomia" id="taxonomia" value="{{$taxonomiaCategoria->id}}">
            <input type="hidden" name="categoria_id" id="categoria_id" value="{{$taxonomiaCategoria->id}}">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                  <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Crear </h3>
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
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
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
        {{ Form::open(['route' => 'admin.contenido.contenido.store', 'class' => 'form-horizontal', 'contenido' => 'form', 'method' => 'post', 'id' => 'create-contenido','files'=>true]) }}
            <input type="hidden" name="taxonomia" id="taxonomia" value="{{$taxonomiaCategoria->id}}">
            <input type="hidden" name="categoria_id" id="categoria_id" value="{{$taxonomiaCategoria->id}}">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                  <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Crear </h3>
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
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
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
