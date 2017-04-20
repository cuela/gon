@extends('frontend.layouts.app')



@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li><a  href="{{route('frontend.transparencia')}}">Gestiones</a></li>
  <li><a  href="{{route('frontend.transparenciaCategoria', ['id'=>$gestion->id])}}">{{$gestion->gestion}}</a></li>
  <li class="active">Lista de Artículos</li>  
</ol>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-3"    >
    <aside class="sidebar animated " data-animation="fadeInLeft" > 
      <div class="widget widget-category cms-category-list">
        <div class="block_content">
          <ul class="category-list unstyled clearfix">
            @foreach($listaCategoria as $categoriaObjeto)
            <li
              @if($categoriaObjeto->id == $categoria->id)
                style="border-left: 4px solid #526aff;color:#000"
              @endif
            ><a href="{{route('frontend.transparenciaArticulo',['gestionId'=>$gestion->id, 'grupoId'=>$categoriaObjeto->id])}}" ><i class="fa fa-long-arrow-right"></i>{{$categoriaObjeto->titulo}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </aside>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-9 ">
    <div class="row">
      <div class="col-md-12">
        @foreach($listaArticulo as $articulo)
          @if($articulo->estado == 3)
          <div class="row">
            <h3>{{$articulo->titulo}}</h3>
              @if($articulo->imagen)
                <img src="{{asset($articulo->imagen)}}" alt="{{$articulo->titulo}}" width="200" class="pull-left img-responsive thumb  img-thumbnail">
              @endif()
             
             <article style="padding: 5px">{!!$articulo->resumen!!}</article>
             <a class="btn btn-blog pull-right" href="{{route('frontend.transparenciaDetalleArticulo',['gestionId'=>$gestion->id, 'grupoId'=>$categoria->id, 'articuloId'=>$articulo->id])}}">Leer Más</a> 
             <div class="clearfix"></div>
             <hr>
          </div>
          @else
            @if(access()->hasAccion('publicador-contenido-transparencia') ||  access()->hasAccion('publicar-contenido-transparencia'))
              <div class="row">
                <div class="alert alert-warning alert-dismissable">
                  <strong>¡Alerta!</strong> El contenido es privado solo esta disponible para usuarios con permisos a contenidos.
                </div>
                <h3>{{$articulo->titulo}}</h3>
                  @if($articulo->imagen)
                    <img src="{{asset($articulo->imagen)}}" alt="{{$articulo->titulo}}" width="200" class="pull-left img-responsive thumb  img-thumbnail">
                  @endif()
                 
                 <article style="padding: 5px">{!!$articulo->resumen!!}</article>
                 <a class="btn btn-blog pull-right" href="{{route('frontend.transparenciaDetalleArticulo',['gestionId'=>$gestion->id, 'grupoId'=>$categoria->id, 'articuloId'=>$articulo->id])}}">Leer Más</a> 
                 <div class="clearfix"></div>
                 <hr>
              </div>
            @endif
          @endif
        @endforeach
        {{ $listaArticulo->links() }}
      </div>
    </div>
  </div>
</div>
@stop