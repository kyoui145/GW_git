<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Route::post('layout/login', [TopController::class, 'login']);   //index→g01　ログイン処理

Route::get('layout/registTrans', [TopController::class, 'registTrans']);   //g01→g02 登録画面遷移処理

Route::get('layout/returnG01', [TopController::class, 'returnG01']);   //g01画面に戻る遷移処理