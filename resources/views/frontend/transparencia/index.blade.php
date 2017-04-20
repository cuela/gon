@extends('frontend.layouts.app')



@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  @if(!empty($gestion))
  <li><a  href="{{route('frontend.transparencia')}}">Gestiones</a></li>
  <li class="active">{{is_object($gestion)?$gestion->gestion:''}}</li>
  @else
  <li class="active">Gestiones</li>
  @endif
</ol>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-3"    >
    <aside class="sidebar animated " data-animation="fadeInLeft" > 
      <div class="widget widget-category cms-category-list">
        <div class="block_content">
          <ul class="category-list unstyled clearfix">
            @foreach($listaGestiones as $gestionObjeto)
            <li
              @if(is_object($gestion))
                @if($gestionObjeto->id == $gestion->id)
                style="border-left: 4px solid #526aff;color:#000"
                @endif
              @endif
               ><a href="{{route('frontend.transparenciaCategoria',['id'=>$gestionObjeto->id])}}" ><i class="fa fa-long-arrow-right"></i>{{$gestionObjeto->gestion}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </aside>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-9 ">
    <div class="row">
      <div class="col-md-12">
        <div class="row text-center">
        @if(isset($listaCategoria))
          @foreach($listaCategoria as $categoria)
          <div class="col-md-4">
            <div data-animation="bounceInUp" class="service-item animated animation-done bounceInUp">
              <h4 class="service-heading"><a href="{{route('frontend.transparenciaArticulo',['gestionId'=>$gestion->id, 'grupoId'=>$categoria->id])}}"> {{$categoria->titulo}}</a></h4>
              <p>{{$categoria->descripcion}}</p>
            </div>
          </div>
          @endforeach
        @endif
        </div>
      </div>
    </div>
  </div>
</div>
@stop