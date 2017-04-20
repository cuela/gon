<?php

/**
 * All route names are prefixed with 'admin.menu'
 */

Route::group([
	'prefix'     => 'menu',
	'as'		 => 'menu.',
	'namespace'  => 'Menu',
], function() {
	

	/**
	 * Menu Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:view-backend',
	], function() {
			//menu categoria
			Route::resource('menu-categoria', 'MenuCategoriaController', ['except' => ['show']]);
			Route::post('menu-categoria/get', 'MenuCategoriaController')->name('menu-categoria.get');

			//menu
			Route::resource('menu', 'MenuController', ['except' => ['show']]);
			Route::post('menu/get', 'MenuController')->name('menu.get');
	});

	/**
	 * Role Management
	 */
	// Route::group([
	// 	'middleware' => 'access.routeNeedsPermission:manage-roles',
	// ], function() {
	// 	Route::group(['namespace' => 'Role'], function () {
	// 		Route::resource('role', 'RoleController', ['except' => ['show']]);

	// 		//For DataTables
	// 		Route::post('role/get', 'RoleTableController')->name('role.get');
	// 	});
	// });
});