<?php

use Illuminate\Support\Facades\Route;

// Route::view('/{any}','app')->where('any','.*'); 

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::view('/{any}', 'app')->where('any', '^(?!api).*$');
