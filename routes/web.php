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

Route::get('/', 'BookmarkController@index');
Route::post('/create_bookmark', 'BookmarkController@create');
Route::post('/update_bookmark/{id}', 'BookmarkController@update');
Route::get('/bookmark/{id}', 'BookmarkController@singlebookmark');
Route::get('/delete/{id}', 'BookmarkController@destroy');

