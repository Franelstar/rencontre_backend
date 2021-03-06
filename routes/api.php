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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::get('informationPersonnelles', 'InformationPersonnellesController@index');
Route::get('informationPersonnelles/{id}', 'InformationPersonnellesController@show')->middleware('auth:api');
Route::post('informationPersonnelles', 'InformationPersonnellesController@store');
Route::post('informationPersonnelles/{id}', 'InformationPersonnellesController@update')->middleware('auth:api');
Route::delete('employee/{id}', 'InformationPersonnellesController@destroy');

Route::get('informationPhysiques', 'InformationPhysiquesController@index');
Route::get('informationPhysiques/{id}', 'InformationPhysiquesController@show')->middleware('auth:api');
Route::post('informationPhysiques', 'InformationPhysiquesController@store');
Route::post('informationPhysiques/{id}', 'InformationPhysiquesController@update')->middleware('auth:api');
Route::delete('employee/{id}', 'InformationPhysiquesController@destroy');


Route::get('recherche', 'RechercheController@index');
Route::get('recherche/{id}', 'RechercheController@show2');
Route::post('recherche', 'RechercheController@store');
Route::post('recherche/{id}', 'RechercheController@show');
Route::delete('recherche/{id}', 'RechercheController@destroy');
