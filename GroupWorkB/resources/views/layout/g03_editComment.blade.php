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
    <title>コメント編集画面</title>
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
    <h1>コメント編集画面</h1><br>
    <form action="/layout/editComments" method="post">
        @csrf
        <div><!-- おすすめ度はプルダウンで表示し、初期値は元のデータとする -->
            おすすめ度
            <select name="rating" value="rating">
            @foreach([0,1,2,3,4,5] as $value)
                @if ($value == $comment->rating)
                    <option value="{{ $value }}" selected>{{ $value }}</option>
                @else
                    <option value="{{ $value }}">{{ $value }}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div><!-- コメントはテキストエリア「、初期値は元のデータとする -->
            コメント<textarea name="comment" id="comment" rows="3" required>{{ $comment -> comment}}</textarea><br>
        </div>
            <input type="hidden" name="id" id="id" value="{{ $comment->id }}">    <!--Commentのidは非表示で送信する-->
            <input type="hidden" name="books_id" id="books_id" value="{{ $comment->books_id }}">    <!--Commentのbook_idは非表示で送信する-->
        <input type="submit" value="更新">
    </form>
    <a href="/layout/returnG02/{{ $comment->books_id }}">詳細画面に戻る</a>
</body>
</html>