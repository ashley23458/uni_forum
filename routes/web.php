<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ForumController@index')->name('home');
Route::get('/forum/{id}', 'ThreadController@index')->name('forum_threads');
Route::resource('thread', 'ThreadController')->except(['index']);
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
