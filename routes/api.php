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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/person', 'PersonController@all')->name('person.index');
Route::get('/person/{id}', 'PersonController@show')->name('person.show');
Route::post('/person', 'PersonController@store')->name('person.store');
Route::put('/person/{id}', 'PersonController@update')->name('person.update');
Route::delete('/person/{id}', 'PersonController@delete')->name('person.delete');
