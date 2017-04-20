@extends ('backend.layouts.app')

@section ('title', 'Gestión Fragmento Código ')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión Fragmento Código </h1>
@endsection

@section('content')
@if (access()->hasRole('fragcodigo_ver'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión Fragmento Código </h3>
            <div class="box-tools ">
            <a href="{{route('admin.fragmento.fragmento.index',['type'=>1])}}" class="btn btn-sm btn-warning"> Volver </a>
            @if (access()->hasRole('fragcodigo_crear'))
                <a href="{{route('admin.fragmento.fragmento-codigo.create',['type'=>$type, 'fragmentoId'=>$fragmentoId])}}" class="btn btn-sm btn-primary"> Crear </a>
            @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="fragmento-codigo-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Fecha de creación</th>
                            <th>Estado</th>
                            <th>orden</th>
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
            $('#fragmento-codigo-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.fragmento.fragmento-codigo.get",['params'=>$fragmentoId.'_'.$type]) }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'fragmentoCategoria.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'titulo', name: 'fragmentoCategoria.titulo', sortable: false},
                    {data: 'created_at', name: 'fragmentoCategoria.created_at', sortable: false},
                    {data: '_estado', name: 'fragmentoCategoria.estado', sortable: false},
                    {data: 'orden', name: 'fragmentoCategoria.orden', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

