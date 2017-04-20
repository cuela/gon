@extends ('backend.layouts.app')

@section ('title', 'Gestión de Boletín AIP')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Boletín AIP</h1>
@endsection

@section('content')
@if (access()->hasAccion('ver-boletin'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Boletín AIP</h3>
            <div class="box-tools ">
            @if (access()->hasAccion('crear-boletin'))
                <a href="{{route('admin.boletin.boletin.create')}}" class="btn btn-sm btn-primary"> Crear </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="boletin-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Visibilidad</th>
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
            $('#boletin-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.boletin.boletin.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'boletin.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'titulo', name: 'boletin.titulo', sortable: false},
                    {data: 'descripcion', name: 'boletin.descripcion', sortable: false},
                    {data: '_visibilidad', name: 'boletin.visibilidad', sortable: false},
                    {data: '_estado', name: 'boletin.estado', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

