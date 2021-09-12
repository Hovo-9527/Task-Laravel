<?php

use Illuminate\Support\Facades\Auth;
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



Route::prefix('admin')->middleware('checkSuperAdmin')->group(function(){
   Route::prefix('product')->group(function (){
       Route::get('', 'admin\ProductController@index');
       Route::post('add', 'admin\ProductController@store');
       Route::get('delete/{id}', 'admin\ProductController@destroy');
       Route::get('edit/{id}', 'admin\ProductController@show');
       Route::post('edit/{id}', 'admin\ProductController@update');
   });

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('payment', 'admin\PaymentController@index');

    Route::prefix('category')->group(function (){
        Route::get('', 'admin\CategoryController@index');
        Route::post('add', 'admin\CategoryController@store');
        Route::get('delete/{id}', 'admin\CategoryController@destroy');
        Route::get('edit/{id}', 'admin\CategoryController@show');
        Route::post('edit/{id}', 'admin\CategoryController@update');
    });
});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/worker/product', 'worker\ProductController@index');
Route::get('/worker/cart', 'worker\CartController@index');
Route::get('/worker/checkout', 'worker\CartController@checkout');
Route::get('/cart/add/{id}', 'worker\CartController@store');
Route::get('/cart/delete/{id}', 'worker\CartController@destroy');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



