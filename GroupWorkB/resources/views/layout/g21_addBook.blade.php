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
    <form action="/layout/registConfirm" method="post">
        @csrf
        ISBNコード入力<input type="text" name="isbn">
        <button>ISBN検索</button><br>
        <input type="hidden" name="picture"><!-- 画像表示はしないが、ISBN検索をした場合画像のパラメータは取得する（g22では表示する） -->
        <table>
            <tr><th>書籍名入力</th><td><input type="text" name="bookName"></td></tr>
            <tr><th>著者名入力</th><td><input type="text" name="authorName"></td></tr>
            <tr><th>出版社入力</th><td><input type="text" name="publisher"></td></tr>
        </table>
        <input type="submit" value="登録確認">
    </form>
    <a href="/layout/returnG01">戻る</a>
</body>
</html>