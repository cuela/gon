@extends ('backend.layouts.app')

@section ('title', 'Gestión de Usuarios Sobrevuelos')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Usuarios Sobrevuelos</h1>
@endsection

@section('content')
    @if (access()->hasAccion('ver-usuarios-sobrevuelos'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Usuarios Sobrevuelos</h3>
            <div class="box-tools ">
                @if (access()->hasAccion('agregar-cliente-usuario'))
                <a href="{{route('admin.sobrevuelo.usuarioCliente.create')}}" class="btn btn-sm btn-primary"> Agregar Usuario-Cliente </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="usuario-cliente-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Cliente</th>
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
            $('#usuario-cliente-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.sobrevuelo.usuarioCliente.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'name', name: 'users.name', sortable: false},
                    {data: 'email', name: 'users.email', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

