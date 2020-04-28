<?php
Route::group(['middleware' => 'language'], function () {
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('/', 'ForumController@index')->name('home');
        Route::get('/forum/{id}', 'ThreadController@index')->name('forum_threads');
        Route::post('thread/search', 'SearchController@searchThreads')->name('search');
        Route::resource('thread', 'ThreadController')->except(['index']);
    });

    Route::get('/local/{lang}', 'LocalisationController@setLanguage')->name('language');
    Route::get('login/{provider}', 'SocialiteController@findOrCreateUser')->where(['provider' => 'google|github']);
    Route::get('login/{provider}/callback', 'SocialiteController@callback')->where(['provider' => 'google|github']);
    Route::get('login/{provider}/auth', 'SocialiteController@auth')
        ->where(['provider' => 'google|github'])
        ->name('social_login');
    Auth::routes(['verify' => true]);
    Route::get('/logout', 'Auth\LoginController@logout');
});
