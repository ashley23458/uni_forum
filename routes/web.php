<?php

Route::get('/', 'ForumController@index')->name('home');
Route::get('/forum/{id}', 'ThreadController@index')->name('forum_threads');
//Laravel. (2019). Resource Controllers [Way of registering a resourceful route to a controller]. (6.x).
// Retrieved from https://laravel.com/docs/6.x/controllers#resource-controllers
Route::resource('thread', 'ThreadController')->except(['index']);
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('thread/search', 'SearchController@searchThreads')->name('search');
