<?php
    $id=$_GET["id"];
    # hostには「docker-compose.yml」で指定したコンテナ名を記載
    $dsn = "mysql:host=mysql;dbname=sample;";
    $db = new PDO($dsn, 'root', 'pass');

    ## テーブルから読み出し処理
    $sql = "SELECT * FROM test where id=?";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute(array($id));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
</head>
<body>
    <form action="./doChange.php" name="form1" method="POST">
        <span>ユーザID：<label><?php echo $result[0]['id'] ?></label></span><br>
        <span>ユーザ名：<label><?php echo $result[0]['name'] ?></label><input type="hidden" name="name" value="<?php echo $result[0]['name'] ?>"></span><br>
        <span>現パスワード：<input type="text" name="oldPassword"></span><br>
        <span>新パスワード：<input type="text" name="newPassword"></span>
        <hr>
        <button javascript:onclick="submit();">change</button>
    </form>
</body>
</html>