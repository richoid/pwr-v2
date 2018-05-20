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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('create/user/profile', 'ProfileController@createFromUser')->name('user.profile');
Route::get('create/user/{id}/profile', 'ProfileController@createFromUserID')->name('userIDprofile');
Route::get('/show/user/profile/{id}', 'ProfileController@show_for_admins');
Route::resource('profile', 'ProfileController');
Route::get('home', 'ProfileController@show')->name('home');



//passport token management
Route::get('passport', function () {
    return view('auth.passport');
});

//profile images
Route::get('avatar-upload',['as'=>'avatar.upload','uses'=>'ImageUploadController@imageUpload']);
Route::post('avatar-upload',['as'=>'avatar.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

// spatie permissions with this tutorial:
// https://scotch.io/tutorials/user-authorization-in-laravel-54-with-spatie-laravel-permission

Route::resource('users', 'UserController');

Route::resource('clients', 'ClientController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');



//posts (Alert, Calendar, News, Info)
Route::resource('posts', 'PostController');
Route::get('posts/for/client/{client_short}', 'PostController@posts_for_client');

/**
 * NOTE: Calendar, Alerts, Info, News are all the Post model (above). 
 */
//calendar
Route::get('m/calendar/{client}', 'CalendarController@calendar_mobile')->name('mobile.calendar');
Route::resource('calendar', 'CalendarController');

//alerts
Route::get('m/alerts/{client}', 'AlertsController@alerts_api')->name('mobile.alerts');
Route::resource('alerts', 'AlertsController');

//reports
Route::get('reports', 'ReportController@index')->name('reports.index');
Route::get('report/{id}', 'ReportController@show')->name('reports.show');
