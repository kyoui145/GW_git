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
    </style>
</head>
<body>
<h1>コメント編集画面</h1>
    <div class="form-container">
    <form action="/layout/g04_createComment" method="post">
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
        <input type="submit" value="投稿" class="btn btn-primary">
    </form>
    </div>
</body>
</html>
