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


// WARNINGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
// ***"##$#%$&)=(#$()==)(!=)()(=#"!(=)"#!)(=(=)!"#)(="=)(#!(!&$)(!$#"?%&)?"))")")"
    Route::get('/testing', 'PostController@upload');
// ***"##$#%$&)=(#$()==)(!=)()(=#"!(=)"#!)(=(=)!"#)(="=)(#!(!&$)(!$#"?%&)?"))")")"

// PUBLIC routes

Route::get('/', 'PublicController@index');
Route::get('/faq', 'PublicController@faq');
Route::get('/terms', 'PublicController@terms');

// MAIL routes
Route::get('/contact', 'PublicController@contact');
Route::post('/contact/send', 'MailController@postContact');

// AUTH routes
Auth::routes();

Route::group(['middleware' => ['auth']], function(){

    Route::get('/home', 'HomeController@index');
    Route::post('/home', 'HomeController@chooseRol');

    Route::get('/home/profile/edit/user', 'ProfileController@edit');
    Route::post('/home/profile/edit/user', 'ProfileController@update');


    Route::get('/home/profile/teachers/{idTeacher}/{teacherName}', 'TeacherController@profile');
    Route::get('/home/profile/rooms/{idRoom}/{roomName}', 'RoomController@profile');
    Route::get('/home/profile/kid', 'KidController@profile');
    Route::get('/home/profile/parent', 'ParentController@profile');
    Route::get('/home/profile/school', 'SchoolController@profile');
    Route::get('/home/profile/edit/school', 'SchoolController@edit');


    // Route::group(['middleware' => ['authParent']], function(){}            make middleware      Kids should also be > 0

    Route::get('/home/parent', 'ParentController@feed');
    Route::get('/home/parent/feed', 'ParentController@feed');

    // Route::group(['middleware' => ['authTeacher']], function(){}         make middleware        Rooms should also be > 0

    Route::get('/home/teacher', 'TeacherController@feed');
    Route::get('/home/teacher/feed', 'TeacherController@feed');

    Route::get('/home/teacher/post', 'TeacherController@post');
    Route::post('/home/teacher/post', 'PostController@upload');

    Route::get('/home/teacher/rooms', 'TeacherController@rooms');

    // Route::group(['middleware' => ['authSchool']], function(){}            make middleware     Schools should also be > 0

    Route::get('/home/school', 'SchoolController@feed');
    Route::get('/home/school/feed', 'SchoolController@feed');

    Route::get('/home/school/post', 'SchoolController@post');
    Route::post('/home/school/post', 'PostController@upload');

    Route::get('/home/school/rooms', 'SchoolController@rooms');
    Route::get('/home/school/kids', 'SchoolController@kids');
    Route::get('/home/school/teachers', 'SchoolController@teachers');



});
