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
    <h1>アプリ名</h1>
    <!-- ↓セッションの確認。そのうち消す -->
     <p>{{ $username }}</p>
     <p>{{ $password }}</p>
     <p>{{ $role }}</p>
     <!-- ↑セッションの確認。そのうち消す -->


    <table border="1">
        <tr><th>画像</th><th>書籍名</th><th>著者</th><th>おすすめ度</th><th><!--詳細ボタンカラム--></th></tr>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->book_url }}</td>
            <td>{{ $record->title }}</td>
            <td>{{ $record->author }}</td>
            <td></td><!--おすすめ度の平均の表示方法がわからないのでいったんなし-->
            <td><a href="">詳細</a></td> <!--（仮決め）$record->idから書籍詳細画面に遷移する-->
        </tr>
        @endforeach
    </table>
    <!--ログインユーザが総務部の場合、書籍登録ボタンを追加する-->
    @if ($role === 2)
        <br><a href="/layout/registTrans">新規登録</a>
    @endif
</body>
</html>