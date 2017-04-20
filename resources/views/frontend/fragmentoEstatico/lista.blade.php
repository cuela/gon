@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">{{$fragmento->nombre}}</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      	<h3 class="titulo">{{$fragmento->nombre}}</h3>
		@if(isset($contenidos))
        <div class="row">
        @foreach($contenidos as $contenido)
          <div class="col-xs-4 col-sm-4 col-md-4" style="height:200Px">
            <div class="box-1"> <b>{{$contenido->titulo}} </b>
              <div> 
              	<a href="{{$contenido->url}}" target="_blank">
                <img src="{{asset($contenido->imagen)}}" class="img-responsive" />
                </a>
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
