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

Route::group(['middleware' => ['auth']], function(){

    Route::get('/home', 'HomeController@index');
    Route::post('/home', 'HomeController@chooseRol');
    Route::get('/home/profile/edit/user', 'ProfileController@editUser');
    Route::post('/home/profile/edit/user', 'ProfileController@updateUser');

    // Route::group(['middleware' => ['authParent']], function(){}
    Route::get('/home/parent/feed', 'ParentController@feed');

    // Route::group(['middleware' => ['authTeacher']], function(){}
    Route::get('/home/teacher/feed', 'TeacherController@feed');

    Route::get('/home/teacher/post', 'TeacherController@post');
    Route::post('/home/teacher/post', 'PostController@uploadPost');

    Route::get('/home/teacher/rooms', 'TeacherController@rooms');

    // Route::group(['middleware' => ['authSchool']], function(){}
    Route::get('/home/school/feed', 'SchoolController@feed');

    Route::get('/home/school/post', 'SchoolController@post');
    Route::post('/home/school/post', 'PostController@uploadPost');

    Route::get('/home/school/rooms', 'SchoolController@rooms');

    Route::get('/home/school/edit', 'SchoolController@editSchool');

});
