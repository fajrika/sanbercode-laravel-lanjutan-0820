<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('App\Http\Controllers')->group(function(){
    Route::post('login','AuthController@login');
    Route::middleware(['role'])->group(function(){
        Route::post('logout','AuthController@logout');
    });
    Route::middleware(['role:Admin'])->group(function(){
        // Route::apiResource('role','RoleController');
        Route::apiResource('category','CategoryController');
        Route::apiResource('product','ProductController');
    });
    Route::middleware(['role:User'])->group(function(){
        Route::apiResource('order','OrderController');
        
    });
});
// Route::post('create-new-posts','Post\PostController@store');