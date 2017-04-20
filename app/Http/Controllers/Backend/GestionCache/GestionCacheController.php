<?php

namespace App\Http\Controllers\Backend\GestionCache;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Site\SiteRepository;

class GestionCacheController extends Controller
{
    protected $taxonomiaCategoria;

    
    

    public function index()
    {
        
        return view('backend.gestion-cache.index');
    }

    public function limpiar()
    {    

        //\Config::set('site.menu',SiteRepository::getMenu('main',0));
        //\Cache::forever('menuPrincipal', SiteRepository::getMenu('main',0));
        //\Cache::forever('menuSecundario', SiteRepository::getMenu('footer',0));

        $menuPrincipal = SiteRepository::getMenu('main',0);
        $menuSecundario = SiteRepository::getMenu('footer',0);

        $contenido = "<?php\n
\n
return [\n
\t'menuPrincipal' =>'".$menuPrincipal."',\n
\t'menuSecundario' =>'".$menuSecundario."',\n
\t];";
        $path = app_path('../config/site.php');
        $contents = \File::get($path);

        \File::put($path, $contenido);


        return redirect()->route('admin.gestionCache',[
                'valor'=>1
            ])->withFlashSuccess('Cache Vaciado');
    }

    
    
}
