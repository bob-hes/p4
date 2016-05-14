<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ScheduleController@showSchedule');
Route::get('/home', 'ScheduleController@showSchedule');

// Authentication
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function () {
    // Scheduling routes
    Route::post('/add-busy-time', 'ScheduleController@addTime');
    Route::post('/remove-busy-time', 'ScheduleController@removeTime');
    Route::post('/edit-busy-time', 'ScheduleController@editTime');

    // Relationship based routes
    Route::get('/users', 'FriendsController@showMatches');
    Route::post('/add-friend', 'FriendsController@addFriend');
    Route::post('/remove-friend', 'FriendsController@removeFriend');
});


