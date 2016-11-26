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


// MAIL routes
Route::get('/contact', 'PublicController@contact');
Route::post('/contact/send', 'MailController@postContact');




//AUTH routes

Auth::routes();

Route::group(['middleware' => ['auth']], function(){ // auth pages goes here

    Route::get('/home', 'HomeController@index');

    Route::get('/home/profile/edit/user', 'ProfileController@editUser');

    // Route::group(['middleware' => ['auth', 'authSchool']], function(){}

    // Route::group(['middleware' => ['auth', 'authParent']], function(){}

    // Route::group(['middleware' => ['auth', 'authTeacher']], function(){}

});
