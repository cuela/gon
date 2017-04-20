  <div class="container">
    <div class="row">
      <div class="col-lg-12">   
        <ol class="breadcrumb breadcrumb2">
          <li><a href="{{route('frontend.index')}}">Inicio</a></li>
          @yield('breadcrumbs')
        </ol>

        
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">   
        <h4> @yield('title')</h4>
      </div>
    </div>
  </div>