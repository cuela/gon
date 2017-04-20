<?php


Route::group([
	'prefix'     => 'contenido',
	'as'		 => 'contenido.',
	'namespace'  => 'Contenido',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {

			Route::resource('contenido', 'ContenidoController', ['except' => ['show']]);
			Route::post('contenido/get', 'ContenidoController')->name('contenido.get');
			Route::post('contenido/lista', 'ContenidoController@lista')->name('contenido.lista');
			Route::get('contenido/listacontenido', 'ContenidoController@listaContenido')->name('contenido.listacontenido');
			Route::post('contenido/actualizarlista', 'ContenidoController@actualizarLista')->name('contenido.actualizarlista');
	});
});