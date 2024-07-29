<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍データの削除</title>
    <style>
        body {
            background-color: #FFFCF1;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="form-container">
    <form action="/layout/g02_viewDetail" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$record->id}}" readonly><br>
        書籍名：<input id="title" type="text" name="title" value="{{$record->title}}"><br>
        出版社：<input id="publisher" type="text" name="publisher" value="{{$record->publisher}}" ><br>
        著者：<input id="author" type="text" name="author" value="{{$record->title}}" ><br>
        サムネイルURI：<input id="book_url" type="text" name="book_url" value="{{$record->title}}" ><br>
        <input type="submit" value="削除"><br>
        <a href="layout/g02_viewDetail">書籍詳細へ戻る</a>

    </form>
    </div>
</body>
</html>