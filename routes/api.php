<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'student'], function () {
    // Login Student
    Route::post('/login', 'AuthStudents\LoginController@login');
    
    // Signup Student
    Route::post('/signup', 'StudentController@store');
    // Show Student
    Route::get('/', 'StudentController@index');
    // Show Student by ID
    Route::get('/{id}', 'StudentController@show');
    // Update Student
    Route::put('/update/{id}', 'StudentController@update');
    // Delete Student
    Route::delete('/{id}', 'StudentController@destroy');
});