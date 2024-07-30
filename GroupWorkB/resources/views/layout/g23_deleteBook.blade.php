<?php
    //セッションから情報取得
    $userid = session('userid');
    $username = session('username');
    $password = session('password');
    $role = session('role');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍データの削除</title>
    <style>
        body {
            background-color: #FFFCF1;
        }
    </style>
</head>
<body>
    <form action="/layout/bookbel" method="post">
        @csrf
        <input type="text" name="id" value="{{$book->id}}" readonly><br>
        書籍名：<input id="title" type="text" name="title" value="{{$book->title}}"><br>
        出版社：<input id="publisher" type="text" name="publisher" value="{{$book->publisher}}" ><br>
        著者：<input id="author" type="text" name="author" value="{{$book->author}}" ><br>
        サムネイルURI：<input id="book_url" type="text" name="book_url" value="{{$book->book_url}}" ><br>
        <input type="submit" value="削除"><br>
    </form>
    <a href="/layout/returnG02/{{ $book->id }}">詳細画面に戻る</a>
</body>
</html>