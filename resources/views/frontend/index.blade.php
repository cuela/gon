@extends('frontend.layouts.app')

@section('content')

@section('before-scripts-end')
    {{ Html::script("themes/aasana/plugins/iview/js/iview.js")}}
@stop
@section('after-scripts-end')
    {{ Html::script("themes/aasana/js/iview.js") }}
@stop
@section('after-styles-end')
    {{ Html::style("css/hoverbox.css") }}
@stop

<section class="home-section animated " data-animation="fadeInUp">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 col-lg-4">
          <div data-animation="bounceInUp" class="service-item animated animation-done bounceInUp">
            <div class="service-icon"> <a href="#"><img src="img/frontend/icono_comercial.png" width="73"></a></div>
            <h4 class="service-heading"><a href="#">COMERCIAL GON</a></h4>
            <p>Información de Notas de Debito, Resumen de Operaciones, Extracto de transacciones, Cuentas por cobrar, Tarigfas Comerciales</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div data-animation="bounceInUp" class="service-item animated animation-done bounceInUp">
            <div class="service-icon"> <a href="#"><img src="img/frontend/icono_tecnica.png" width="73"></a></div>
            <h4 class="service-heading"><a href="#">INFORMACIÓN TÉCNICA</a></h4>
            <p>Información sobre  seguridad Aeropporuaria, Tarifas Comerciales, Procedimientos PANS/OPS</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div data-animation="bounceInUp" class="service-item animated animation-done bounceInUp">
            <div class="service-icon"> <a href="#"><img src="img/frontend/icono_meteorologica.png" width="73"></a></div>
            <h4 class="service-heading"><a href="#">INFORMACIÓN METEREOLÓGICA</a></h4>
            <p>Información METAR, TAF, SIGMET, SPECI</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 col-lg-4">
          <div data-animation="bounceInUp" class="service-item animated animation-done bounceInUp">
            <div class="service-icon"> <a href="{{route('frontend.listaConvocatoria')}}"><img src="img/frontend/icono_convocatorias.png" width="73"></a></div>
            <h4 class="service-heading"><a href="{{route('frontend.listaConvocatoria')}}">CONVOCATORIAS</a></h4>
            <p>Información sobre las convocatorias publicadas  de la institución</p>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div data-animation="bounceInUp" class="service-item animated animation-done bounceInUp">
            <div class="service-icon"> <a href="#"><img src="img/frontend/icono_tramites.png" width="73"></a></div>
            <h4 class="service-heading"><a href="#">TRAMITES</a></h4>
            <p>Información sobre trámites </p>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div data-animation="bounceInUp" class="service-item animated animation-done bounceInUp">
            <div class="service-icon"> <a href="{{route('frontend.fragmentoEstatico',['id'=>12])}}"><img src="img/frontend/icono_enlaces.png" width="73"></a></div>
            <h4 class="service-heading"><a href="{{route('frontend.fragmentoEstatico',['id'=>12])}}">ENLACES DE INTERÉS</a></h4>
            <p>Información sobre los enlaces de interés registrados en este sitio Web</p>
          </div>
        </div>
      </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8">
          <h3 class="titulo">NOTICIAS</h3>
          @foreach ($contenidos as $contenido)
          <div class="panel panel-default">
            <div class="panel-body">
                <a href="{{route('frontend.postDetalle', ['id'=>$contenido->id])}}" >
                <img src="{{asset($contenido->imagen)}}" alt="" width="100%" class="img-thumbnail"></a>
              <p><h4><a class="post-title" href="{{route('frontend.postDetalle', ['id'=>$contenido->id])}}">{{ $contenido->titulo }}</a></h4></p>    
              <p>
              {{ $contenido->resumen }}
              </p>
              <span class="glyphicon glyphicon-calendar" id="start"></span> {{Date::parse($contenido->created_at)->format('j \d\e F \d\e Y')}} | 
              <span class="glyphicon glyphicon-eye-open" id="visit"></span> {{$contenido->cantidad_visita}} Visitas 
              @if($contenido->cantidad_comentado>0)
                | 
                <span class="glyphicon glyphicon-comment" id="comment"></span> {{$contenido->cantidad_comentado}} Comentarios 
              @endif
              <br> 
              <a class="btn btn-success btn-sm pull-right" href="{{route('frontend.postDetalle', ['id'=>$contenido->id])}}">Ver Artículo Completo</a>
            </div>                  
          </div>
          @endforeach
          <!--inicio-->
          <section >
            <div class="row">
              @foreach($noticias as $noticia)
              <div class="col-md-6">
                <div class="well" style="border:none; border-radius: none">
                  <div >
                    <a href="{{route('frontend.postDetalle', ['id'=>$noticia->id])}}">
                      <img src="{{asset($noticia->imagen)}}" width="100%" class="img-thumbnail">
                    </a>
                    <div class="media-body">
                      <h4> <a href="{{route('frontend.postDetalle', ['id'=>$noticia->id])}}">{{$noticia->titulo}}</a></h4>
                      <p class="text">{{$noticia->nombre_usuario}}</p>
                      <p>{{$noticia->resumen}}</p>

                      </div>
                      <ul class="list-inline list-unstyled">
                        <li><span><i class="glyphicon glyphicon-calendar"></i> {{Date::parse($noticia->created_at)->format('j \d\e F \d\e Y')}}</span></li>
                        @if($contenido->cantidad_comentado>0)
                        <li>|</li>
                        <span><i class="glyphicon glyphicon-comment"></i> {{$noticia->cantidad_comentado}} Comentado</span>
                        @endif
                        <li>|</li>
                        <li>
                         <span><i  class="glyphicon glyphicon-star"></i> {{$noticia->cantidad_visita}} Visitas</span>
                       </li>
                    </ul>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </section>
          <!--fin-->
        </div>
        <div class="col-md-4">
            <h3 class="titulo">VIDEO DESTACADO</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                 @foreach($listaVideo as $videos)
                   @foreach($videos['lista'] as $video)
                    @if($video->destacado==1)
                    <?php
                      $arreglo = explode('=',$video->url);
                    ?>
                      <iframe width="100%" src="https://www.youtube.com/embed/{{$arreglo[1]}}" frameborder="0" allowfullscreen></iframe>
                    @endif
                  @endforeach
                    <a class="btn btn-primary btn-sm pull-right" href="{{route('frontend.fragmentoEstatico',['id'=>$videos['objeto']->id])}}">VER MÁS</a>
                    
                @endforeach
                </div>
            </div>
            
            <h3 class="titulo">CONVOCATORIA</h3>
            <div class="panel" >
              <div class="panel-body">
              <table class="table">
                <tr>
                  <th>Convocatoria</th>
                  <th>Fecha Límite</th>
                </tr>
                @foreach($convocatorias as $convocatoria)
                <tr>
                  <td><a href="{{route('frontend.detalleConvocatoria',['id'=>$convocatoria->id])}}">{{$convocatoria->titulo}}</a></td>
                  <td>{{Date::parse($convocatoria->fecha_fin.' '.$convocatoria->hora_fin)->format('j \d\e F \d\e Y H:i A')}}</td>
                </tr>
                @endforeach
              </table>
                <a class="btn btn-warning btn-sm pull-right" href="{{route('frontend.listaConvocatoria')}}">VER MÁS</a>
              </div> 
            </div>

            <h3 class="titulo">GALERIA DE FOTOS</h3>
            <div class="panel" >
              <div class="panel-body">
                @foreach($listaGaleria as $galeria)
                    <ul class="hoverbox">
                   @foreach($galeria['lista'] as $imagen)
                    <li>
                    <span><img src="{{asset($imagen->miniatura)}}" alt="description" /><img src="{{asset($imagen->miniatura)}}" alt="description" class="preview" /></span>
                    </li>
                  @endforeach
                    </ul>
                    <a class="btn btn-success btn-sm pull-right" href="{{route('frontend.fragmentoEstatico',['id'=>$galeria['objeto']->id])}}">VER MÁS</a>
                    
                @endforeach
              </div> 
            </div>
        </div>
    </div>
</div>

@endsection