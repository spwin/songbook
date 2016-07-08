<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FrontendController@index');
Route::get('tags', 'FrontendController@manageTags');
Route::get('add-song', 'FrontendController@addSong');
Route::get('all-songs', 'FrontendController@allSongs');
Route::get('search', 'FrontendController@search');
Route::get('{id}/edit-song', 'FrontendController@editSong');
Route::get('show-song/{url}', 'FrontendController@showSong');

Route::post('{id}/update-song', 'FrontendController@updateSong');
Route::post('save-song', 'FrontendController@saveSong');