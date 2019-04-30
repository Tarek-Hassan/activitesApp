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

// Route::middleware('auth:api')->get('/activties', function (Request $request) {
//     return $request->user();
// });
Route::get('/activties', 'APIActivitiesController@index')->name('activties.index');
Route::post('/activties', 'APIActivitiesController@store')->name('activties.store');
Route::get('/activties/{id}', 'APIActivitiesController@show')->name('activties.show');
Route::put('/activties/{id}', 'APIActivitiesController@update')->name('activties.update');
Route::delete('/activties/{id}', 'APIActivitiesController@destroy')->name('activties.destroy');