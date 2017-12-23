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

Route::get('/', 'MainController@index');
Route::get('/shops', 'MainController@shops');
Route::get('/recent', 'MainController@recent');
Route::get('/popular', 'MainController@popular');
Route::get('/top', 'MainController@top');
Route::get('/search', 'MainController@search');
Route::get('/product/{id}', 'MainController@product');
Route::get('/order/cek', 'MainController@orderCek');
Route::get('/order/proof', 'MainController@orderProof');
Route::get('/category/{ctr}', 'MainController@category');
Route::get('/cart', 'MainController@cart');
Route::get('/purchase/{idcart}', 'MainController@purchase');
Route::get('/purchase/all', 'MainController@purchaseAll');
Route::get('/signin', 'MainController@signin');
Route::get('/signup', 'MainController@signup');
Route::get('/cart', 'MainController@cart');
Route::post('/ajax/add-to-cart', 'AjaxController@addToCart');
Route::post('/ajax/on-change-quantity-cart-item', 'AjaxController@onChangeQuantityOfCartItem');

//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/post', 'AdminController@post');
Route::get('/admin/categories', 'AdminController@categories');
Route::get('/admin/orders', 'AdminController@orders');
Route::get('/admin/costumers', 'AdminController@costumers');
Route::get('/admin/products', 'AdminController@products');
Route::get('/admin/setting', 'AdminController@setting');
Route::get('/admin/info', 'AdminController@info');
Route::get('/admin/profile', 'AdminController@profile');
Route::get('/admin/costumer/{idcostumer}', 'AdminController@costumer');

//Customer
Route::get('/costumer', 'CostumerController@index');
Route::get('/costumer/{idcostumer}', 'CostumerController@costumer');
