@extends ('backend.layouts.app')

@section ('title', 'Seguimiento a la Denuncia')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Seguimiento a la Denuncia</h1>
@endsection

@section('content')
@if (access()->hasAccion('ver-denuncia'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Seguimiento a la Denuncia</h3>
            <div class="box-tools ">
                @if (access()->hasAccion('crear-denuncia'))
                <a href="{{route('admin.denuncia.denunciaSeguimiento.create',['denunciaId'=>$denunciaId])}}" class="btn btn-sm btn-primary"> Crear  Seguimiento </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="denuncia-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Archivo</th>
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
            $('#denuncia-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.denuncia.denunciaSeguimiento.get",["denunciaId"=>$denunciaId]) }}',
                    type: 'post'
                },
                columns: [
                    {data: 'descripcion', name: 'denuncia.descripcion', sortable: false},
                    {data: '_archivo', name: 'denuncia.archivo', sortable: false},
                    {data: '_estado', name: 'denuncia.estado', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

