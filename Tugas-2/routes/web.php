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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('',function(){
//     return "yuhuu";
// })
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/sa', 'HomeController@role')->name('sa')->middleware('role:sa');
Route::get('/admin', 'HomeController@role')->name('admin')->middleware('role:sa;admin');
Route::get('/user', 'HomeController@role')->name('user')->middleware('role:sa;admin;user');
