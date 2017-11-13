<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Auth\LoginController@authenticate');

Route::post('/register', 'Auth\RegisterController@register');

Route::get('/all-galleries', 'GalleriesController@index');

Route::get('/galleries/{id}', 'GalleriesController@show');

Route::get('/authors/{id}', 'GalleriesController@author');

Route::get('/comments/{id}', 'CommentsController@show');

/////////////////////////   set up jwt middleware   /////////////////////////////////

Route::middleware('jwt')->post('/create', 'GalleriesController@store');

Route::middleware('jwt')->post('/add', 'PhotoController@store');

Route::middleware('jwt')->delete('/galleries/{id}', 'GalleriesController@destroy');

Route::middleware('jwt')->post('/comments', 'CommentsController@store');

Route::middleware('jwt')->delete('/comments/{id}', 'CommentsController@destroy');