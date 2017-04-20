<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Repositories\Frontend\Site\SiteRepository;
use App\Models\FragmentoEstatico\FragmentoEstatico;
/**
 * Class GlobalComposer
 * @package App\Http\Composers
 */
class GlobalComposer
{

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		

		$view->with('logged_in_user', access()->user());
		//$view->with('menuPrincipal', \Cache::get('menuPrincipal'));
		$view->with('menuPrincipal', config('site.menuPrincipal'));
		//$view->with('menuSecundario', \Cache::get('menuSecundario'));
		$view->with('menuSecundario', config('site.menuSecundario'));
		
		$view->with('redSocial', SiteRepository::getFragmentoEstaticoPorID('1'));
		$view->with('config', SiteRepository::getConfig());
		$copy = SiteRepository::getFragmentoCodigoPorID('5');
		$view->with('autoria', $copy[0]->contenido);

		$infoCabecera = SiteRepository::getFragmentoCodigoPorID('8');
		$view->with('infoCabecera', $infoCabecera[0]->contenido);

		$resumenSitio = SiteRepository::getFragmentoCodigoPorID('7');
		$view->with('resumenSitio', $resumenSitio[0]->contenido);

		$direccionEmpresa = SiteRepository::getFragmentoCodigoPorID('6');
		$view->with('direccionEmpresa', $direccionEmpresa[0]->contenido);

		$regionales = FragmentoEstatico::where('fragmento_id',9)->get();
		$view->with('regionales', $regionales);
	}
}