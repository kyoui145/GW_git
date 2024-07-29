<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメント編集画面</title>
    <style>
        body {
            background-color: #FFFCF1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>コメント編集画面</h1>
    <div class="form-container">
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
    </div>
</body>
</html>