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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/index', 'ProductController@index')->name('index');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
Route::get('/shoppingCart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
Route::post('/checkout', 'ProductController@postCheckout')->name('checkout');
Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.remove');

Route::get('/profile', 'ProductController@profile')->name('profile');