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
    <form action="/layout/g02_viewDetail" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$record->id}}" readonly><br>
        書籍名：<input id="title" type="text" name="title" value="{{$record->title}}"><br>
        出版社：<input id="publisher" type="text" name="publisher" value="{{$record->publisher}}" ><br>
        著者：<input id="author" type="text" name="author" value="{{$record->title}}" ><br>
        サムネイルURI：<input id="book_url" type="text" name="book_url" value="{{$record->title}}" ><br>
        <input type="submit" value="削除"><br>
        <a href="layout/g02_viewDetail">書籍詳細へ戻る</a>

    </form>
</body>
</html>