<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        <!--
        {{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}
            <div class="input-group">
                {{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}

                  <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
        {{ Form::close() }}
        -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>

            @permission('manage-users')
                <li class="{{ Active::pattern('admin/access/*') }}">
                    <a href="{{ route('admin.access.user.index') }}">
                        <i class="fa fa-users"></i>
                        <span>{{ trans('menus.backend.access.title') }}</span>
                    </a>
                </li>
            @endauth

            <li class="header">{{ trans('menus.backend.sidebar.management') }}</li>
            @if(access()->hasAccion('ver-menu'))
                <li class="{{ Active::pattern(['admin/menu*', 'admin/taxonomia*','admin/gestionCache*']) }}">
                    <a href="{{ route('admin.menu.menu-categoria.index') }}">
                        <i class="fa fa-circle-o"></i>
                        <span>{{ trans('menus.backend.basic-function.menu-managment') }}</span>
                    </a>
                </li>
            @endif
            @permission('gestion-cache')
            <li class="{{ Active::pattern('admin/gestionCache/cache') }}">
                <a href="{{ route('admin.gestionCache') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Limpiar Cache</span>
                </a>
            </li>
            @endauth
            @if(access()->hasAccion('ver-articulo'))
            <li class="{{ Active::pattern('admin/contenido*') }}">
                <a href="{{ route('admin.contenido.contenido.index',['taxonomia'=>'post']) }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Gestión de Artículo</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('ver-publicar-articulo'))
            <li class="{{ Active::pattern('admin/contenido*') }}">
                <a href="{{ route('admin.contenido.contenido.listacontenido',['taxonomia'=>'post']) }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Publicar Artículos</span>
                </a>
            </li>
            @endif

            @if(access()->hasAccion('ver-individual'))
            <li class="{{ Active::pattern('admin/contenido*') }}">
                <a href="{{ route('admin.contenido.contenido.index',['taxonomia'=>'page']) }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Gestión de Contenido Estático</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('ver-publicar-individual'))
            <li class="{{ Active::pattern('admin/contenido*') }}">
                <a href="{{ route('admin.contenido.contenido.listacontenido',['taxonomia'=>'page']) }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Publicar Contenido Estático</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('ver-convocatoria'))
            <li class="{{ Active::pattern('admin/convocatoria/convocatoria') }}">
                <a href="{{ route('admin.convocatoria.convocatoria.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Gestión de Convocatoria</span>
                </a>
            </li>
            @endif

            @if(access()->hasAccion('ver-clasif-gestion'))
            <li class="{{ Active::pattern('admin/transparencia/gestion') }}">
                <a href="{{ route('admin.transparencia.gestion.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Clasificador Gestión</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('ver-clasif-categoria'))
            <li class="{{ Active::pattern('admin/transparencia/grupo') }}">
                <a href="{{ route('admin.transparencia.grupo.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Clasificador Categorías</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('ver-contenido-transparencia'))
            <li class="{{ Active::pattern('admin/transparencia/articulo') }}">
                <a href="{{ route('admin.transparencia.articulo.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Artículos Transparencia</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('publicador-contenido-transparencia'))
            <li class="{{ Active::pattern('admin/transparencia/*') }}">
                <a href="{{ route('admin.transparencia.articulo.listaarticulo') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Publicar Contenidos Trasparencia</span>
                </a>
            </li>
            @endif

            @if(access()->hasAccion('ver-denuncia'))
            <li class="{{ Active::pattern('admin/denuncia/denuncia') }}">
                <a href="{{ route('admin.denuncia.denuncia.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Seguimiento a Denuncias</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('ver-odeco'))
            <li class="{{ Active::pattern('admin/odeco/odeco') }}">
                <a href="{{ route('admin.odeco.odeco.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>ODECO</span>
                </a>
            </li>
            @endif

            @if(access()->hasAccion('ver-categoriaBoletin'))
            <li class="{{ Active::pattern('admin/boletin/categoria-boletin') }}">
                <a href="{{ route('admin.boletin.categoria-boletin.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Gestión de Categoría Boletín</span>
                </a>
            </li>
            @endif

            @if(access()->hasAccion('ver-boletin'))
            <li class="{{ Active::pattern('admin/boletin/boletin') }}">
                <a href="{{ route('admin.boletin.boletin.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Gestión de Boletín AIP</span>
                </a>
            </li>
            @endif
            @if(access()->hasAccion('ver-compraBoletin'))
            <li class="{{ Active::pattern('admin/boletin/compra-boletin') }}">
                <a href="{{ route('admin.boletin.compra-boletin.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Solicitudes Boletín AIP</span>
                </a>
            </li>
            @endif

            @permission('ver-fragmento-codigo')
            <li {{ Request::query('type')=='1' ? 'class=active' : '' }}>
                <a href="{{ route('admin.fragmento.fragmento.index',['type'=>'1']) }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Fragmentos de Código</span>
                </a>
            </li>
            @endauth
            @permission('ver-fragmento-estatico')
            <li {{ Request::query('type')=='2' ? 'class=active' : '' }}>
                <a href="{{ route('admin.fragmento.fragmento.index',['type'=>'2']) }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Fragmentos Estáticos</span>
                </a>
            </li>
            @endauth
            @permission('ver-usuarios-sobrevuelos')
            <li {{ Request::query('type')=='2' ? 'class=active' : '' }}>
                <a href="{{ route('admin.sobrevuelo.usuarioCliente.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>Gestión de usuarios Sobrevuelos</span>
                </a>
            </li>
            @endauth

        </ul>
    </section>
</aside>
