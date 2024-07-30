<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       body {
            background-color: #FFFCF1;
        }
        .image-container {
            display: flex;
            justify-content: center; /* 左右中央揃え */
            width: 100%;
        }
    </style>
    <title>GroupWorkB</title>
</head>
<body>
    <div class="image-container">
        <img src="img/books.webp" alt="本の画像">
    </div>
    <!--ログインボタンを押すとログイン処理を実施し、成功すると書籍一覧画面に遷移する-->
    <div style="width: 300px;margin:10px auto 0;padding: 20px;background-color: #ffffff;border: 1px solid #ccc;border-radius: 5px;">
        <form action="/layout/login" method="post" style="font-size: 24px;text-align: center;">
            @csrf
            <p　style="text-align: center;">図書館管理システム B</p>
            ユーザ名 ：<input type="password" name="username" style=" width:30%;padding: 10px;margin-bottom: 10px;border: 1px solid #ccc;border-radius: 4px;" required><br>
            パスワード：<input type="password" name="password" style=" width: 30%;padding: 10px;margin-bottom: 10px;border: 1px solid #ccc;border-radius: 4px;" required><br>
            <input type="submit" value="ログイン" style="width: 30%;padding: 10px;background-color: #808080;color: #ffffff;border: none;border-radius: 4px;cursor: pointer;">
            <!-- 時間があれば追加機能で作る -->
            <!--<a href="">新規登録</a>-->
            <!--<a href="">パスワード再設定</a>-->
        </form>
    </div>  
</body>
</html>