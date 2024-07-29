<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメント編集画面</title>
    <style>
        body {
            background-color: #FFFCF1;
        }
    </style>
</head>
<body>
    <h1>コメント編集画面</h1>
    <form action="/layout/g04_createComment" method="post">
        @csrf
        <div>
            <label for="rating">オススメ度</label>
            <input type="text" name="rating" id="rating" value="{{ $comment->rating }}">
        </div>
        
        <div>
            コメント<textarea name="comment" rows="3" required>{{ $comment -> comment}}</textarea><br>
            </div>
        
            <input type="submit" value="投稿" class="btn btn-primary">
    </form>
</body>
</html>