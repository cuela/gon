@extends ('backend.layouts.app')

@section ('title', 'Administración de Artículos')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Administración de Artículos</h1>
@endsection

@section('content')
@if (access()->hasAccion('ver-contenido-transparencia'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Administración de Artículos</h3>
            <div class="box-tools ">
                @if (access()->hasAccion('crear-contenido-transparencia'))
                <a href="{{route('admin.transparencia.articulo.create')}}" class="btn btn-sm btn-primary"> Crear </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="articulo-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Estado</th>
                            <th>Orden</th>
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
            $('#articulo-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.transparencia.articulo.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'titulo', name: 'titulo', sortable: true},
                    {data: '_estado', name: 'estado', sortable: false},
                    {data: 'orden', name: 'orden', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

