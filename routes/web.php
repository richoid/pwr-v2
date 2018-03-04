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

Route::get('home', 'ProfileController@show')->name('home');
Route::get('profiles', 'ProfileController@index')->name('profiles');
Route::get('create/user/profile', 'ProfileController@createFromUser')->name('user.profile');
Route::resource('profile', 'ProfileController');

//profile images
Route::get('avatar-upload',['as'=>'avatar.upload','uses'=>'ImageUploadController@imageUpload']);
Route::post('avatar-upload',['as'=>'avatar.upload.post','uses'=>'ImageUploadController@imageUploadPost']);