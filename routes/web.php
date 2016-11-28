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

    Route::post('/home/chooseRol', 'HomeController@chooseRol');

    Route::get('/home/profile/edit/user', 'ProfileController@editUser');


    // Route::group(['middleware' => ['auth', 'authParent']], function(){}
    Route::get('/home/parent/feed', 'ParentController@feed');
    // Route::group(['middleware' => ['auth', 'authTeacher']], function(){}
    Route::get('/home/teacher/feed', 'TeacherController@feed');
    Route::get('/home/teacher/post', 'TeacherController@post');
    // Route::group(['middleware' => ['auth', 'authSchool']], function(){}
    Route::get('/home/school/feed', 'SchoolController@feed');
    Route::get('/home/profile/edit/school', 'ProfileController@editSchoolTemp');
});
