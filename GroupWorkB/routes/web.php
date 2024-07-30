<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Route::post('layout/login', [TopController::class, 'login']);   //index→g01　ログイン処理
Route::get('layout/login', [TopController::class, 'returnG01']);   //index→g01　ログイン処理ページネーション用

Route::get('layout/bookDetail/{id}/{title}/{author}/{publisher}/{ISBN}', [TopController::class, 'bookDetail'])->name('bookDetail');   //g01→g02 詳細画面遷移処理

Route::get('layout/registTrans', [TopController::class, 'registTrans']);   //g01→g21 登録画面遷移処理

Route::post('layout/registConfirm', [TopController::class, 'registConfirm']);   //g21→g22 登録確認画面遷移処理

Route::post('layout/regist', [TopController::class, 'store']);   //g22→g01 登録処理

Route::get('layout/returnG01', [TopController::class, 'returnG01']);   //g01画面に戻る遷移処理

Route::get('layout/returnG21', [TopController::class, 'returnG21']);   //g21画面に戻る遷移処理

Route::get('layout/g03_editComment/{id}', [TopController::class, 'g03_editComment']);   //g02→g03 コメント編集画面遷移処理
Route::post('layout/editComments', [TopController::class, 'editComments']);   //g02→g03 コメント編集画面遷移処理

Route::get('layout/g04_createComment/{id}', [TopController::class, 'g04_createComment']);   //g02→g04 コメント新規登録画面遷移処理
Route::post('layout/createComments', [TopController::class, 'createComments']);   //g04→g02 コメント編集画面遷移処理
Route::get('layout/g02_viewDetail/{id}', [TopController::class, 'g02_viewDetail']);  // 書籍詳細画面

Route::get('layout/g23_deleteBook/{id}', [TopController::class, 'g23_deleteBook']);//g02→g23 書籍削除画面遷移処理
Route::post('layout/bookbel', [TopController::class, 'bookbel']);