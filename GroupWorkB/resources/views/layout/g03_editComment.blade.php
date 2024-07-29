<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメント編集画面</title>
</head>
<body>
    <h1>コメント編集画面</h1>
    <form action="/layout/g04_createComment" method="post">
        @csrf
            <input type="hidden" name="id" value="{{record -> id}}"><br>
            <input type="hidden" name="books_id" value="{{record -> books_id}}"><br>
            <input type="hidden" name="users_id" value="{{record -> users_id}}"><br>
        <div>
            <label for="rating">オススメ度</label>
            <input type="text" name="rating" id="rating">
        </div>
            コメント<textarea name="comment" rows="3" required>{{ $record -> comment}}</textarea><br>
            <input type="submit" value="投稿" class="btn btn-primary">
    </form>
</body>
</html>