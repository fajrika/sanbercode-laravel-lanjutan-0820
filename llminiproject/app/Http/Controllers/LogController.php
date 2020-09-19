<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogController extends Controller
{
    public function index(){
        $myfile = fopen("/storage/logs/laravel.log", "r") or die("Unable to open file!");
    }
}
