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
        Route::resource('category', 'CategoryController')
        ->except(['show', 'edit', 'create']);//cách viết nhanh hơn so với cách viết route như bên trên
        
        Route::resource('product', 'ProductController')
        ->except(['show', 'edit', 'create']);//cách viết nhanh hơn so với cách viết route như bên trên
    });
        
});
