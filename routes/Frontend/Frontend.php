<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('buscarbeneral', 'FrontendController@buscar')->name('buscargeneral');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('contacto', 'FrontendController@contacto')->name('contacto');
Route::post('guardarContacto', 'FrontendController@guardarContacto')->name('guardarContacto');
/**
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
	Route::group(['namespace' => 'User', 'as' => 'user.'], function() {
		/**
		 * User Dashboard Specific
		 */
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');

		/**
		 * User Account Specific
		 */
		Route::get('account', 'AccountController@index')->name('account');

		/**
		 * User Profile Specific
		 */
		Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
	});
});

Route::get('pagina/{id}', 'PaginaController@paginaDetalle')->name('paginaDetalle');

Route::get('paginas', 'PaginaController@index')->name('paginas');
Route::get('paginasCategoria/{taxonomia_id}', 'PaginaController@paginaCategoria')->name('paginasCategoria');
Route::post('paginas', 'PaginaController@buscar')->name('buscar');

Route::get('post/{id}', 'PostController@postDetalle')->name('postDetalle');
Route::get('posts', 'PostController@index')->name('posts');
Route::get('postsCategoria/{taxonomia_id}', 'PostController@postCategoria')->name('postsCategoria');
Route::post('posts', 'PostController@buscar')->name('buscar');



Route::get('convocatoria', 'ConvocatoriaController@lista')->name('listaConvocatoria');
Route::get('convocatoria/{id}', 'ConvocatoriaController@detalle')->name('detalleConvocatoria');


Route::get('comunicado/{id}', 'ComunicadoController@comunicadoDetalle')->name('comunicadoDetalle');
Route::get('comunicados', 'ComunicadoController@index')->name('comunicados');


Route::get('fragmentoEstatico/{id}', 'FragmentoEstaticoController@index')->name('fragmentoEstatico');
Route::get('cumpleanero', 'CumpleaneroController@lista')->name('listaCumpleanero');

Route::get('transparencia', 'TransparenciaController@index')->name('transparencia');

Route::get('transparencia/{id}', 'TransparenciaController@listaCategoria')->name('transparenciaCategoria');
Route::get('transparencia/{gestionId}/{grupoId}', 'TransparenciaController@listaArticulo')->name('transparenciaArticulo');
Route::get('transparencia/{gestionId}/{grupoId}/{articuloId}', 'TransparenciaController@detalleArticulo')->name('transparenciaDetalleArticulo');

Route::get('denuncia', 'DenunciaController@lista')->name('denuncia');
Route::get('denuncia/crear', 'DenunciaController@crear')->name('denuncia.crear');
Route::get('denuncia/{id}', 'DenunciaController@detalle')->name('denuncia.detalle');
Route::post('denuncia/guardar', 'DenunciaController@guardar')->name('denuncia.guardar');
Route::get('denuncia/archivo/{id}', 'DenunciaController@descargar')->name('denuncia.archivo');


Route::get('odeco', 'OdecoController@lista')->name('odeco');
Route::get('odeco/crear', 'OdecoController@crear')->name('odeco.crear');
Route::get('odeco/{id}', 'OdecoController@detalle')->name('odeco.detalle');
Route::post('odeco/guardar', 'OdecoController@guardar')->name('odeco.guardar');

Route::get('boletin', 'BoletinController@lista')->name('boletin');
Route::get('boletin/solicitar', 'BoletinController@solicitar')->name('boletin.solicitar');
Route::post('boletin/guardar', 'BoletinController@guardar')->name('boletin.guardar');
Route::get('boletin/categoria', 'BoletinController@categoria')->name('boletin.categoria');

Route::get('sobrevuelo', 'SobrevueloController@index')->name('sobrevuelo');
Route::get('estadoSobrevuelo','SobrevueloController@estado')->name('estadoSobrevuelo');

// Route::get('/uploads/{filename}', function($filename) {
//     // Laravel is ignoring the header method and is sending a plain html/txt :(
//     // So a normal php header can do the workaround
//     header("Content-type: application/pdf");

//     $response = Response::make(readfile($filename), 200);
//     $response->header('Content-Type', 'application/pdf');
//     return $response;
// });