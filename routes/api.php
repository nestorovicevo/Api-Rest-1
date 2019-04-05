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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('contacts', 'ContactController@index');
Route::post('contacts', 'ContactController@store');
Route::get('contacts/{id}', 'ContactController@show');
Route::put('contacts/{contact}', 'ContactController@update');
Route::delete('contacts/{id}', 'ContactController@destroy');
///////////////////////////////////////////////////////////////////////////////////
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});



// Route::resource('contacts', 'ContactController'); ovo je ako zelimo sve metode iz ovog kontrolera, a posto zelimo samo jednu, bolje je ovo gore
