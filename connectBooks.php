<?php
    $dbname = "tibamefe_cgd103g2";
    $user = "root";
    $password = "cgd103_25";
    $port = "3306";
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";

    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_CASE=>PDO::CASE_NATURAL);

    $pdo = new PDO($dsn, $user, $password, $options);
?>