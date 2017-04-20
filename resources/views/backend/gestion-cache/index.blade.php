@extends ('backend.layouts.app')

@section ('title', 'Gestión de Cache')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Cache</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Cache</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
        	{{ Form::open(['route' => 'admin.gestionCache', 'class' => 'form-horizontal', 'cache' => 'form', 'method' => 'post', 'id' => 'create-cache']) }}
        	{{ Form::hidden('valor', '1') }}
            {{ Form::submit('Limpiar Cache', ['class' => 'btn btn-success btn-xl']) }}
             {{ Form::close() }}
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
