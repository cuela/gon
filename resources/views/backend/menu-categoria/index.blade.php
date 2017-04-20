@extends ('backend.layouts.app')

@section ('title', 'Gestión de Categoría Menú')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ 'Gestión de Categoría Menú' }}</h1>
@endsection

@section('content')
@if (access()->hasAccion('ver-menu'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ 'Gestión de Categoría Menú' }}</h3>
            <div class="box-tools ">
                <a href="{{route('admin.menu.menu-categoria.create')}}" class="btn btn-sm btn-primary"> Crear </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="menu-categoria-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.menu.menu-category.table.id') }}</th>
                            <th>{{ trans('labels.backend.menu.menu-category.table.nombre') }}</th>
                            <th>{{ trans('labels.backend.menu.menu-category.table.descripcion') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
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
            $('#menu-categoria-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.menu.menu-categoria.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'menu_categorias.id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'menu', name: 'menu_categorias.menu', sortable: false},
                    {data: 'descripcion', name: 'menu_categorias.descripcion', searchable: false, sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop