@extends('frontend.layouts.app')


@section('breadcrums')
	@section('title', $contenido->titulo)
	@include('frontend.includes.breadcrumb')
@stop


@section('content')
{!!$contenido->cuerpo!!}
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