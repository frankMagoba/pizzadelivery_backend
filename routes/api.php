<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/pizzas', 'PizzaorderController@index')->name('pizzaorder.index');

Route::post('/pizzas', 'PizzaorderController@store')->name('pizzaorder.store');

Route::get('/pizzas/{task}', 'PizzaorderController@show')->name('pizzaorder.show');

Route::put('/pizzas/{task}', 'PizzaorderController@update')->name('pizzaorder.update');

Route::delete('/pizzas/{task}', 'PizzaorderController@destory')->name('pizzaorder.destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
