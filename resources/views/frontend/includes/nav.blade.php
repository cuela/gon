
<div id="main-header">
    <div class="container header-top">
      <div class="row">
        <div class="col-md-4 col-sm-3 col-xs-12">
          
        <div class="navbar-header navbar-default ">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
              <a class="" href="#">
              {{ link_to_route('frontend.index', app_name(), [], ['class' => 'navbar-brand']) }}
              <img class="img-responsive image_brand" src="image/sgtlogo.png">
              </a>
            </div>
          </div> <!-- col-md-4 col-xs-12 -->
          <div class="col-md-8 col-sm-9 col-xs-12 xs_color">
            <div class="navbar-header navbar-kanan " >
              <ul class="nav navbar-nav navbar-right">

                    @if ($logged_in_user)
                        <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>
                    @endif

                    @if (! $logged_in_user)
                        <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ $logged_in_user->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @permission('view-backend')
                                    <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                                @endauth

                                <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                                <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                            </ul>
                        </li>
                    @endif
                </ul>
            
            </div><!-- /.navbar-collapse -->
          </div> <!-- col-md-8 col-xs-12 -->
  </div>
</div>
<div class="container header-bottom">
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-kiri" id="bottom_menu">
        <li><a href="{{route('frontend.index')}}"><i class="fa fa-home"></i> Inicio</a></li>
        @if(isset($menuPrincipal))
          {!!$menuPrincipal!!}
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- container fluid 2 -->
</div><!-- main header -->
