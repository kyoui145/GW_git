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
    ISBNコード入力<input type="text">
    <button>ISBN検索</button><br>
    <table>
        <tr><th>書籍名入力</th><td><input type="text" name="kari1"></td></tr>
        <tr><th>著者名入力</th><td><input type="text" name="kari2"></td></tr>
        <tr><th>出版社入力</th><td><input type="text" name="kari3"></td></tr>
    </table>
    <a href="">登録確認</a>
    <a href="/layout/returnG01">戻る</a>
</body>
</html>