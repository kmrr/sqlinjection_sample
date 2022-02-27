<?php
    $name = $_POST["name"];
    $password = $_POST["password"];
    # hostには「docker-compose.yml」で指定したコンテナ名を記載
    $dsn = "mysql:host=mysql;dbname=sample;";
    $db = new PDO($dsn, 'root', 'pass');

    ##テーブル存在確認
    $sql = "SELECT COUNT(*) FROM test WHERE name=?"; 
    $stmt = $db->prepare($sql);
    try{
        $stmt->execute(array($name));
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count>0){
        echo "<h1>ユーザ名が重複しています。登録しなおしてください。</h1>";
        exit;
    }

    ## テーブル更新処理
    $sql = "INSERT INTO test(name, password) VALUES(?, ?)"; 
    $stmt = $db->prepare($sql);
    try{
        $flag = $stmt->execute(array($name, $password));
    }catch(PDOException $e){
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