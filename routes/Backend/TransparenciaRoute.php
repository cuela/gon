<?php


Route::group([
	'prefix'     => 'transparencia',
	'as'		 => 'transparencia.',
	'namespace'  => 'Transparencia',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {

		Route::resource('gestion', 'GestionController', ['except' => ['show']]);
		Route::post('gestion/get', 'GestionController')->name('gestion.get');

		Route::resource('grupo', 'GrupoController', ['except' => ['show']]);
		Route::post('grupo/get', 'GrupoController')->name('grupo.get');

		Route::resource('articulo', 'ArticuloController', ['except' => ['show']]);
		Route::post('articulo/get', 'ArticuloController')->name('articulo.get');
		Route::post('articulo/eliminar', 'ArticuloController@eliminarmedia')->name('articulo.eliminar');

		Route::post('articulo/lista', 'ArticuloController@lista')->name('articulo.lista');
		Route::get('articulo/listaarticulo', 'ArticuloController@listaArticulo')->name('articulo.listaarticulo');
		Route::post('articulo/actualizarlista', 'ArticuloController@actualizarLista')->name('articulo.actualizarlista');

	});
});