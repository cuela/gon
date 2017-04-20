<div class="navbar-header top-header">
    <div class="container">
      <div class="row">
        <div class="info-top col-md-6"> {{$config['sitio_slogan']}} </div>
        <div class="info-top col-md-6 text-right">
          <div class="">
            
            <ul class="pull-right">
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
            <ul class="social-links pull-right">
              @if($redSocial)
                  @foreach ($redSocial as $social)
                      <li> <a target="_blank"  href="{{$social->url}}"> <i class="icomoon-{{$social->titulo}}">   </i> </a> </li>
                  @endforeach
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>