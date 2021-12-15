<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('shirts', 'Api\ShirtController@getAll');
Route::get('shirts/{id}', 'Api\ShirtController@getByID');
Route::post('shirts', 'Api\ShirtController@createShirt');
Route::put('shirts/{id}', 'Api\ShirtController@updateShirt');
Route::delete('shirts/{id}','Api\ShirtController@deleteShirt');

Route::post('shirts/csvparse', 'Api\ShirtController@parseCSV');
Route::post('shirts/csvimport', 'Api\ShirtController@importCSV');