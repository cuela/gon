<?php

Route::group([
	'prefix'     => 'contacto',
	'as'		 => 'contacto.',
	'namespace'  => 'Contacto',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:contacto',
	], function() {
			Route::resource('contacto', 'ContactoController');
			Route::post('contacto/get', 'ContactoController')->name('contacto.get');

	});
});