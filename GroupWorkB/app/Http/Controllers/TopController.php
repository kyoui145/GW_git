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
            $req->session()->put('userid', $loginUser->id);
            $req->session()->put('username', $req->username);
            $req->session()->put('password', $req->password);
            $req->session()->put('role', $loginUser->role);

            //Booksテーブルから変数「records」に全件取得
            $data = [
                //'records' => Book::all()
                //ページ4個毎
                'records' => Book::paginate(2)
            ];

            return view('layout.g01_viewAll', $data);
        }

    }
    
    //g01→g02遷移処理
    public function bookDetail($id,$title,$author,$publisher,$ISBN)
    {
        //Booksテーブルから変数「records」にidを条件1件取得
        $record = Book::where('id', $id)
                        ->where('title', $title)
                        ->where('author', $author)
                        ->where('publisher', $publisher)
                        ->where('ISBN', $ISBN)
                        //->where('created_at', $created_at)
                        ->first();
        // 本に関連するコメントを取得
        $comments = $record->comments;
         // ソート条件を取得
    $sort = request('sort');
    
    // コメントをソート
    switch ($sort) {
        case 'rating_desc':
            $comments = $record->comments()->orderBy('rating', 'desc')->get();
            break;
        case 'rating_asc':
            $comments = $record->comments()->orderBy('rating', 'asc')->get();
            break;
        case 'date_desc':
            $comments = $record->comments()->orderBy('created_at', 'desc')->get();
            break;
        case 'date_asc':
            $comments = $record->comments()->orderBy('created_at', 'asc')->get();
            break;
        default:
            $comments = $record->comments()->get();
            break;
    }

        // 平均オススメ度を計算
    $avgRating = $comments->avg('rating');

        return view('layout.g02_viewDetail', [
            'record'=>$record,
            'comments' => $comments,
            'avgRating' => $avgRating,
        ]);

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
            'book_url' => $req->book_url,         //画像URL       Books:book_url
            'title' => $req->title,       //書籍名        Books:title
            'author' => $req->author,   //著者名        Books:authoe
            'publisher' => $req->publisher      //出版社        Books:publisher
        ];

        return view('layout.g22_addBookConf', $data);
    }

    //　""→g01 画面遷移処理(戻る)
    public function returnG01(Request $req)
    {
        //Booksテーブルから変数「records」に全件取得
        $data = [
            //'records' => Book::all()
             //ページ4個毎
             'records' => Book::paginate(2)
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
    $book->title = $req->title != "" ? $req->title : "no data";
    $book->author = $req->author != "" ? $req->author : "no data";
    $book->publisher = $req->publisher != "" ? $req->publisher : "no data";
    $book->ISBN = $req->isbn != "" ? $req->isbn : 1111;
    $book->book_url = $req->book_url != "" ? $req->book_url : "no data";

    //テーブルにデータをINSERT
    $book -> save();

    //Booksテーブルから変数「records」に全件取得
    $data = [
        //'records' => Book::all()
         //ページ4個毎
         'records' => Book::paginate(2)
    ];

    return view('layout.g01_viewAll', $data);

    }


    //g02→g03遷移処理
    public function g03_editComment($id)
    {
        //Commentsテーブルから変数「comment」に１件取得
        $data = [
            'comment' => Comment::where('id', $id)->first()
        ];

        return view('layout.g03_editComment', $data);
    }

    //g03→02 コメント編集処理
    public function editComments(Request $req)
    {
        //更新対象のレコードを取得
        $comment = Comment::find($req->id);
        //フォームのデータをモデルに代入（上書き）
        $comment->rating = $req->rating;
        $comment->comment = $req->comment;
        //モデルのデータをテーブルに上書き
        $comment->save();

        //g02画面表示処理（ほぼg01→g02遷移処理）
        $record = Book::where('id', $req->books_id)->first();
        $comments = $record->comments;

         // ソート条件を取得
        $sort = request('sort');

        // コメントをソート
        switch ($sort) {
            case 'rating_desc':
                $comments = $record->comments()->orderBy('rating', 'desc')->get();
                break;
            case 'rating_asc':
                $comments = $record->comments()->orderBy('rating', 'asc')->get();
                break;
            case 'date_desc':
                $comments = $record->comments()->orderBy('created_at', 'desc')->get();
                break;
            case 'date_asc':
                $comments = $record->comments()->orderBy('created_at', 'asc')->get();
                break;
            default:
                $comments = $record->comments()->get();
                break;
        }

            // 平均オススメ度を計算
        $avgRating = $comments->avg('rating');
            
        return view('layout.g02_viewDetail', [
            'record'=>$record,
            'comments' => $comments,
            'avgRating' => $avgRating,
        ]);
    }


 //g02→g04　コメント新規登録処理
public function postNewComment(Request $req)
{
    return view('layout.g04_createComment');
}

//g02→g23 書籍削除画面移行
public function g23_deleteBook($id)
    {
        //Commentsテーブルから変数「comment」に１件取得
        $data = [
            'book' => Book::where('id', $id)->first()
        ];

        return view('layout.g23_deleteBook', $data);
    }

//g23→g01　データベース削除処理
public function delete(Request $req){
    $article->Article::find($req->id);
    $article->delete();
    $data = [
        
        'isbn' => $req->isbn,               //ISBN番号      Books:isbn
        'book_url' => $req->book_url,         //画像URL       Books:book_url
        'title' => $req->title,       //書籍名        Books:title
        'author' => $req->author,   //著者名        Books:authoe
        'publisher' => $req->publisher      //出版社        Books:publisher
    ];

    return view('layout.g23_deleteBook',$data);
}
}