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
//Auth::routes();

/*
|--------------------------------------------------------------------------
| Public route
|--------------------------------------------------------------------------
|
*/
Route::get('/',                     'HomeController@index');
Route::get('/home',                 'HomeController@index');
Route::get('/shops',                'MainController@shops');
Route::get('/recent',               'MainController@recent');
Route::get('/popular',              'MainController@popular');
Route::get('/top',                  'MainController@top');
Route::get('/discount',             'MainController@discount');
Route::get('/search',               'MainController@search');
Route::get('/product/{id}',         'MainController@product');
Route::get('/category/',            'MainController@category');
Route::get('/customer/{idcustomer}', 'CustomerController@customer');

Route::get('/login',     'Customer\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login',    'Customer\Auth\LoginController@login');
Route::get('/register',  'Customer\Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Customer\Auth\RegisterController@register');

//Route::post('/admin/login', 'LoginController@loginAdmin');
//Route::get('/admin/logout', 'LoginController@logoutAdmin');
//Route::get('/admin/login', 'Admin\Auth\LoginController@loginAdmin');
Route::get('/admin/login',      'Admin\Auth\LoginController@showLoginForm');
Route::post('/admin/login',     'Admin\Auth\LoginController@login');
Route::get('/admin/register',   'Admin\Auth\RegisterController@showRegistrationForm');
Route::post('/admin/register',  'Admin\Auth\RegisterController@register');

/*
|--------------------------------------------------------------------------
| Customer authenticated only
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'customer_auth'], function(){
    Route::get('/order/check',          'Customer\OrderController@check');
    Route::post('/order/run-check-post', 'Customer\OrderController@postRunCheck');
    Route::get('/order/run-check/{id}', 'Customer\OrderController@runCheck');
    Route::get('/order/proof',          'Customer\OrderController@proof');
    Route::post('/order/upload-proof',  'Customer\OrderController@uploadProof');
    Route::get('/order/{id}/status/received',  'Customer\OrderController@receivedConfirmed');

    Route::get('/cart',             'Customer\CartController@index');
    Route::post('/checkout/step1',  'Customer\CheckoutController@checkoutStep1');
    Route::post('/checkout/step2',  'Customer\CheckoutController@checkoutStep2');

    Route::post('/ajax/add-to-cart',                  'AjaxController@addToCart');
    Route::post('/ajax/update-cart',                  'AjaxController@updateCart');
    Route::get('/ajax/update-cart',                   'AjaxController@updateCart');
    Route::post('/ajax/on-change-quantity-cart-item', 'AjaxController@onChangeQuantityOfCartItem');
    Route::get('/ajax/on-change-quantity-cart-item',  'AjaxController@onChangeQuantityOfCartItem');

    Route::get('/ajax/add-csa',         'AjaxController@addCSA');
    Route::post('/ajax/add-csa',        'AjaxController@addCSA');
    Route::post('/ajax/get-csa-by-id',  'AjaxController@getCSAbyId');
    // TODO: hapus
    Route::get('/ajax/get-all-csa',     'AjaxController@getAllCSA');
    Route::post('/ajax/get-all-csa',    'AjaxController@getAllCSA');

    Route::get('/customer', 'Customer\CustomerController@index');
    Route::get('/logout',   'Customer\Auth\LoginController@logout');
});

/*
|--------------------------------------------------------------------------
| Admin authenticated only
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'admin_auth'], function(){
    Route::get('/admin/logout',                 'Admin\Auth\LoginController@logout');

    Route::get('/admin',                        'Admin\AdminController@index');
    Route::get('/admin/dashboard',              'Admin\AdminController@dashboard');
    Route::get('/admin/post',                   'Admin\AdminController@post');
    Route::get('/admin/categories',             'Admin\AdminController@categories');
    Route::get('/admin/orders',                 'Admin\OrderController@index');
    Route::get('/admin/customers',              'Admin\AdminController@customers');
    Route::get('/admin/products',               'Admin\AdminController@products');
    Route::get('/admin/setting',                'Admin\AdminController@setting');
    Route::get('/admin/info',                   'Admin\AdminController@info');
    Route::get('/admin/profile',                'Admin\AdminController@profile');
    Route::get('/admin/customer/{idcustomer}',  'Admin\AdminController@customer');
    Route::get('/admin/report',                 'Admin\OrderController@report');

    // order spesific
    Route::get('/admin/orders/status/need-approved',    'Admin\OrderController@needApproved');
    Route::get('/admin/orders/status/waiting-payment',  'Admin\OrderController@waitingPayment');
    Route::get('/admin/orders/status/payment-verified', 'Admin\OrderController@paymentVerified');
    Route::get('/admin/orders/status/has-sent',         'Admin\OrderController@hasSent');
    Route::get('/admin/orders/status/recent-success',   'Admin\OrderController@recentSuccess');

    Route::get('/admin/orders/change-status/{id}/to/{state}',   'Admin\OrderController@changeState');
    Route::get('/admin/order/review-proof/{id}',     'Admin\OrderController@reviewProof');
    Route::get('/admin/order/proof/{id}/verified',   'Admin\OrderController@makeProofVerified');
    Route::get('/admin/order/proof/{id}/rejected',    'Admin\OrderController@makeProofRejected');

    //category
    Route::get('/admin/category/get',       'Admin\CategoryController@get');
    Route::post('/admin/category/add',      'Admin\CategoryController@addParent');
    Route::post('/admin/category/delete',   'Admin\CategoryController@delete');
    Route::post('/admin/category/addChild', 'Admin\CategoryController@addChild');

    //posting product
    Route::post('/product/post',        'Admin\PostController@product');
    Route::post('/product/image',       'Admin\PostController@image');
    Route::post('/product/size',        'Admin\PostController@size');
    Route::post('/product/color',       'Admin\PostController@color');
    Route::post('/product/settingup',   'Admin\PostController@settingup');
});
