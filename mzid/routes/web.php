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
/* FrontEnd Location */


Route::get('/', 'HomeController@index')->name('home');
Route::get('/list-products', 'HomeController@shop')->name('shop');
Route::get('/cat/{id}', 'IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}', 'IndexController@detialpro');
Route::get('/search', 'HomeController@search');
Route::get('/about', 'HomeController@about');
////// get Attribute ////////////
Route::get('/get-product-attr', 'IndexController@getAttrs');
///// Cart Area /////////
Route::post('/addToCart', 'CartController@addToCart')->name('addToCart');
Route::get('/viewcart', 'CartController@index')->name('cart');
Route::get('/cart/deleteItem/{id}', 'CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/{quantity}', 'CartController@updateQuantity');
/////////////////////////
/// Apply Coupon Code
Route::post('/apply-coupon', 'OrderController@applycoupon');
/// Simple User Login /////
Route::get('/login_page', 'AuthController@index');
Route::post('/register_user', 'AuthController@register');
Route::post('/user_login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/MustLogin', 'IndexController@WarningAlert');

////// User Authentications ///////////
Route::group(['middleware' => 'FrontLogin_middleware'], function () {

    Route::put('/update-profile/{id}', 'AccountController@updateprofile');
    Route::put('/update-password/{id}', 'AccountController@updatepassword');
    Route::get('/check-out', 'CheckOutController@index');
    Route::post('/submit-checkout', 'CheckOutController@submitcheckout');
    Route::get('/order-review', 'OrderController@index');
    Route::post('/submit-order', 'OrderController@order');
    Route::get('/cod', 'OrderController@cod');
    Route::get('/bank', 'OrderController@bank');
    Route::post('/payment-bank', 'OrderController@prosesBank');
    Route::post('/payment-cod', 'OrderController@prosesCod');
    // Route::post('/payment-transfer', 'OrderController@paymentTransfer');
});
///
///


// Route::('/login','AuthController@index')->name('login');

/* Admin Location */
Auth::routes(['register' => false, 'login' => false]);
Route::get('/admin', 'AdminController@index')->name('dashboard');

//Product
Route::get('/admin/product', 'ProductController@index')->name('product');
Route::get('/admin/product/show/{id}', 'ProductController@show');
Route::get('/admin/product/add', 'ProductController@add')->name('add-product');
Route::post('/admin/product/create', 'ProductController@create');
Route::get('/admin/product/edit/{id}', 'ProductController@edit');
Route::post('/admin/product/update/{id}', 'ProductController@update');
Route::get('/admin/product/delete/{id}', 'ProductController@delete');
Route::get('/product/pdf', 'ProductController@cetak_pdf')->name('product-pdf');

// Product Attribute
Route::get('/admin/product-attribute/{id}', 'ProductAttrController@show');
Route::post('/admin/product-attribute/{id}', 'ProductAttrController@create');
Route::post('/admin/product-attribute/update/{id}', 'ProductAttrController@update');
Route::get('/admin/product-attribute/delete/{id}', 'ProductAttrController@delete');

// Product Gallery
Route::get('/admin/product-gallery/{id}', 'ProductGalleryController@show');
Route::post('/admin/product-gallery/{id}', 'ProductGalleryController@create');
Route::get('/admin/product-gallery/delete/{id}', 'ProductGalleryController@delete');

// Category
Route::get('/admin/category', 'ProductCategoryController@index')->name('product-category');
Route::get('/admin/category/add', 'ProductCategoryController@add')->name('add-category');
Route::post('/admin/category/create', 'ProductCategoryController@create');
Route::get('/admin/category/edit/{id}', 'ProductCategoryController@edit');
Route::post('/admin/category/update/{id}', 'ProductCategoryController@update');
Route::get('/admin/category/delete/{id}', 'ProductCategoryController@delete');


Route::get('/admin/order', 'AdminOrderController@index')->name('order');
Route::get('/admin/order/{id}', 'AdminOrderController@show');
Route::get('/order/pdf', 'AdminOrderController@cetak_pdf')->name('order-pdf');


// User
Route::get('/admin/user', 'UserController@index')->name('user');
Route::get('/admin/user/show/{id}', 'UserController@show');
Route::get('/admin/user/add', 'UserController@add')->name('add-user');
Route::post('/admin/user/create', 'UserController@create');
Route::get('/admin/user/edit/{id}', 'UserController@edit');
Route::post('/admin/user/update/{id}', 'UserController@update');
Route::get('/admin/user/delete/{id}', 'UserController@delete');
Route::get('admin/user/pdf', 'UserController@cetak_pdf')->name('user-pdf');

//Coupon
Route::get('/admin/coupon', 'CouponController@index')->name('coupon');
Route::get('/admin/coupon/add', 'CouponController@add')->name('add-coupon');
Route::post('/admin/coupon/create', 'CouponController@create');
Route::get('/admin/coupon/edit/{id}', 'CouponController@edit');
Route::post('/admin/coupon/update/{id}', 'CouponController@update');
Route::get('/admin/coupon/delete/{id}', 'CouponController@delete');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
//     Route::get('/', 'AdminController@index')->name('admin_home');
//     /// Setting Area
//     Route::get('/settings', 'AdminController@settings');
//     Route::get('/check-pwd', 'AdminController@chkPassword');
//     Route::post('/update-pwd', 'AdminController@updatAdminPwd');
//     /// Category Area
//     Route::resource('/category', 'CategoryController');
//     Route::get('delete-category/{id}', 'CategoryController@destroy');
//     Route::get('/check_category_name', 'CategoryController@checkCateName');
//     /// Products Area
//     Route::resource('/product', 'ProductsController');
//     Route::get('delete-product/{id}', 'ProductsController@destroy');
//     Route::get('delete-image/{id}', 'ProductsController@deleteImage');
//     /// Product Attribute
//     Route::resource('/product_attr', 'ProductAtrrController');
//     Route::get('delete-attribute/{id}', 'ProductAtrrController@deleteAttr');
//     /// Product Images Gallery
//     Route::resource('/image-gallery', 'ImagesController');
//     Route::get('delete-imageGallery/{id}', 'ImagesController@destroy');
//     /// ///////// Coupons Area //////////
//     Route::resource('/coupon', 'CouponController');
//     Route::get('delete-coupon/{id}', 'CouponController@destroy');
//     ///
// });
