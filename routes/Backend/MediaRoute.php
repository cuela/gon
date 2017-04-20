<?php


Route::group([
	'prefix'     => 'media',
	'as'		 => 'media.',
	'namespace'  => 'Media',
], function() {
	

	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-menu',
	], function() {
			Route::resource('media', 'MediaController');
			Route::post('media/get', 'MediaController')->name('media.get');

	});
});