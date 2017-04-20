@extends ('backend.layouts.app')

@section ('title', 'Gestión de Denuncias ODECO')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Denuncias ODECO</h1>
@endsection

@section('content')
    @if (access()->hasAccion('ver-odeco'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Denuncias ODECO</h3>
            <div class="box-tools ">
                @if (access()->hasAccion('crear-odeco'))
                <a href="{{route('admin.odeco.odeco.create')}}" class="btn btn-sm btn-primary"> Crear </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="odeco-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Carnet</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Seguimiento</th>
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
            $('#odeco-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.odeco.odeco.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'denuncia.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: '_nombre', name: 'denuncia.nombre', sortable: false},
                    {data: 'carnet', name: 'denuncia.carnet', sortable: false},
                    {data: 'correo', name: 'denuncia.correo', sortable: false},
                    {data: '_estado', name: 'denuncia.estado', sortable: false},
                    {data: '_seguimiento', name: 'denuncia.nombre', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

