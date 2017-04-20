<?php


Route::group([
	'prefix'     => 'convocatoria',
	'as'		 => 'convocatoria.',
	'namespace'  => 'Convocatoria',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			Route::resource('convocatoria', 'ConvocatoriaController');
			Route::post('convocatoria/get', 'ConvocatoriaController')->name('convocatoria.get');

	});
});