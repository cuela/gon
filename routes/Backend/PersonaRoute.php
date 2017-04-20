<?php


Route::group([
	'prefix'     => 'persona',
	'as'		 => 'persona.',
	'namespace'  => 'Persona',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-menu',
	], function() {

			Route::resource('persona', 'PersonaController');
			Route::post('persona/get', 'PersonaController')->name('persona.get');

	});
});