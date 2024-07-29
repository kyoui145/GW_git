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
        .button-link {
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
    </style>
    <title>Document</title>
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
                <li class="nav-item">
                <a class="nav-link" >
                {{ $username }}<span class="sr-only">(current)</span></a
                >
                </li>
            </ul>
            <!-- 検索機能 -->
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <form class="form-inline mt-2 mt-md-0">
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
            <td><?php
                    // HTMLで画像を表示
                    if($record->book_url === "no data"){
                       echo '<img src="{{asset(/img/noimagePic}}"  alt="助けて">';
                    }else{
                        echo '<img src="' . htmlspecialchars($record->book_url) . '" alt="Image">';
                    }
                    
                ?>
            </td>
            <td>{{ $record->title }}</td>
            <td>{{ $record->author }}</td>
            <td></td><!--おすすめ度の平均の表示方法がわからないのでいったんなし-->
            <td><a href="{{ route('bookDetail', [
                'id' => $record->id, 
                'title' => $record->title,
                'author' => $record->author, 
                'publisher' => $record->publisher,
                'ISBN' => $record->ISBN,
                ]) }}">詳細</a></td>
            <!-- <td><a class="button-link" href="/layout/bookDetail/{{ $record->id }}">詳細</a></td> aタグはＧＥＴメソッドしか無理っぽい（idがＵＲＬに表示される）　　参考：https://note.com/liber_grp/n/n658fa8234519 -->
        </tr>
        @endforeach
    </table>
    <!--ログインユーザが総務部の場合、書籍登録ボタンを追加する-->
    @if ($role === 2)
        <br><a href="/layout/registTrans">新規登録</a>
    @endif
</body>
</html>