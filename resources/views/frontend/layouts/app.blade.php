<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'AASANA')">
        <meta name="author" content="@yield('meta_author', 'AASANA')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')

        {{ Html::style(elixir('themes/aasana/css/master.css')) }}
        <!--
        {{ Html::style(elixir('themes/aasana/css/layout-box.css')) }}
        -->
        {{ Html::style(elixir('themes/aasana/plugins/iview/css/iview.css')) }}
        {{ Html::style(elixir('themes/aasana/plugins/iview/css/skin/style.css')) }}
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        @langRTL
            {!! Html::style(elixir('css/rtl.css')) !!}
        @endif
            

        @yield('after-styles-end')
        {{ Html::style(elixir('css/custom.css')) }}

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        {!! Html::script(elixir('themes/aasana/js/jquery-1.11.1.min.js')) !!}
        {!! Html::script(elixir('themes/aasana/js/jquery-migrate-1.2.1.js')) !!}
        {!! Html::script(elixir('themes/aasana/js/jquery-ui.min.js')) !!}
        {!! Html::script(elixir('themes/aasana/js/bootstrap-3.1.1.min.js')) !!}
        {!! Html::script(elixir('themes/aasana/js/modernizr.custom.js')) !!}
        @yield('after-scripts-head')
    </head>
    <body>
    <div class="social">
        <ul >
            @if($redSocial)
                @foreach ($redSocial as $social)
                    <li> <a  target="_blank"  href="{{$social->url}}" class="icomoon-{{$social->titulo}}" style="width: 44px;">  </a> </li>
                @endforeach
            @endif
        </ul>
    </div>
        <div  class="layout-theme animated-css"  data-header="sticky" data-header-top="200" >
            <div id="ip-container" class="ip-container"> 
            <!-- initial header -->
            <!--
            <header class="ip-header" >
              <div class="ip-loader">
                <div class="text-center">
                  <div class="ip-logo"><img  src="{{ asset('img/frontend/'.$config['sitio_logo']) }}" alt="logo"></div>
                </div>
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,39.3,10z"/>
                <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                </svg> </div>
            </header>
            -->
          </div>
            @include('frontend.includes.navbar')
            @include('frontend.includes.header')
            @include('frontend.includes.slider')
            @include('includes.partials.logged-in-as')

            @yield('breadcrums')
            <main class="main-content" >
                <div class="container">
                @include('includes.partials.messages')
                @yield('content')
                </div>
            </main><!-- container -->
            @include('frontend.includes.footer')
        </div>
        <!-- Scripts -->
        @yield('before-scripts-end')
        {!! Html::script(elixir('themes/aasana/plugins/isotope/jquery.isotope.min.js')) !!}
        {!! Html::script(elixir('themes/aasana/js/waypoints.min.js')) !!}

        {!! Html::script(elixir('themes/aasana/plugins/bxslider/jquery.bxslider.min.js')) !!}
        {!! Html::script(elixir('themes/aasana/plugins/magnific/jquery.magnific-popup.js')) !!}
        {!! Html::script(elixir('themes/aasana/plugins/prettyphoto/js/jquery.prettyPhoto.js')) !!} 

        <!-- Loader --> 
        {!! Html::script(elixir('themes/aasana/js/classie.js')) !!}
        <!--THEME--> 
        {!! Html::script(elixir('themes/aasana/js/cssua.min.js')) !!}
        {!! Html::script(elixir('themes/aasana/js/custom.js')) !!}

        @yield('after-scripts-end')

        @include('includes.partials.ga')

    </body>
</html>