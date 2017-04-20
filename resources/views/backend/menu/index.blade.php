@extends ('backend.layouts.app')

@section ('title', 'Gestión de Menú')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Gestión de Menú <small>{{$menuCategoria->nombre}}</small></h1>
@endsection

@section('content')

@if (access()->hasAccion('ver-menu'))
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Gestión de {{$menuCategoria->nombre}}</h3>
            <div class="box-tools ">

                <a href="{{route('admin.menu.menu-categoria.index')}}" class="btn btn-sm btn-warning"> Volver </a>
                @if (access()->hasAccion('crear-menu'))
                <a href="{{route('admin.menu.menu.create')}}" class="btn btn-sm btn-primary"> Crear </a>
                @endif
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="menu-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Menú</th>
                            <th>Enlace</th>
                            <th>Texto del destino</th>
                            <th>Orden</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($padreMenu)>0)
                        @foreach($padreMenu as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ getNivel($menu->level, $menu->nombre) }}</td>
                            <td>{{ $menu->url }}</td>
                            <td>
                                @if($menu->destino=='_self')
                                    Ventana Actual
                                @else
                                    Nueva Ventana
                                @endif
                            </td>
                            <td>{{ $menu->orden }}</td>
                            <td>
                                @if($menu->estado=='1')
                                    <span class="label label-success">Habilitado</span>
                                @else
                                    <span class="label label-warning">Deshabilitado</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.menu.menu.edit', $menu->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.general.crud.edit') }}"></i></a> 
                                <a href="{{route('admin.menu.menu.destroy', $menu->id) }}"
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


