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
