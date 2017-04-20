@extends ('backend.layouts.app')

@section ('title', 'Gestión Fragmento ')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión Fragmento </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión Fragmento </h3>
            <div class="box-tools ">
                <a href="{{route('admin.fragmento.fragmento.create',['type'=>$type])}}" class="btn btn-sm btn-primary"> Crear </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="fragmento-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
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
            $('#fragmento-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.fragmento.fragmento.get",['type'=>$type]) }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'fragmentoCategoria.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: '_nombre', name: 'fragmentoCategoria.nombre', sortable: false},
                    {data: '_tipo', name: 'fragmentoCategoria.descripcion', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

