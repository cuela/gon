@extends('frontend.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb breadcrumb2">
		  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
		  <li><a href="{{route('frontend.comunicados')}}">Lista de Comunicados</a></li>
		  <li class="active">Comunicado: {{$contenido->titulo}}</li>
		</ol>
	</div>	
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9">
		<article class="post post-grid">
		  	@if($contenido->imagen)
		      <div class="entry-media">
		          <div class="entry-thumbnail">
		            <ul class="carousel-post">
		             <li> <img src="{{asset($contenido->imagen)}}" alt="{{$contenido->titulo}}" class="img-thumbnail" /></li>
		            </ul>
		          </div>
		        </div>
		    @endif
		      <div class="entry-main">
		        <h3 class="entry-title"> {{$contenido->titulo}} </h3>
		        <div class="entry-meta clearfix">
		          <ul class="unstyled clearfix">
		            <li> {{$contenido->nombre_usuario}} </li>
		            <li>/</li>
		            <li> {{$contenido->cantidad_visita}} Visitas</li>
		          </ul>
		        </div>
		        <div class="entry-content">
		        	<blockquote>
		            <p>{{$contenido->resumen}} </p>
		          </blockquote>
		          <p>{!!$contenido->cuerpo!!}</p>
		          
		        </div>
		      </div>
		</article>
		@if($contenido->permitir_comentario)
			@include('laravelLikeComment::comment', ['comment_item_id' => $contenido->id])
		@endif
		
		
	</div>
    <div class="col-xs-12 col-sm-12 col-md-3"    >
      @include('frontend.includes.sidebarPost')
    </div>
</div>
@stop


@if($contenido->permitir_comentario)
@section('after-scripts-end')
    {{ Html::script("/vendor/laravelLikeComment/js/script.js") }}
@stop
@section('after-scripts-head')
	{{ Html::style("/js/frontend/icon.min.css") }}
	{{ Html::style("/js/frontend/comment.min.css") }}
	{{ Html::style("/js/frontend/form.min.css") }}
	{{ Html::style("/js/frontend/button.min.css") }}
	
	{{ Html::style("/vendor/laravelLikeComment/css/style.css") }}
@stop
@endif