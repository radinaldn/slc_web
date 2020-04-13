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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('password/create', 'API\UserController@createResetPass');
Route::post('password/reset', 'API\UserController@resetResetPass');
Route::get('password/find/{token}', 'API\UserController@findResetPass');

Route::group(['middleware' => 'auth:api'], function () {
  // User
    Route::post('update', 'API\UserController@update');
    Route::post('backup', 'API\UserController@backup');
    Route::get('logout', 'API\UserController@logout');
    Route::get('test', 'API\UserController@test');

  // Resto
    Route::post('resto/create','API\RestoController@create');
    Route::get('resto','API\RestoController@show');
    Route::post('menu/recom','API\RestoController@recommend');
    Route::post('resto/setstatus','API\RestoController@setStatus');
    Route::post('resto/update','API\RestoController@update');
    Route::post('resto/delete','API\RestoController@delete');
  // Menu
    Route::post('menu/create','API\MenuController@create');
    Route::post('menu','API\MenuController@show');
    Route::post('menu/setstatus','API\MenuController@setStatus');
    Route::post('menu/update','API\MenuController@update');
    Route::post('menu/single','API\MenuController@getSingleMenu');
    Route::post('menu/delete','API\MenuController@delete');
  // Review
    Route::post('review/create','API\ReviewController@create');
    Route::post('review','API\ReviewController@show');
    Route::post('review/my','API\ReviewController@getMyReview');
    Route::post('review/update','API\ReviewController@update');
    Route::post('review/delete','API\ReviewController@delete');

    Route::post('promo/create','API\MenuController@addPromo');
    Route::post('promo','API\MenuController@getPromo');
    Route::post('promo/delete','API\MenuController@deletePromo');
    Route::post('promo/update','API\MenuController@updatePromo');
    Route::post('promo/single','API\MenuController@getSinglePromo');
    
    Route::post('report','API\ReportController@sendReport');
    Route::get('report/get','API\ReportController@getReport');
    Route::post('report/getcomment','API\ReportController@getReportedComment');
    Route::post('report/suspend','API\ReportController@suspend');
});
