@extends('frontend.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb breadcrumb2">
		  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
		  <li class="active">Lista de Páginas</li>
		</ol>
	</div>	
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9">
      <h4 class="titulo">
        Lista de Páginas
      </h4>
      @foreach($contenidos as $contenido)
      <?php
      	$array = ['1'=>'success','2'=>'primary','3'=>'warning'];
		$k = array_rand($array);
		$v = $array[$k];
      ?>
    	<div class="row">
	        <div class="col-sm-4 col-md-4">
	            <div class="post">
	                <div class="post-img-content">
	                	@if($contenido->imagen)
	                    <a href="{{route('frontend.paginaDetalle',['id'=>$contenido->id])}}" ><img src="{{ asset('uploads/'.$contenido->imagen) }}" class="img-responsive"/></a> 
	                    @endif
	                    <span class="post-title"><b>{{$contenido->titulo}}</b></span>
	                    <time datetime="{{date('Y-m-d',strtotime($contenido->updated_at))}}">{{Date::parse($contenido->created_at)->format('j \d\e F \d\e Y')}}</time>
	                </div>
	                <div class="content">
	                    <div class="author">
	                        <ul class="unstyled clearfix list-inline">
						      <li> {{$contenido->cantidad_visita}} Visitas</li>
						      <li>/</li>
						      <li> {{$contenido->cantidad_comentado}} Comentados </li>
						    </ul>
	                    </div>
	                    <div>
	                        <p>{{$contenido->resumen}}</p>
	                    </div>
	                    <div>
	                        <a href="{{route('frontend.paginaDetalle',['id'=>$contenido->id])}}" class="btn btn-{{$v}} btn-sm">Leer más...</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    @endforeach
      
    {{ $contenidos->links() }}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3"    >
      @include('frontend.includes.sidebar')
    </div>
</div>
@stop