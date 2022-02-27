<?php
    $name = $_POST["name"];
    $password = $_POST["password"];
    # hostには「docker-compose.yml」で指定したコンテナ名を記載
    $dsn = "mysql:host=mysql;dbname=sample;";
    $db = new PDO($dsn, 'root', 'pass');

    ## テーブルから読み出し処理
    $sql = "SELECT * FROM test where name='".$name."' and password='".$password."'";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>
<body>
    <h1>ログインユーザ</h1>
    <?php
        $row = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if($row){
            echo "ログイン成功！<br/>";
            echo $row["name"];
        }else{
            echo "該当のユーザは存在しません。";
        }
    ?>
</body>
</html>