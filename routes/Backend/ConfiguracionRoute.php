<?php


Route::group([
	'prefix'     => 'configuracion',
	'as'		 => 'configuracion.',
	'namespace'  => 'Configuracion',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-menu',
	], function() {

			Route::get('basico', 'ConfiguracionController@basico')->name('basico');
			Route::post('basicostore', 'ConfiguracionController@basicoStore')->name('basicostore');;
	});
});