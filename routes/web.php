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

   Route::get('{slug}', 'CategoryController@show')->name('frontend.category.show');
   
   Route::get('cart/{productId}', 'CartController@store')->name('frontend.cart.store');

});



