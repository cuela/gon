@extends ('backend.layouts.app')

@section ('title', 'Gestión de Pedidos de Boletines')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Pedidos de Boletines</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Pedidos de Boletines</h3>
            <div class="box-tools ">
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="boletin-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Papeleta</th>
                            <th>Estado</th>
                            <th>Vigencia</th>
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
            $('#boletin-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.boletin.compra-boletin.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'boletin.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'nombre_completo', name: 'boletin.nombre_completo', sortable: false},
                    {data: 'correo', name: 'boletin.correo', sortable: false},
                    {data: '_papeleta_bancaria', name: 'boletin.papeleta_bancaria', sortable: false},
                    {data: '_estado', name: 'boletin.estado', sortable: false},
                    {data: '_vigente', name: 'boletin.vigente', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

