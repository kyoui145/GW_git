<?php
    //セッションから情報取得
    $username = session('username');
    $password = session('password');
    $role = session('role');
?><!DOCTYPE html>
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
    <pre style="font-size:30px">登録日時　　　　　Registered Date　　　　{{ $record->updated_at->format('Y-m-d') }}</pre ><hr>
    <pre style="font-size:30px">平均オススメ度　　ratingAVG　　　　　　　{{ $avgRating ? number_format($avgRating, 2) : 'ー' }}</pre ><hr>
    <br><br>
    <h1>コメント一覧</h1>

    @if($comments->isEmpty())
        <p>まだコメントはありません。</p>
    @else
    <!-- ソートオプション -->
    <form method="GET" action="{{ url()->current() }}">
        <label for="sort">ソート:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>オススメ度 高い順</option>
            <option value="rating_asc" {{ request('sort') == 'rating_asc' ? 'selected' : '' }}>オススメ度 低い順</option>
            <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>投稿日時 新しい順</option>
            <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>投稿日時 古い順</option>
        </select>
    </form>
    <table border="1">    
        <tr><th>オススメ度</th><th>コメント</th></tr><br>
    @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->rating }}</td>
            <td>{{ $comment->comment }}</td>
        </tr>
        @endforeach
    </table>
    @endif
    <!--ログインユーザが総務部の場合、書籍登録ボタンを追加する-->
    @if ($role === 2)
        <br><a href="/layout/returnG01">書籍削除（仮リンク、一覧表示へ戻る）</a><br>
    @endif

    <a href="/layout/returnG01">コメント投稿（仮リンク、一覧表示へ戻る）</a><br>
    <a href="/layout/returnG01">戻る</a>
</body>
</html>