<?php


Route::group([
	'prefix'     => 'fragmento',
	'as'		 => 'fragmento.',
	'namespace'  => 'Fragmento',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			//categoria
			Route::resource('fragmento-categoria', 'FragmentoCategoriaController', ['except' => ['show']]);
			Route::post('fragmento-categoria/get', 'FragmentoCategoriaController')->name('fragmento-categoria.get');


			Route::resource('fragmento', 'FragmentoController', ['except' => ['show']]);
			Route::post('fragmento/get', 'FragmentoController')->name('fragmento.get');

			Route::resource('fragmento-codigo', 'FragmentoCodigoController', ['except' => ['show']]);
			Route::post('fragmento-codigo/get', 'FragmentoCodigoController')->name('fragmento-codigo.get');

			Route::resource('fragmento-estatico', 'FragmentoEstaticoController', ['except' => ['show']]);
			Route::post('fragmento-estatico/get', 'FragmentoEstaticoController')->name('fragmento-estatico.get');
	});
});