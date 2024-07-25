<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Route::post('db/login', [TopController::class, 'login']);   //index→g01　ログイン処理