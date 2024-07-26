<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Route::post('layout/login', [TopController::class, 'login']);   //index→g01　ログイン処理

Route::get('layout/bookDetail/{id}/{title}/{author}/{publisher}/{ISBN}', [TopController::class, 'bookDetail'])->name('bookDetail');   //g01→g02 詳細画面遷移処理

Route::get('layout/registTrans', [TopController::class, 'registTrans']);   //g01→g21 登録画面遷移処理

Route::post('layout/registConfirm', [TopController::class, 'registConfirm']);   //g21→g22 登録確認画面遷移処理

Route::post('layout/regist', [TopController::class, 'store']);   //g22→g01 登録処理

Route::get('layout/returnG01', [TopController::class, 'returnG01']);   //g01画面に戻る遷移処理

Route::get('layout/returnG21', [TopController::class, 'returnG21']);   //g21画面に戻る遷移処理