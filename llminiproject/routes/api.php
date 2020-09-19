<?php
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function(){
    
    Route::get('role','RoleController@index');
    Route::post('login','AuthController@login');
    Route::post('register','AuthController@register');
    Route::middleware(['role'])->group(function(){
        Route::post('logout','AuthController@logout');
        Route::get('chat','ChatController@index');
        Route::post('chat','ChatController@store');
    });
    Route::middleware(['role:Admin'])->group(function(){
        Route::apiResource('category','CategoryController');
        Route::apiResource('product','ProductController');
    });
    Route::middleware(['role:User'])->group(function(){
        Route::apiResource('order','OrderController');
        Route::post('snapMidtrans','MidtransController@snap');
    });
});
