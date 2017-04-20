<?php


Route::group([
	'prefix'     => 'boletin',
	'as'		 => 'boletin.',
	'namespace'  => 'Boletin',
], function() {
	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			Route::resource('boletin', 'BoletinController');
			Route::post('boletin/get', 'BoletinController')->name('boletin.get');

			Route::resource('compra-boletin', 'CompraBoletinController');
			Route::post('compra-boletin/get', 'CompraBoletinController')->name('compra-boletin.get');

			Route::resource('categoria-boletin', 'CategoriaBoletinController', ['except' => ['show']]);
			Route::post('categoria-boletin/get', 'CategoriaBoletinController')->name('categoria-boletin.get');
	});
});