<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;    //利用するモデルの読み込み
use App\Models\Comment; //利用するモデルの読み込み
use App\Models\User;    //利用するモデルの読み込み

class TopController extends Controller
{
    //index→g01遷移処理
    //ユーザがログインできるかをUsersテーブルから判定する
    //一覧表示画面に表示するデータをBooksテーブルから取得する
    public function login(Request $req)
    {
        //Usersテーブルからnameが一致しているか確認する
        $loginUser = User::where('name',$req->username)->where('password',$req->password)->first();
        
        //一致していなければindex,一致していればg01に遷移する
        if(is_null($loginUser))
        {
            //redirect('/');
            return view('index');
        } else {
            //ログインユーザ情報をセッションに保存する
            //Laravelのセッションの使い方（理解していない）https://qiita.com/yutaka_pg/items/f0103c3171b75146c28a
            //https://your-school.jp/laravel-session/631/
            $req->session()->put('username', $req->username);
            $req->session()->put('password', $req->password);
            $req->session()->put('role', $loginUser->role);

            //Booksテーブルから変数「records」に全件取得
            $data = [
                'records' => Book::all()
            ];

            return view('layout.g01_viewAll', $data);
        }

    }


}
