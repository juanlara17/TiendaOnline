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
    'as' => 'index',
    'uses' => 'StoreController@index']);

Route::get('/catalog', [
    'as' => 'catalogo',
    'uses' => 'StoreController@catalog'
]);

Route::get('product/{slug}', [
    'as' => 'product-detail',
    'uses' => 'StoreController@show']);

/******* Carrito de Compras  *******/

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

Route::get('cart/trash', [
    'as' => 'cart-trash',
    'uses' => 'CartController@trash'
]);

Route::get('cart/update/{product}/{quantity}', [
    'as' => 'cart-update',
    'uses' => 'CartController@update'
]);

Route::get('order-detail', [
    'middleware' => 'auth',
    'as' => 'order-detail',
    'uses' => 'CartController@orderdetail'
]);

/***** Routes Authentication *****/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/***** Paypal *****/
Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment'
));

Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus'
));
