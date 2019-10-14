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

Route::bind('product', function ($slug){
    return App\Product::where('slug', $slug)->first();
});

Route::get('/', [
    'as' => 'home',
    'uses' => 'StoreController@index']);

Route::get('/catalog', [
    'as' => 'catalog',
    'uses' => 'StoreController@catalog'
]);

Route::get('product/{slug}', [
    'as' => 'product-detail',
    'uses' => 'StoreController@show']);

/******* CARRITO DE COMPRAS  *******/

Route::get('cart/show',[
    'as' => 'cart-show',
    'uses' => 'CartController@Show'
]);

Route::get('cart/add/{product}', [
    'as' => 'cart-add',
    'uses' => 'CartController@add'
]);

Route::get('cart/delete/{product}', [
    'as' => 'cart-delete',
    'uses' => 'CartController@delete'
]);


