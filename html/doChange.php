<?php

    $name = $_POST["name"];
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    # hostには「docker-compose.yml」で指定したコンテナ名を記載
    $dsn = "mysql:host=mysql;dbname=sample;";
    $db = new PDO($dsn, 'root', 'pass');

    ## oldPasswordの確認処理
    ## テーブルから読み出し処理
    $sql = "SELECT * FROM test where name=? and password=?";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute(array($name, $oldPassword));
        $rowCount = $stmt->rowCount();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    if(!$rowCount){
        echo "現パスワードが正しくありません。";
        exit;
    }

    ## テーブル更新処理
    $sql = "UPDATE test SET password='".$newPassword."' where name='".$name."'";
    $stmt = $db->prepare($sql);
    try{
        $flag = $stmt->execute();
    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <?php
    if($flag){
        echo "<h2>登録完了しました。</h2>";
    }else{
        echo "<h2>登録に失敗しました。</h2>";
    }
    ?>
    <a href="./index.php">TOPへ戻る</a>
</body>
</html>