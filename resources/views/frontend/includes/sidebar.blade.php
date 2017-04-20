<aside class="sidebar"> 
        
        <!-- SEARCH WIDGET -->
        
        <div class="widget widget-search">
          <h3 class="widget-title  titulo_minimo">Buscar Contenido</h3>
          <div class="block_content">
            <form method="post" id="search-global-form" action="{{route('frontend.buscar')}}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="text" placeholder="Escriba aquí" name="buscar" id="search2" value="">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
        
        @if(isset($categorias))
        <!-- Categories -->
        <div class="widget widget-category">
          <h3 class="widget-title  titulo_minimo">Categorías</h3>
          <div class="block_content">
            <ul class="category-list unstyled clearfix">
            	@foreach($categorias as $categoria)
              	<li><a href="{{route('frontend.paginasCategoria',['taxonomia_id'=>$categoria->id])}}">{{$categoria->nombre}}<span class="amount-cat">{{$categoria->cantidad}}</span></a></li>
              	@endforeach
            </ul>
          </div>
        </div>
        @endif
        
        
        @if(isset($recientes))
        <div class="widget widget-post">
          <h3 class="widget-title  titulo_minimo">Ultimas Páginas</h3>
          <div class="block_content">
            <ul class="product-mini-list  unstyled ">
            @foreach($recientes as $pagina)
              <li>
                <div class="entry-thumbnail"> 
                @if($pagina->imagen)
                <a class="img" href="{{route('frontend.paginaDetalle',['id'=>$pagina->id])}}"> <img src="{{asset($pagina->imagen)}}" width="60" height="60" alt="{{$pagina->titulo}}"/></a> 
                @else
		          <img width="60" height="60" alt="{{$pagina->titulo}}" src="http://placehold.it/80/F0F0F0">
                @endif
                </div>
                <div class="entry-main">
                  <div class="entry-header">
                    <h5><a href="{{route('frontend.paginaDetalle',['id'=>$pagina->id])}}">{{$pagina->titulo}}</a></h5>
                  </div>
                  <div class="entry-meta">
                    <div class="meta">{{date('d-F-Y',strtotime($pagina->updated_at))}}</div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif
        @if(isset($recientes))
        <div class="widget widget-archive">
          <h3 class="widget-title  titulo_minimo"><span><i class="fa flaticon-wrench44"></i>Más Visitados</span></h3>
          <div class="block_content">
          	@foreach($recientes as $pagina)
            <div class="media">
            	@if($pagina->imagen)
		        <a class="pull-left" href="{{route('frontend.paginaDetalle',['id'=>$pagina->id])}}">
		          <img class="media-object" src="{{asset($pagina->imagen)}}">
		        </a>
		        @else
		          <img class="media-object" src="http://placehold.it/80/F0F0F0">
		        @endif
		        <div class="media-body">
		          <h5 class="media-heading"><a href="{{route('frontend.paginaDetalle',['id'=>$pagina->id])}}" target="ext" class="pull-right"></a> <a href="{{route('frontend.paginaDetalle',['id'=>$pagina->id])}}"><strong>{{$pagina->titulo}}</strong></a></h5>
		          <small>{{$pagina->resumen}}</small><br>
		          Visitas <span class="badge">{{$pagina->cantidad_visita}}</span>
		        </div>
		    </div>
		    @endforeach
          </div>
        </div>
        @endif


      </aside>