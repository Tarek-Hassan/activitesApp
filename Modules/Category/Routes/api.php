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

Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/category', 'CategoryApiController@all')->name('category.all');
    Route::post('/category', 'CategoryApiController@store')->name('category.store');
    Route::get('/category/{id}', 'CategoryApiController@show')->name('category.show');
    Route::put('/category/{id}', 'CategoryApiController@update')->name('category.update');
    Route::delete('/category/{id}', 'CategoryApiController@destroy')->name('category.destroy');
    });


