<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api')->middleware(['api'])->prefix('v1')->group(function ($router) {
    Route::post('login', 'AuthController@login');
    Route::delete('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    // Route::prefix('category')->middleware(['token.valid'])->group(function() {
    //     Route::get('/', 'CategoryController@index');
    //     Route::post('/', 'CategoryController@store');
    //     Route::post('update/{id}', 'CategoryController@update');
    // });

    Route::middleware(['token.valid'])->group(function() {
        Route::resource('category', 'CategoryController')//cách viết nhanh hơn so với cách viết route như bên trên
        ->except(['show', 'edit', 'create']);//tạo tự động ra các route khác ngoại trừ những cái route ở trong except sẽ không dc tạo
        
        Route::resource('product', 'ProductController')//cách viết nhanh hơn so với cách viết route như bên trên
        ->except(['show', 'edit', 'create']);

        Route::resource('slider', 'SliderController')//cách viết nhanh hơn so với cách viết route như bên trên
        ->except(['show', 'edit', 'create']);

        Route::resource('order', 'OrderController')
        ->except(['edit', 'create']);//cách viết nhanh hơn so với cách viết route như bên trên

        Route::post('upload', 'UploadController@upload')->name('upload');
    });
        
});
