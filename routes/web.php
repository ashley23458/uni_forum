<?php

Route::get('/', 'ForumController@index')->name('home');
Route::get('/forum/{id}', 'ThreadController@index')->name('forum_threads');
Route::get('login/google', 'GoogleAuthController@findOrCreateUser');
Route::get('login/google/callback', 'GoogleAuthController@callback');
Route::get('login/google/auth', 'GoogleAuthController@auth');
Route::resource('thread', 'ThreadController')->except(['index']);
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('thread/search', 'SearchController@searchThreads')->name('search');
