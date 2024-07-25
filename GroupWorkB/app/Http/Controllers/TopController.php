<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    //index→g01遷移処理
    //ユーザがログインできるかをUsersテーブルから判定する
    //一覧表示画面に表示するデータをBooksテーブルから取得する
    public function Login(Request $req)
    {
        //Usersテーブルからnameが一致しているか確認する
        $loginUser = User::where($req-username)->where($req-password)->get();
        
        //一致していなければindex,一致していればg01に遷移する
        if($loginUser->isEmpty())
        {
            alert('ユーザ情報がありません');
            redirect('/');
        } else {
            //Booksテーブルから変数「records」に全件取得
            $dara = [
                'records' => Book::all();
            ]

            return view('layout.g01viewAll', $data);
        }

    }


}
