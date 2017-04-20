@extends ('backend.layouts.app')

@section ('title', 'Gestión de Denuncias')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Denuncias</h1>
@endsection

@section('content')
@if (access()->hasAccion('ver-denuncia'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Denuncias</h3>
            <div class="box-tools ">
                @if (access()->hasAccion('crear-denuncia'))
                <a href="{{route('admin.denuncia.denuncia.create')}}" class="btn btn-sm btn-primary"> Crear </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="denuncia-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código Correlativo</th>
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
            $('#denuncia-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.denuncia.denuncia.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'codigo_correlativo', name: 'denuncia.codigo_correlativo', render: $.fn.dataTable.render.text(), sortable: false},
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

