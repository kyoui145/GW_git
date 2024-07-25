<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Route::post('db/login', [TopController::class, 'login']);   //index→g01　ログイン処理