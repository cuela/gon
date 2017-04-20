@extends('frontend.layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Videos</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      	<h3 class="titulo">Galeria de Videos</h3>
@if(isset($contenidos))
        <div class="row">
        @foreach($contenidos as $contenido)
          <div class="col-xs-4 col-sm-4 col-md-4 ">
            <div class="box-1"> {{$contenido->titulo}} 
              <div> 
              <?php
                $arreglo = explode('=',$contenido->url);
              ?>
                <iframe width="369" height="219" src="https://www.youtube.com/embed/{{$arreglo[1]}}" frameborder="0" allowfullscreen></iframe>
                </div>
              <div class="box-1-content">
                <div class="box-1-text">
                  <p> {{$contenido->resumen}} </p>
                </div>
              </div>
            </div>
          </div>

          @endforeach
        </div>
    		@endif
    </div>
</div>
@stop
