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
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('logout', 'HomeController@index');

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');


Route::resource('user', 'UserController');

Route::resource('setting', 'SettingController');

Route::resource('category', 'CatagoryController');

Route::resource('product', 'ProductController');

Route::resource('brand', 'BrandController');

Route::resource('contact', 'ContactController');

Route::get('cart', 'CartController@cart')->name('cart');

Route::get('cart/add/{id}', 'CartController@addToCart')->name('cart.add');

Route::get('cart/delete/{id}', 'CartController@destroyCartItem')->name('cart.destroy');

Route::post('cart/update', 'CartController@updateCartItem')->name('cart.update');

Route::get('order/address', 'HomeController@address')->name('address')->middleware('auth');



Route::post('order/checkout', 'HomeController@checkout')->name('checkout')->middleware('auth');

Route::put('order/checkout', 'CheckoutController@storeOrder')->name('store.order')->middleware('auth');

Route::get('order/invoice/{id}', 'CheckoutController@showInvoice')->name('view.invoice')->middleware('auth');
Route::get('update-cart/{pid}/{qty}','CartController@updateQty');