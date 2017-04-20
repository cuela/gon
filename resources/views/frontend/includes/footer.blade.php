<footer class="footer footer-shop">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="fot-box">
                <h3 class="fot-logo">AASANA</h3>
            {!!$resumenSitio!!}
          </div>
          <div class="row">
            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
              <div class="social-box">
                <ul class="social-links">
                    @if($redSocial)
                        @foreach ($redSocial as $social)
                            <li> <a  target="_blank"  href="{{$social->url}}"> <i class="icomoon-{{$social->titulo}}">   </i> </a> </li>
                        @endforeach
                    @endif
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="fot-box">
            <h3 class="fot-title">Enlaces del Sitio</h3>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <ul>
                  <li><a href="{{route('frontend.index')}}"><i class="fa fa-home"></i> Inicio</a></li>
                  @if(isset($menuSecundario))
                    {!!$menuSecundario!!}
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="fot-box">
            <h3 class="fot-title">Contactenos</h3>
            <div class="fot-contact">
              <div class="media-body">
                {!!$direccionEmpresa!!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="footer-absolute">
    <!--inicio-->
<div class="container">
      <div class="row">
<section style="background-color: #0078cb;color:#fff;border-bottom: 1px solid #fff">
    <section class="carousel carousel1 animated " data-animation="fadeInUp">
      <ul class="carousel-1" 
    
     >
      @foreach($regionales as $regional)
        <li>
          <div class="carousel-item-content">
            <a href="#" class="carousel-title" style="color:#fff; ">{{$regional->titulo}}</a>
            <div class="carousel-text">
              <p>{!!$regional->resumen!!}</p>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </section>
  </section>

</div>
  </div>
    <!--fin-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="copy aligncenter" style="color:#fff; padding-top: 10px;">
            @if(isset($autoria))
                {{$autoria}}
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  
    
  </script>
    <script>
        $(function() {
            $('.carousel-1').bxSlider({
          moveSlides:1,
                minSlides: 4,
            maxSlides: 4,
            slideWidth: 360,
              auto: true,
            autoControls: true,
            infiniteLoop: true,
            hideControlOnEnd: true,
            nextText: '→',
            prevText: '←'
          });
        });
    </script>
 