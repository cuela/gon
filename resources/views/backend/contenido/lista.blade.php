@extends ('backend.layouts.app')

@section ('title', 'Gestión de Contenido')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Contenidos {{$taxonomiaCategoria->nombre}}</h1>
@endsection

@section('content')
    @if($taxonomia == 'post')
        @if (access()->hasAccion('ver-publicar-articulo'))
        {{ Form::open(['route' => 'admin.contenido.contenido.actualizarlista', 'class' => 'form-horizontal', 'contenido' => 'form', 'method' => 'post', 'id' => 'create-contenido','files'=>true]) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestión de Contenido </h3>
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
                                    <th><span class="label label-warning">Creado</span></th>
                                    <th><span class="label label-primary">Concluido</span></th>
                                    <th><span class="label label-success">Publicado</spanCreado</th>
                                    <th>Vista Previa</th>
                                </tr>
                            </thead>
                        </table>
                    </div><!--table-responsive-->
                </div><!-- /.box-body -->
            </div><!--box-->
            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                    </div><!--pull-left-->

                    <div class="pull-right">
                        {{ Form::submit('Actualizar Estados', ['class' => 'btn btn-success']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->
            <input type="hidden" name="taxonomia" value="{{$taxonomia}}">
        {{ Form::close() }}
        @else
            @include('backend.includes.alert')
        @endif
    @endif

    @if($taxonomia == 'page')
        @if (access()->hasAccion('ver-publicar-individual'))
        {{ Form::open(['route' => 'admin.contenido.contenido.actualizarlista', 'class' => 'form-horizontal', 'contenido' => 'form', 'method' => 'post', 'id' => 'create-contenido','files'=>true]) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestión de Contenido </h3>
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
                                    <th><span class="label label-warning">Creado</span></th>
                                    <th><span class="label label-primary">Concluido</span></th>
                                    <th><span class="label label-success">Publicado</span></th>
                                    <th>Vista Previa</th>
                                </tr>
                            </thead>
                        </table>
                    </div><!--table-responsive-->
                </div><!-- /.box-body -->
            </div><!--box-->
            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                    </div><!--pull-left-->

                    <div class="pull-right">
                        {{ Form::submit('Actualizar Estados', ['class' => 'btn btn-success']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->
            <input type="hidden" name="taxonomia" value="{{$taxonomia}}">
        {{ Form::close() }}
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
                    url: '{{ route("admin.contenido.contenido.lista",['taxonomia'=>$taxonomiaCategoria->id]) }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id', render: $.fn.dataTable.render.text(), sortable: false},
                    {data: 'titulo', name: 'titulo', sortable: false},
                    {data: 'updated_at', name: 'updated_at', sortable: false},
                    {data: 'cantidad_visita', name: 'cantidad_visita', sortable: false},
                    {data: 'nombre', name: 'nombre', sortable: false},
                    {data: '_estado_creado', name: 'estado', sortable: false, searchable: false,},
                    {data: '_estado_concluido', name: 'estado', sortable: false, searchable: false,},
                    {data: '_estado_publicado', name: 'estado', sortable: false, searchable: false,},
                    {data: '_vista', name: 'estado', sortable: false, searchable: false, "sClass": "category"}
                ],
                //order: [[3, "asc"]],
                searchDelay: 500
            });
            //http://stackoverflow.com/questions/32005995/inline-editing-save-new-values-on-button-click
            /*$('#contenido-table tbody').on( 'click', 'tr', function () {
                console.log( table.row( this ).data() );
            } );*/
        });
    </script>
@stop

