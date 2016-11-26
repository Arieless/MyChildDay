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

// PUBLIC routes

Route::get('/', 'PublicController@index');
Route::get('/faq', 'PublicController@faq');
Route::get('/terms', 'PublicController@terms');
Route::get('/contact', 'PublicController@contact');

// MAIL routes

Route::post('contact', 'MailController@postContact');

//AUTH routes

Auth::routes();

Route::group(['middleware' => ['auth']], function(){ // auth pages goes here
    Route::get('/home', 'HomeController@index');
});
