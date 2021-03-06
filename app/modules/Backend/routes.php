<?php 

Route::get('login', 'Backend\Controllers\SessionsController@create');
Route::get('logout', 'Backend\Controllers\SessionsController@destroy');
Route::resource('sessions', 'Backend\Controllers\SessionsController', ['only' => ['create','store','destroy']]);

Route::group(array('prefix' => 'backend', 'before' => 'auth'), function()
{

	Route::get('/', array('as' => 'backend.home', function()
	{
		return View::make('Backend::dashboard.index');
	}));

	Route::resource('matches', 'Backend\Controllers\MatchesController');
	Route::resource('standings', 'Backend\Controllers\StandingsController');
	Route::post('standings/update-single/{id}', array('as' => 'backend.standings.updateSingle', 'uses' => 'Backend\Controllers\StandingsController@updateSingle'));
	Route::post('pages/update-single/{id}', array('as' => 'backend.pages.updateSingle', 'uses' => 'Backend\Controllers\PagesController@updateSingle'));
	Route::resource('pages', 'Backend\Controllers\PagesController');
	Route::post('posts/update-single/{id}', array('as' => 'backend.posts.updateSingle', 'uses' => 'Backend\Controllers\PostsController@updateSingle'));
	Route::resource('posts', 'Backend\Controllers\PostsController');
	Route::resource('gallery', 'Backend\Controllers\GalleryController');

	// Facebook posting
	Route::get('facebook-post/{postId}', [
		'as' => 'backend.facebookPost',
		'uses' => 'Backend\Controllers\FacebookController@post'
	]);

});