<?php
    $name = $_POST["name"];
    $password = $_POST["password"];
    # hostには「docker-compose.yml」で指定したコンテナ名を記載
    $dsn = "mysql:host=mysql;dbname=sample;";
    $db = new PDO($dsn, 'root', 'pass');

    ## テーブルから読み出し処理
    $sql = "SELECT * FROM test where name=? and password=?";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute(array($name, $password));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>
<body>
    <h1>会員メニュー</h1>
    <?php
        if($result){
            if($result[0]["name"] == "admin"){
                $sql = "SELECT * FROM flag where name='".$result[0]['name']."'";
                $stmt = $db->prepare($sql);
                try {
                    $stmt->execute();
                    $flag = $stmt->fetch();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    exit;
                }
                echo "<h1>Congratulation!</h1>";
                echo "<hr>";
                echo "<h2>".$flag["flag"]."</h2>";
            }else{
                echo "<h1>Nice try!</h1>";
            }
            echo "<a href='./change.php?id=".$result[0]["id"]."'>パスワード変更はこちら</a><br>";
            echo "<a href='./logout.php'>ログアウトはこちら</a>";
        }else{
            echo "ログイン失敗<br>";
            echo "<a href='./index.php'>topへ戻る</a>";
        }
    ?>
    

</body>
</html>