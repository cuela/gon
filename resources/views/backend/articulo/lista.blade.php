@extends ('backend.layouts.app')

@section ('title', 'Gestión de Contenido Transparencia')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Contenido Transparencia</h1>
@endsection

@section('content')
    @if (access()->hasAccion('publicador-contenido-transparencia'))
        {{ Form::open(['route' => 'admin.transparencia.articulo.actualizarlista', 'class' => 'form-horizontal', 'contenido' => 'form', 'method' => 'post', 'id' => 'create-contenido','files'=>true]) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestión de Contenido Transparencia </h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <div class="table-responsive">

                        <table id="contenido-table" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th><span class="label label-warning">Creado</span></th>
                                    <th><span class="label label-primary">Concluido</span></th>
                                    <th><span class="label label-success">Publicado</spanCreado</th>
                                    <th>Vista Previa</th>
                                </tr>
                            </thead>
                        </table>
                    </div><!--table-responsive-->
                </div><!-- /.box-body -->
            </div><!--box-->
            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                    </div><!--pull-left-->

                    <div class="pull-right">
                        {{ Form::submit('Actualizar Estados', ['class' => 'btn btn-success']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->
        {{ Form::close() }}
    @else
        @include('backend.includes.alert')
    @endif

@stop
@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            var table = $('#contenido-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.transparencia.articulo.lista") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'titulo', name: 'titulo', sortable: false},
                    {data: '_estado_creado', name: 'estado', sortable: false, searchable: false,},
                    {data: '_estado_concluido', name: 'estado', sortable: false, searchable: false,},
                    {data: '_estado_publicado', name: 'estado', sortable: false, searchable: false,},
                    {data: '_vista', name: 'estado', sortable: false, searchable: false, "sClass": "category"}
                ],
                //order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

