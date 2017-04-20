@extends('frontend.layouts.app')




@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb breadcrumb2">
		  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
		  <li class="active">{{$titulo}}</li>
		</ol>
	</div>	
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9">
      <h3 class="titulo">
        {{$titulo}}
      </h3>
      @foreach($contenidos as $contenido)
      @if($contenido->estado=='2')
        @if (access()->hasAccion('publicar-articulo') || access()->hasAccion('ver-publicar-articulo')) 
        <article class="post media-image   format-image animated" data-animation="bounceInUp">
          
          <div class="well" style="border:none; border-radius: none">
            <div class="alert alert-warning alert-dismissable">
              <strong>¡Alerta!</strong> Es contenido es privado solo esta disponible para usuarios con permisos a contenidos.
            </div>
            <div>
               <h4 class="media-heading"> <a href="{{route('frontend.postDetalle', ['id'=>$contenido->id])}}">{{$contenido->titulo}}</a></h4>
              <div style="text-align: center;">
              @if($contenido->imagen) 
              <a href="{{route('frontend.postDetalle', ['id'=>$contenido->id])}}">
                <img class="img-thumbnail" src="{{asset($contenido->imagen)}}">
              </a>
              @endif
              </div>
              <div class="media-body">
               
                <p class="text">{{$contenido->nombre_usuario}}</p>
                <p>{{$contenido->resumen}}</p>

                </div>
                <ul class="list-inline list-unstyled">
                  <li><span><i class="glyphicon glyphicon-calendar"></i> {{Date::parse($contenido->created_at)->format('j \d\e F \d\e Y')}} </span></li>
                  @if($contenido->cantidad_comentado>0)
                  <li>|</li>
                  <span><i class="glyphicon glyphicon-comment"></i> {{$contenido->cantidad_comentado}} Comentado</span>
                  @endif
                  <li>|</li>
                  <li>
                   <span><i  class="glyphicon glyphicon-star"></i> {{$contenido->cantidad_visita}} Visitas</span>
                 </li>
              </ul>
            </div>
            <div style="padding:5px"> <a href="{{route('frontend.postDetalle',['id'=>$contenido->id])}}" class="pull-right" >VER MÁS...</a> </div>
          </div>
        </article>
        @endif
      @else
      <article class="post media-image   format-image animated" data-animation="bounceInUp">
        <div class="well" style="border:none; border-radius: none">
          <div>
             <h4 class="media-heading"> <a href="{{route('frontend.postDetalle', ['id'=>$contenido->id])}}">{{$contenido->titulo}}</a></h4>
            <div style="text-align: center;">
            @if($contenido->imagen) 
            <a href="{{route('frontend.postDetalle', ['id'=>$contenido->id])}}">
              <img class="img-thumbnail" src="{{asset($contenido->imagen)}}">
            </a>
            @endif
            </div>
            <div class="media-body">
             
              <p class="text">{{$contenido->nombre_usuario}}</p>
              <p>{{$contenido->resumen}}</p>

              </div>
              <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> {{Date::parse($contenido->created_at)->format('j \d\e F \d\e Y')}} </span></li>
                @if($contenido->cantidad_comentado>0)
                <li>|</li>
                <span><i class="glyphicon glyphicon-comment"></i> {{$contenido->cantidad_comentado}} Comentado</span>
                @endif
                <li>|</li>
                <li>
                 <span><i  class="glyphicon glyphicon-star"></i> {{$contenido->cantidad_visita}} Visitas</span>
               </li>
            </ul>
          </div>
          <div style="padding:5px"> <a href="{{route('frontend.postDetalle',['id'=>$contenido->id])}}" class="pull-right" >VER MÁS...</a> </div>
        </div>
      </article>
      @endif
      
      @endforeach
    {{ $contenidos->links() }}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3"    >
      @include('frontend.includes.sidebarPost')
    </div>
</div>
@stop