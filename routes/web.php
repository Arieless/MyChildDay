<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PublicController@index');
Route::get('/faq', 'PublicController@faq');
Route::get('/terminos', 'PublicController@terms');
Route::get('/contacto', 'PublicController@contact');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){ // auth pages goes here
    Route::get('/home', 'HomeController@index');
});
