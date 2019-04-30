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

// Route::middleware('auth:api')->get('/schooles', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/schooles', 'ApiSchoolesController@all')->name('schooles.all');
    Route::post('/schooles', 'ApiSchoolesController@store')->name('schooles.store');
    Route::get('/schooles/{id}', 'ApiSchoolesController@show')->name('schooles.show');
    Route::put('/schooles/{id}', 'ApiSchoolesController@update')->name('schooles.update');
    Route::delete('/schooles/{id}', 'ApiSchoolesController@destroy')->name('schooles.destroy');
    });
    Route::get('/schooles', 'ApiSchoolesController@all')->name('schooles.all');
