<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍詳細画面</title>
    <style>
        tr {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>書籍詳細画面</h1>
    <!-- 後で適切な画像に差し替え↓ -->
    <img src="{{ asset('img/noimagePic.png') }}" alt="NOIMAGE画像" >
    <pre style="font-size:30px">書籍名　　　　　　title　　　　　　　　　{{ $record->title }}</pre ><hr>
    <pre style="font-size:30px">著者名　　　　　　author　　　　　　 　　{{ $record->author }}</pre ><hr>
    <pre style="font-size:30px">出版社　　　　　　publisher　　　　　　　{{ $record->publisher }}</pre ><hr>
    <pre style="font-size:30px">ISBNコード　　　　ISBN　　　　　　　　 　{{ $record->ISBN }}</pre ><hr>
    <pre style="font-size:30px">登録日時　　　　　Registered Date　　　　{{ $record->updated_at }}</pre ><hr>
    <pre style="font-size:30px">平均オススメ度　　ratingAVG　　　　　　　(ここに平均おススメ度を表示)</pre ><hr>
    <br><br>
    <h1>コメント一覧</h1>
    <table border="1">
    <tr><th>オススメ度</th><th>コメント</th></tr><br>
    <tr>
        <td>オススメ度はここ</td>
        <td>コメントはここ</td>
    </tr>
</table>
<a href="/views/layout/g01_viewAll">戻る</a>
</body>
</html>