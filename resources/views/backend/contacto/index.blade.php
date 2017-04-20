@extends ('backend.layouts.app')

@section ('title', 'Gestión de Contactos')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Contactos</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Contactos</h3>
            <div class="box-tools ">
                <a href="{{route('admin.contacto.contacto.create')}}" class="btn btn-sm btn-primary"> Crear </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="contacto-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Asunto</th>
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
            $('#contacto-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.contacto.contacto.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'contacto.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'nombres', name: 'contacto.nombres', sortable: false},
                    {data: 'correo', name: 'contacto.correo', sortable: false},
                    {data: '_asunto', name: 'contacto.asunto', sortable: false},
                    {data: '_estado', name: 'contacto.estado', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

