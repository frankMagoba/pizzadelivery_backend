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

Route::prefix('pizza')->group(function () {
    Route::get('all', 'pizzacontroller@index');
    Route::get('{id}', 'pizzacontroller@show');
});

Route::prefix('order')->group(function () {
    Route::post('store', 'orderscontroller@store');
    Route::get('get/{id}', 'orderscontroller@show');
    Route::get('all', 'orderscontroller@index')->middleware('auth:api');
});

Route::prefix('cart')->group(function () {
    Route::post('store', 'menucontroller@store')->middleware('auth:api');
    Route::get('show', 'menucontroller@show')->middleware('auth:api');
    Route::delete('remove_item/{id}', 'menucontroller@remove_item')->middleware('auth:api');
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'authentication@login');
    Route::post('register', 'authentication@register');
    Route::get('get_user', 'authentication@get_auth_user')->middleware('auth:api');
    Route::post('logout', 'authentication@logout')->middleware('auth:api');
});

