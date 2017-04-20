<?php

Route::group([
	'prefix'     => 'odeco',
	'as'		 => 'odeco.',
	'namespace'  => 'Odeco',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			Route::resource('odeco', 'OdecoController');
			Route::post('odeco/get', 'OdecoController')->name('odeco.get');

	});
	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			Route::resource('odecoSeguimiento', 'OdecoSeguimientoController');
			Route::post('odecoSeguimiento/get', 'OdecoSeguimientoController')->name('odecoSeguimiento.get');

	});
});