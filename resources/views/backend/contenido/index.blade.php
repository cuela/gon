@extends ('backend.layouts.app')

@section ('title', 'Gestión de Contenido')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Contenido {{$taxonomiaCategoria->nombre}}</h1>
@endsection

@section('content')
@if($taxonomia == 'post')
    @if (access()->hasAccion('ver-articulo'))
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Gestión de Contenido </h3>
                <div class="box-tools ">
                    @if(access()->hasAccion('crear-articulo') )
                    <a href="{{route('admin.contenido.contenido.create',['taxonomia'=>$taxonomiaCategoria->id])}}" class="btn btn-sm btn-primary"> Crear Contenido </a>
                    @endif
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="table-responsive">
                    <table id="contenido-table" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Fecha de actualización</th>
                                <th>Visitas</th>
                                <th>Categoría</th>
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
@endif

@if($taxonomia == 'page')
    @if (access()->hasAccion('ver-individual'))
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Gestión de Contenido </h3>
                <div class="box-tools ">
                    @if(access()->hasAccion('crear-individual') )
                    <a href="{{route('admin.contenido.contenido.create',['taxonomia'=>$taxonomiaCategoria->id])}}" class="btn btn-sm btn-primary"> Crear Página </a>
                    @endif
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="table-responsive">
                    <table id="contenido-table" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Fecha de actualización</th>
                                <th>Visitas</th>
                                <th>Categoría</th>
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
@endif
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            var table = $('#contenido-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.contenido.contenido.get",['taxonomia'=>$taxonomiaCategoria->id]) }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'titulo', name: 'titulo', sortable: false},
                    {data: 'updated_at', name: 'updated_at', sortable: false},
                    {data: 'cantidad_visita', name: 'cantidad_visita', sortable: false},
                    {data: 'nombre', name: 'nombre', sortable: false},
                    {data: '_estado', name: 'estado', sortable: false, searchable: false,},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                //order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

