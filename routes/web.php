<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'RestaurantController@index')->name('home');


Route::get('add-to-cart/{id}', 'CartController@addToCart');
Route::patch('update-cart', 'CartController@update');
Route::delete('remove-from-cart', 'CartController@removeFromCart');
Route::get('order', 'OrderController@store')->name('order');



Route::resource('restaurant', 'RestaurantController');
Route::get('restaurant/{id}/consumables/create', 'ConsumableController@create')->name('consumable.create');
Route::post('consumables/store', 'ConsumableController@store')->name('consumable.store');
Route::delete('consumables/{id}/destroy', 'ConsumableController@destroy')->name('consumable.destroy');


