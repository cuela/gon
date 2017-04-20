@extends ('backend.layouts.app')

@section ('title', 'Gestión Convocatoria')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión Convocatoria</h1>
@endsection

@section('content')
@if (access()->hasAccion('ver-convocatoria'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión Convocatoria</h3>
            <div class="box-tools ">
                @if (access()->hasAccion('crear-convocatoria'))
                <a href="{{route('admin.convocatoria.convocatoria.create')}}" class="btn btn-sm btn-primary"> Crear </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="convocatoria-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título / Convocatoria</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@else
    @include('backend.includes.alert')
    @endif
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#convocatoria-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.convocatoria.convocatoria.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'convocatoria.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'titulo', name: 'convocatoria.titulo', sortable: false},
                    {data: 'fecha_inicio', name: 'convocatoria.fecha_inicio', sortable: false},
                    {data: 'fecha_fin', name: 'convocatoria.fecha_fin', sortable: false},
                    {data: '_estado', name: 'convocatoria.estado', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

