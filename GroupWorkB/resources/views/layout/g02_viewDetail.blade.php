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
    <title>書籍詳細画面</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
     />

    <style>
        body {
            background-color: #FFFCF1;
        }
        tr {
            font-size: 20px;
        }
        .image-container {
            display: flex;
            justify-content: center; /* 左右中央揃え */
            width: 100%;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- ヘッダー -->
    <header>
        <!-- 追加コード：ナビゲーションバーの外枠を実装する -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <!-- 追加コード：ブランドとメニュー開閉ボタンを実装する -->
            <a class="navbar-brand" >図書館管理システム B</a>
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- 追加コード：ナビゲーションと登録ボタンを実装する -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                @if ($role === 2)
                    <li class="nav-item">
                        <a class="nav-link button-link2" href="/layout/registTrans">新規登録</a>
                    </li>
                @endif
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <span class="navbar-text mr-2">{{ $username }}</span>
                <a href="/">ログアウト</a>
            </form>
            </div>
        </nav>
    </header>
    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"
            ></script>
            <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"
            ></script>
            <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"
            >
        </script>
    <!-- ヘッダー(終わり) -->
    <h1>ダミー</h1>

    <h1>書籍詳細画面</h1><br>
    <!-- 後で適切な画像に差し替え↓ -->
    <div class="image-container">
    <?php
                    // HTMLで画像を表示
                    if($record->book_url === "no data"){
                        echo '<img src="' . asset('img/noimagePic.png') . '" alt="NOIMAGE画像">';
                    }else{
                        echo '<img src="' . htmlspecialchars($record->book_url) . '" alt="Image">';
                    }
                    
                ?>
    </div>
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
        <tr><th>オススメ度</th><th>コメント</th><th></th></tr><br>
    @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->rating }}</td>
            <td>{{ $comment->comment }}</td>
            @if ($comment->users_id == $userid)  <!--コメントは自分で入力したもののみ、修正できる-->
            <td><a class="button-link" href="/layout/g03_editComment/{{ $comment->id }}">編集</a></td>
            @else
            <td></td>
            @endif
        </tr>
    @endforeach
    </table>
    @endif
    <!--ログインユーザが総務部の場合、書籍削除ボタンを追加する-->
    @if ($role === 2)
        <br><a href="/layout/g23_deleteBook/{{$record->id}}">書籍削除</a><br>
    @endif

    <a href="/layout/g04_createComment/{{ $record->id }}">コメント投稿</a><br>

    <a href="/layout/returnG01">戻る</a>
</body>
</html>