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

/*Route::group(['middleware' => 'auth:api'], function () {
	Route::get('banner',  'BannerController@index');
	Route::post('banner', 'BannerController@create');
	Route::delete('banner/{id}', 'BannerController@delete');
	Route::put('banner/{id}', 'BannerController@update');
});*/


$router->group(['middleware' => 'auth:api'], function () use ($router) {
	$router->get('banner', 'BannerController@index');
	$router->get('banner/{id}', 'BannerController@show');
	$router->post('banner', 'BannerController@store');
	$router->put('banner/{id}', 'BannerController@update');
	$router->delete('banner/{id}', 'BannerController@destroy');
	
	$router->get('category', 'CategoryController@index');
	$router->get('category/{id}', 'CategoryController@show');
	$router->post('category', 'CategoryController@store');
	$router->put('category/{id}', 'CategoryController@update');
	$router->delete('category/{id}', 'CategoryController@destroy');
});
