<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>アプリ名</h1>
    <table border="1">
        <tr><th>画像</th><th>書籍名</th><th>著者</th><th>画像</th><th><!--詳細ボタンカラム--></th></tr>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->book_url }}</td>
            <td>{{ $record->title }}</td>
            <td>{{ $record->author }}</td>
            <td>{{ $record->rating-AVG }}</td>
            <td><button onclick="locaton.href='./index.html'"></td> <!--（仮決め）$record->idから書籍詳細画面に遷移する-->
        </tr>
        @endforeach
<!--ログインユーザが総務部の場合、書籍登録ボタンを追加する-->
    </table>
</body>
</html>