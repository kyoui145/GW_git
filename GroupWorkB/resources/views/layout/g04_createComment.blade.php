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
    <title>コメント新規投稿画面</title>
    
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
     <script src="{{ asset('/js/popsinko.js') }}" defer></script>
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
<h1>コメント新規投稿画面</h1><br>
    <form action="/layout/createComments" method="post">
        @csrf
        <div>
            <!-- オススメ度のドロップダウン（プルダウン） -->
            <label for="rating" required>オススメ度</label>
            <select name="rating" id="rating">
                <option value="1">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div>
            <label for="comment">コメント</label>
            <textarea name="comment" id="comment" rows="3" required placeholder="コメントを入力してください"></textarea>
        </div>
        <br>
        <input type="hidden" name="books_id" id="books_id" value="{{ $book->id }}">
        <input type="hidden" name="users_id" id="users_id" value="{{ $userid }}"> <!-- セッションから取得する場合 -->
        <h2>上記のコメントを新規投稿しますか？</h2>
        <input type="submit" value="コメント投稿" class="btn btn-primary" id="btn4">
    </form>
    <a href="/layout/returnG02/{{ $book->id }}">詳細画面に戻る</a>
</body>
</html>
