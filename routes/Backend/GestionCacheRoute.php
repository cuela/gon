<?php


Route::group([
	'prefix'     => 'gestionCache',
	'as'		 => 'gestionCache',
	'namespace'  => 'GestionCache',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:gestion-cache',
	], function() {

			Route::get('cache', 'GestionCacheController@index');
			Route::post('cache', 'GestionCacheController@limpiar');
	});
});