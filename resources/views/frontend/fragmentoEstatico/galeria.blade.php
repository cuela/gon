@extends('frontend.layouts.app')

@section('after-styles-end')
    {{ Html::style("themes/aasana/plugins/fotorama/fotorama.css") }}
@stop
@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Galería de Imágenes</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center">
      	<h3 class="titulo">Galería de Imágenes: <small>{{$fragmento->nombre}}</small></h3>

      	<div class="fotorama" data-width="500" data-ratio="700/467" data-max-width="100%" data-nav="thumbs" style="text-align: center">
      	@if(isset($contenidos))
    		<?php $contador = 1; ?>
    		@foreach($contenidos as $contenido)
		  		<img src="{{asset($contenido->imagen)}}">
			<?php $contador++;?>
			@endforeach
		@endif
		</div>
    </div>
</div>
@stop
@section('after-scripts-end')
    {{ Html::script("themes/aasana/plugins/fotorama/fotorama.js") }}
@stop