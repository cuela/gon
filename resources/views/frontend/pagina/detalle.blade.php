@extends('frontend.layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb breadcrumb2">
		  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
		  <li class="active">Página: {{$contenido->titulo}}</li>
		</ol>
	</div>	
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
{!!$contenido->cuerpo!!}
	</div>
</div>
@if($contenido->permitir_comentario)
	@include('laravelLikeComment::comment', ['comment_item_id' => $contenido->id])
@endif
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