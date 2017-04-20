<?php


Route::group([
	'prefix'     => 'taxonomia',
	'as'		 => 'taxonomia.',
	'namespace'  => 'Taxonomia',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:funciones-basicas',
	], function() {
			//categoria
			Route::resource('taxonomia-categoria', 'TaxonomiaCategoriaController', ['except' => ['show']]);
			Route::post('taxonomia-categoria/get', 'TaxonomiaCategoriaController')->name('taxonomia-categoria.get');

			Route::resource('taxonomia', 'TaxonomiaController');
			Route::post('taxonomia/get', 'TaxonomiaController')->name('taxonomia.get');

	});
});