<?php
    //セッションから情報取得
    $username = session('username');
    $password = session('password');
    $role = session('role');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/layout/regist" method="post">
        @csrf
        <img src="{{ $picture }}" alt=""><br>
        <table>
            <tr><th>ISBN番号</th><td>{{ $isbn }}</td></tr>
            <tr><th>書籍名：</th><td>{{ $bookName }}</td></tr>
            <tr><th>著者名：</th><td>{{ $authorName }}</td></tr>
            <tr><th>出版社：</th><td>{{ $publisher }}</td></tr>
        </table>
        <br>
        <!--↓はデータをBOOkSテーブルにデータを登録する用（hiddenなので非表示）
        　　　larabelはこれがないと登録できない？？？？？-->
        <input type="hidden" name="bookName" id="bookName" value="{{ $bookName }}" >
        <input type="hidden" name="authorName" id="authorName" value="{{ $authorName }}">
        <input type="hidden" name="publisher" id="publisher" value="{{ $publisher }}">
        <input type="hidden" name="isbn" id="isbn" value="{{ $isbn }}">
        <input type="hidden" name="picture" id="picture" value="{{ $picture }}">
        <!--↑はデータをBOOkSテーブルにデータを登録する用（hiddenなので非表示）-->
        <h2>上記の情報を登録しますか？</h2>
        <input type="submit" value="登録">
    </form>
    <a href="/layout/returnG21">戻る</a>
</body>
</html>