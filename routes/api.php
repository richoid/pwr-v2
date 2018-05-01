<?php

use Illuminate\Http\Request;
use App\Profile;
use App\User;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/user', function (Request $request) {
    //return $request->user();
    $user_id =  $request->user()->id;
    return User::with('profiles')->where('id', $user_id)->get();

})->middleware('auth:api');

Route::get('/profile/{id}', 'ProfileController@api_profile')->middleware('auth:api');

Route::get('/alerts/{client}', 'AlertsController@api_alerts')->middleware('auth:api');

Route::get('/calendar/{client}', 'CalendarController@api_calendar')->middleware('auth:api');
/**
 * set up notifications architecture, later
 */
//Route::get('/notifications', 'ProfileController@notify')->middleware('auth:api');
