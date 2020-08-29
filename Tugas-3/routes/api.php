<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('peminjaman', "PeminjamanController@index");
    Route::get('peminjaman/{id}', "PeminjamanController@show");

    if (auth()->user()['role'] == 1) {
        Route::resource('mahasiswa', "MahasiswaController");
        Route::resource('buku', "BukuController");
        Route::get("user", "UserController");

        Route::put('peminjaman/{peminjaman}', "PeminjamanController@update");
        Route::delete('peminjaman/{peminjaman}', "PeminjamanController@destroy");
    } elseif (auth()->user()['role'] == 2) {
        Route::post('peminjaman', "PeminjamanController@store");
    }
});
Route::namespace("Auth")->group(function () {
    Route::post('register', 'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController');
});
