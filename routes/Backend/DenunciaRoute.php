<?php

Route::group([
	'prefix'     => 'denuncia',
	'as'		 => 'denuncia.',
	'namespace'  => 'Denuncia',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			Route::resource('denuncia', 'DenunciaController');
			Route::post('denuncia/get', 'DenunciaController')->name('denuncia.get');

	});

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			Route::resource('denunciaSeguimiento', 'DenunciaSeguimientoController');
			Route::post('denunciaSeguimiento/get', 'DenunciaSeguimientoController')->name('denunciaSeguimiento.get');

	});
});