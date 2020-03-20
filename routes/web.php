<?php
Route::group(['middleware' => 'language'], function () {
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('/', 'ForumController@index')->name('home');
        Route::get('/forum/{id}', 'ThreadController@index')->name('forum_threads');
        Route::post('thread/search', 'SearchController@searchThreads')->name('search');
        Route::resource('thread', 'ThreadController')->except(['index']);
    });

    Route::get('/local/{lang}', 'ForumController@setLanguage')->name('language');
    Route::get('login/google', 'GoogleAuthController@findOrCreateUser');
    Route::get('login/google/callback', 'GoogleAuthController@callback');
    Route::get('login/google/auth', 'GoogleAuthController@auth')->name('google_login');
    Auth::routes(['verify' => true]);
    Route::get('/logout', 'Auth\LoginController@logout');
});
