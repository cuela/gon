@extends ('backend.layouts.app')

@section ('title', 'Gestión de Categorias AIP')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Categorias AIP</h1>
@endsection

@section('content')
@if (access()->hasAccion('ver-categoriaBoletin'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de Categorias AIP</h3>
            <div class="box-tools ">
            @if (access()->hasAccion('crear-categoriaBoletin'))
                <a href="{{route('admin.boletin.categoria-boletin.create')}}" class="btn btn-sm btn-primary"> Crear </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="boletin-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($lista)>0)
                        @foreach($lista as $objeto)
                        <tr>
                            <td>{{ $objeto->id }}</td>
                            <td>{{ getNivel($objeto->level, $objeto->nombre) }}</td>
                            <td>{{ $objeto->descripcion }}</td>
                            <td>
                                @if($objeto->estado=='1')
                                    <span class="label label-success">Habilitado</span>
                                @else
                                    <span class="label label-warning">Deshabilitado</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.boletin.categoria-boletin.edit', $objeto->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.general.crud.edit') }}"></i></a> 
                                <a href="{{route('admin.boletin.categoria-boletin.destroy', $objeto->id) }}"
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
@else
    @include('backend.includes.alert')
    @endif
@stop

