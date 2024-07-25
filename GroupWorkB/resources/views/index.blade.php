<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GroupWorkB</title>
</head>
<body>
    <!--ログインボタンを押すとログイン処理を実施し、成功すると書籍一覧画面に遷移する-->
    <form action="/db/login" method="post">
        ユーザ名：<input type="text" name="username"><br>
        パスワード：<input type="text" name="password"><br>
        <input type="submit" value="ログイン">
        <!-- 時間があれば追加機能で作る -->
        <!--<a href="">新規登録</a>-->
        <!--<a href="">パスワード再設定</a>-->
    </form>
</body>
</html>