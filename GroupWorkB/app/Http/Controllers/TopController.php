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
    
    //g01→g02遷移処理
    public function bookDetail($id)
    {
        //Booksテーブルから変数「records」にidを条件1件取得
        $data = [
            'records' => Book::where('id',$id)->first()
        ];


        return view('layout.g02_viewDetail');
    }


    //g01→g21遷移処理
    public function registTrans(Request $req)
    {
        return view('layout.g21_addBook');
    }

    //g21→g22遷移処理
    public function registConfirm(Request $req)
    {
        //画面から登録用のデータを取得する
        $data = [
            'isbn' => $req->isbn,               //ISBN番号      Books:isbn
            'picture' => $req->picture,         //画像URL       Books:book_url
            'bookName' => $req->bookName,       //書籍名        Books:title
            'authorName' => $req->authorName,   //著者名        Books:authoe
            'publisher' => $req->publisher      //出版社        Books:publisher
        ];

        return view('layout.g22_addBookConf', $data);
    }

    //　""→g01 画面遷移処理(戻る)
    public function returnG01(Request $req)
    {
        //Booksテーブルから変数「records」に全件取得
        $data = [
            'records' => Book::all()
        ];

        return view('layout.g01_viewAll', $data);
    }
    
    //　""→g21 画面遷移処理(戻る)
    public function returnG21(Request $req)
    {
        return view('layout.g21_addBook');
    }

    //g22→g01 登録処理
    public function store(Request $req){
        $book = new Book(); //Booksモデルのインスタンスを作成

        //フォームのデータをプロパティに代入
        //3項演算子でnull対策
        $book->title = $req->bookName != "" ? $req->bookName;
        $book->author = $req->authorName;
        $book->publisher = $req->publisher;
        $book->ISBN = $req->isbn;
        $book->book_url = $req->picture;

        //テーブルにデータをINSERT
        $book -> save();

        //Booksテーブルから変数「records」に全件取得
        $data = [
            'records' => Book::all()
        ];

        return view('layout.g01_viewAll', $data);

    }

}
