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
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
     />

    <title>Document</title>
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
     <!-- Scripts -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('/js/book2.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    <style>
        body{width:800px; margin: 0 auto;background-color: #FFFCF1;
        }
        .btn-default {
            display: inline-block;
            background-color: #738581; /* ボタンの背景色 */
            color: white; /* 文字色 */
            padding: 2px 20px; /* パディング */
            border: none; /* ボーダーなし */
            border-radius: 5px; /* 角を丸く */
            text-align: center; /* 中央揃え */
            text-decoration: none; /* 下線なし */
            font-size: 16px; /* フォントサイズ */
        }
        /* 書籍詳細情報が、ボタンっぽく見えるCSS */
        .btn-default {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #94c4d4;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<form action="/layout/registConfirm" method="post">
    @csrf
        <h1>ISBN(‐含む13桁)が分かる場合は、入力してください</h1>
        <div>
            ISBN13：<input id="isbn" type="text" name="isbn" value="" autofocus>
            <button id="getBookInfo" class="btn btn-default">書籍情報取得</button>
        </div>

        <div>
            <p id="thumbnail"></p>
        </div>

        <div>
            書籍名：<input id="title" type="text" name="title" value="">
        </div>

        <div>
            出版社：<input id="publisher" type="text" name="publisher" value="" >
        </div>

        <div>
            著者：<input id="author" type="text" name="author" value="" >
        </div>
        <div>
            サムネイルURI：<input id="book_url" type="text" name="book_url" value="" >
        </div>
        <input type="submit" value="登録確認" crass="btn btn-primary">
</form>
<a href="/layout/returnG01">戻る</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <script>
    var noImagePicUrl = '{{ asset("img/noimagePic.png") }}';
</script>
</body>
</html>