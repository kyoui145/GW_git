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
        /* 詳細が、ボタンっぽく見えるCSS */
        .button-link {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #83866C;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        
        /* テーブルを、画面中央に */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* ビューポートの高さ */
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table td, table th {
            border: 1px solid black;
            padding: 10px;
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

    <table border="1" class="table-container">
        <tr><th>画像</th><th>書籍名</th><th>著者</th><th>おすすめ度</th><th><!--詳細ボタンカラム--></th></tr>
        @foreach($records as $record)
        <tr>
            <td><!--画像-->
                <?php
                    // HTMLで画像を表示
                    if($record->book_url === "no data"){
                        echo '<img src="' . asset('img/noimagePic.png') . '" alt="NOIMAGE画像">';
                    }else{
                        echo '<img src="' . htmlspecialchars($record->book_url) . '" alt="Image">';
                    }
                    
                ?>
            </td>
            <td>{{ $record->title }}</td><!--書籍名-->
            <td>{{ $record->author }}</td><!--著者-->
            <td><!--おすすめ度（平均値）-->
                <?php
                    // おすすめ平均値を出すためのphp処理
                    $comments = $record->comments;
                    $AVGrating = 0;
                    if($comments->isEmpty()){
                        $AVGrating = 0;
                    }else{
                        $AVGrating = number_format($comments->avg('rating'), 2);    //小数点第2位まで表示
                    }
                ?>
                {{ $AVGrating }}
            </td>
            <td><a href="{{ route('bookDetail', [
                'id' => $record->id, 
                'title' => $record->title,
                'author' => $record->author, 
                'publisher' => $record->publisher,
                'ISBN' => $record->ISBN,
                ]) }}"
                class="button-link">詳細</a></td>
            <!-- <td><a class="button-link" href="/layout/bookDetail/{{ $record->id }}">詳細</a></td> aタグはＧＥＴメソッドしか無理っぽい（idがＵＲＬに表示される）　　参考：https://note.com/liber_grp/n/n658fa8234519 -->
        </tr>
        @endforeach
    </table>
    <!--ログインユーザが総務部の場合、書籍登録ボタンを追加する
    @if ($role === 2)
        <br><a href="/layout/registTrans" class="button-link2">新規登録</a>
    @endif　ヘッダーに入れたのでコメントアウト-->
</body>
</html>