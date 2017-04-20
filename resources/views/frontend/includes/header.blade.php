  <!-- HEADER -->
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-3  col-xs-12"> 
          <a href="{{route('frontend.index')}}">
          <img src="{{ asset('img/frontend/'.$config['sitio_logo']) }}"  alt="AASANA"/>
          </a>
         </div>
        <div class="col-md-9  col-xs-12">
          <div class="right-header">
            {!!$infoCabecera!!}
          </div>
        </div>
      </div>
    </div>
    <div class="top-nav ">
      <div class="container">
        <div class="row">
          <div class="col-md-12  col-xs-12">
            <form class="hidden-md  hidden-lg " id="search-global-mobile" method="get">
              <input type="text" value="" id="search-mobile" name="s" >
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="navbar yamm " style ="top: 0px; ">
              <div class="navbar-header hidden-md  hidden-lg  hidden-sm ">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a href="#" class="navbar-brand">Menu</a> </div>
              <div id="navbar-collapse-1" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="{{route('frontend.index')}}"><i class="fa fa-home"></i> Inicio</a></li>
                  @if(isset($menuPrincipal))
                    {!!$menuPrincipal!!}
                  @endif
                </ul>
                {{ Form::open(['route' => 'frontend.buscargeneral', 'method' => 'get', 'id' => 'search-global-menu']) }}
                  <input type="text" value="" id="search" name="texto" >
                  <button type="submit"><i class="fa fa-search"></i></button>
                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- HEADER END -->