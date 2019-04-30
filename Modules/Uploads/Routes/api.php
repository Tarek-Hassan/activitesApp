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

// Route::middleware('auth:api')->get('/uploads', function (Request $request) {
//     return $request->user();
// });
Route::get('/uploads', 'APIUploadsController@index')->name('uploads.index');
Route::post('/uploads', 'APIUploadsController@store')->name('uploads.store');
Route::get('/uploads/{id}', 'APIUploadsController@show')->name('uploads.show');
// Route::get('/like/{id}', 'APIUploadsController@like')->name('like.like');
// Route::get('/favourate/{id}', 'APIUploadsController@favourates')->name('favourate.favourate');
Route::delete('/uploads/{id}', 'APIUploadsController@destroy')->name('uploads.destroy');
Route::get('/favourate', 'APIUploadsController@favourate')->name('favourate.favourate');