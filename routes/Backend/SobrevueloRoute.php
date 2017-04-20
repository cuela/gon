<?php


Route::group([
	'prefix'     => 'sobrevuelo',
	'as'		 => 'sobrevuelo.',
	'namespace'  => 'Sobrevuelo',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {

		Route::resource('usuarioCliente', 'UsuarioClienteController', ['except' => ['show']]);
		Route::post('usuarioCliente/get', 'UsuarioClienteController')->name('usuarioCliente.get');

		

		// Route::resource('grupo', 'GrupoController', ['except' => ['show']]);
		// Route::post('grupo/get', 'GrupoController')->name('grupo.get');

		// Route::resource('articulo', 'ArticuloController', ['except' => ['show']]);
		// Route::post('articulo/get', 'ArticuloController')->name('articulo.get');
		// Route::post('articulo/eliminar', 'ArticuloController@eliminarmedia')->name('articulo.eliminar');

		// Route::post('articulo/lista', 'ArticuloController@lista')->name('articulo.lista');
		// Route::get('articulo/listaarticulo', 'ArticuloController@listaArticulo')->name('articulo.listaarticulo');
		// Route::post('articulo/actualizarlista', 'ArticuloController@actualizarLista')->name('articulo.actualizarlista');

	});
});