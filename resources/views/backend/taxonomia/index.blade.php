@extends ('backend.layouts.app')

@section ('title', 'Gestión de Categoría')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Categoría <small>{{$taxonomiaCategoria->nombre}}</small></h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de {{$taxonomiaCategoria->nombre}}</h3>
            
            <div class="box-tools ">
                <a href="{{route('admin.taxonomia.taxonomia-categoria.index')}}" class="btn btn-sm btn-warning"> Volver </a>
                <a href="{{route('admin.taxonomia.taxonomia.create')}}" class="btn btn-sm btn-primary"> Crear </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="taxonomia-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>URL Alias</th>
                            <th>Orden</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($padreCategoria)>0)
                        @foreach($padreCategoria as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ getNivel($categoria->level, $categoria->nombre) }}</td>
                            <td>{{ $categoria->url_alias }}</td>
                            <td>{{ $categoria->orden }}</td>
                            <td>
                                <a href="{{ route('admin.taxonomia.taxonomia.edit', $categoria->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.general.crud.edit') }}"></i></a> 
                                <a href="{{route('admin.taxonomia.taxonomia.destroy', $categoria->id) }}"
                                    data-method="delete"
                                    data-trans-button-cancel="{{ trans('buttons.general.cancel') }}"
                                    data-trans-button-confirm="{{ trans('buttons.general.crud.delete')}}"
                                    data-trans-title="{{trans('strings.backend.general.are_you_sure') }}"
                                    class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.general.crud.delete') }}"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

@stop
