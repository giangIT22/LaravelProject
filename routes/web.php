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
// use Illuminate\Http\Request;
// Route::get('goto-sesstion', function(Request $request){
//     $giang = $request->session()->push('giang', 'giang dzai');
//     $all = $request->session()->all();
//     dd($all);
// });

Route::namespace('Frontend')->group(function(){
    Route::get('/', 'HomeController@index')->name('frontend.home');

    Route::get('gio-hang', 'CartController@index')
        ->name('frontend.cart.index');
        
    Route::post('cart/checkout', 'CartController@checkout')->name('cart.checkout');

    Route::get('product/show/{id}', 'ProductController@show')->name('product.show');
   
    Route::get('cart/{productId}', 'CartController@store')->name('frontend.cart.store');

    Route::post('cart/update', 'CartController@update')
    	->name('cart.update');

    Route::get('cart/remove-product/{productId}', 'CartController@destroy')->name('cart.destroy');


    Route::get('{slug}', 'CategoryController@show')->name('frontend.category.show');


});



