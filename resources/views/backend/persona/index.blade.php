@extends ('backend.layouts.app')

@section ('title', 'Gestión de Personas')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Personas</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Personas</h3>
            <div class="box-tools ">
                <a href="{{route('admin.persona.persona.create')}}" class="btn btn-sm btn-primary"> Crear </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="persona-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Estado Civil</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#persona-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.persona.persona.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'persona.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'nombre', name: 'persona.nombre', sortable: false},
                    {data: '_estado_civil', name: 'persona.estado_civil', sortable: false},
                    {data: 'fecha_nacimiento', name: 'persona.fecha_nacimiento', sortable: false},
                    {data: '_foto', name: 'persona.foto', sortable: false},
                    {data: '_estado', name: 'persona.estado', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

