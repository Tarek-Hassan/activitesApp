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

// Route::middleware('auth:api')->get('/student', function (Request $request) {
//     return $request->user();
// });
Route::get('/student', 'APIStudentsController@index')->name('student.index');
Route::post('/student', 'APIStudentsController@store')->name('student.store');
Route::get('/student/{id}', 'APIStudentsController@show')->name('student.show');
Route::put('/student/{id}', 'APIStudentsController@update')->name('student.update');
Route::delete('/student/{id}', 'APIStudentsController@destroy')->name('student.destroy');

Route::get('/countrySelcted', 'APIStudentsController@countrySelcted')->name('countrySelcted.countrySelcted');