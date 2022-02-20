<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="./result.php" name="form1" method="POST">
        <span>ユーザID：<input type="text" name="name"></span><br>
        <span>パスワード：<input type="text" name="password"></span>
        <hr>
        <button javascript:onclick="submit();">login</button>
    </form>
    <a href="./new.php">新規登録はこちら</a>
    <a href="./resetDB.php">DBリセットはこちら</a>
</body>
</html>