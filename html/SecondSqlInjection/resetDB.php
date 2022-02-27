<?php
    $name = $_POST["name"];
    $password = $_POST["password"];
    # hostには「docker-compose.yml」で指定したコンテナ名を記載
    $dsn = "mysql:host=mysql;dbname=sample;";
    $db = new PDO($dsn, 'root', 'pass');

    $sql="DROP DATABASE IF EXISTS sample;";
    $stmt = $db->prepare($sql);
    try{
        $result = $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
    $sql="CREATE DATABASE sample;";
    $db->query($sql);

    $sql="USE sample;";
    $db->query($sql);

    $sql="DROP TABLE IF EXISTS test;";
    $stmt = $db->prepare($sql);
    try{
        $result = $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }

    $sql="CREATE TABLE test(id int AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), password VARCHAR(255));";
    $stmt = $db->prepare($sql);
    try{
        $result = $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }

    $sql="INSERT INTO test (name, password) VALUES (?, ?);";
    $stmt = $db->prepare($sql);
    try{
        $result = $stmt->execute(array('admin', 'ni3ehzhVKPaP'));
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }

    $sql="CREATE TABLE flag(id int AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), flag VARCHAR(255));";
    $stmt = $db->prepare($sql);
    try{
        $result = $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }

    $sql="INSERT INTO flag(name, flag) VALUES(?, ?);";
    $stmt = $db->prepare($sql);
    try{
        $result = $stmt->execute(array('admin', 'flag{s3c0und_0rd3r_sql1nj3ct10n}'));
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }

    $sql="INSERT INTO flag(name, flag) VALUES(?, ?);";
    $stmt = $db->prepare($sql);
    try{
        $result = $stmt->execute(array('admin2', 'flag{s3rcr3t_fl@g}'));
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }

    header('Location: http://localhost/SqlInjection/index.php');
?>