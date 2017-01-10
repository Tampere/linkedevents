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
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('event', 'EventsController@index');
Route::get('event/{id}', 'EventsController@show');

Route::get('keyword', 'KeywordsController@index');
Route::get('keyword/{id}', 'KeywordsController@show');

Route::get('place', 'PlacesController@index');
Route::get('place/{id}', 'PlacesController@show');
