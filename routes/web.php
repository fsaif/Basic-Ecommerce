<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/lang/{language}', 'LanguageController@switchLang')->name('lang.switch');

// Home Routes...
Route::get('/shop', 'HomeController@index')->name('homelink');
Route::get('/shop/home', 'HomeController@index')->name('home');

// Authentication Routes...
Route::get('/auth/signin', 'Auth\LoginController@showLoginForm')->name('signin');
Route::post('/auth/signin', 'Auth\LoginController@login')->name('login');
Route::post('/auth/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/auth/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('/auth/signup', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::get('/auth/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/auth/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/auth/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/auth/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


// Categories Routes...
Route::get('/shop/category/{id}', 'HomeController@index')->name('catgory.route');

// Product details page Route...
Route::get('/shop/product/{id}', 'HomeController@showProduct')->name('product.route');

// my items Route...
Route::get('/account/products', 'ProductController@showMyItems')->name('myitems.route');
Route::get('/account/products/list', 'ProductController@showMyItems')->name('myitemslist.route');

// create item Route...
Route::get('/account/products/create', 'ProductController@showCreateForm')->name('additemform.route');
Route::post('/account/products/create', 'ProductController@createItem')->name('additem.route');

// edit item Route...
Route::get('/account/products/edit/{id}', 'ProductController@showEditForm')->name('edititemform.route');
Route::post('/account/products/edit/{id}', 'ProductController@editItem')->name('edititem.route');

// delete item Route...
Route::get('/account/products/delete/{id}', 'ProductController@deleteItem')->name('deleteitem.route');

// my profile Route...
Route::get('/account/profile/main', 'ProfileController@showMyProfile')->name('myprofile.route');
Route::get('/account/profile/edit', 'ProfileController@editMyProfileForm')->name('myprofileform.route');
Route::post('/account/profile/edit', 'ProfileController@editMyProfile')->name('editmyprofile.route');

// comment form Route...
Route::post('/shop/product/comment/{id}', 'ProductController@addComment')->name('addcomment.route');

// social login routes...
Route::get('/auth/signin/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|google')->name('socialLogin');

Route::get('/auth/signin/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|google');

// Administrator Control Panel Routes...
Route::group(['prefix' => '/admin', 'middleware' => ['role:super_admin']], function () {

    // Dashboard route...
    Route::get('/dashboard', 'Dashboard\DashboardController@showDashboard')->name('dashboard');

    // Users
    Route::resource('users', 'Dashboard\UsersController');
    Route::get('/users/up/{id}', 'Dashboard\UsersController@MoveUp')->name('users.up');
    Route::get('/users/down/{id}', 'Dashboard\UsersController@MoveDown')->name('users.down');
    Route::get('/users/delete/{id}', 'Dashboard\UsersController@delete')->name('users.delete');
    Route::get('/users/activation/{id}', 'Dashboard\UsersController@activation')->name('users.activation');
    // Categories
    Route::resource('categories', 'Dashboard\CategoriesController');
    Route::get('/categories/delete/{id}', 'Dashboard\CategoriesController@delete')->name('categories.delete');
    Route::get('/categories/up/{id}', 'Dashboard\CategoriesController@MoveUp')->name('categories.up');
    Route::get('/categories/down/{id}', 'Dashboard\CategoriesController@MoveDown')->name('categories.down');
    Route::get('/categories/activation/{id}', 'Dashboard\CategoriesController@activation')->name('categories.activation');

    // Products
    Route::resource('products', 'Dashboard\ProductsController');
    Route::get('/products/delete/{id}', 'Dashboard\ProductsController@delete')->name('products.delete');
    Route::get('/products/up/{id}', 'Dashboard\ProductsController@MoveUp')->name('products.up');
    Route::get('/products/down/{id}', 'Dashboard\ProductsController@MoveDown')->name('products.down');
    Route::get('/products/activation/{id}', 'Dashboard\ProductsController@activation')->name('products.activation');


});

// multi currenct routes...
Route::get('/currency/change/{currencyID}','CurrencyController@changeCurrency')->name('changeCurrency');

// shopping cart routes...
Route::get('/shop/cart', 'CartController@getCart')->name('mycart.route');
Route::post('/shop/cart/add/{id}', 'CartController@addToCart')->name('addToCart.route');
Route::get('/shop/cart/remove/{id}', 'CartController@RemoveFromCart')->name('removeFromCart.route');