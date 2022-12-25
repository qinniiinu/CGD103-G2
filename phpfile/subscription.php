<?php
    session_start();
    // //跨域(正式開發不能這樣)
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
        require_once("../connectBooks.php");
        $sql = "SELECT v.*,o.*
        FROM vip_level v JOIN vip_orders o ON v.level_id=o.level_id
        where o.mem_id=:mem_id;";
        $msg="新增成功";
        $errMsg = "";
        $mem_id = $_SESSION['member']['mem_id'];
        $level = $pdo->prepare($sql); //先編譯好
        $level->bindValue(":mem_id", $mem_id); //代入資料
        $level->execute(); //執行之
        $levelRow = $level->fetch(PDO::FETCH_ASSOC);
        $_SESSION['subscribe']=$levelRow;
        echo json_encode($levelRow);
    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
        echo json_encode(["msg"=>$errMsg]);
    }
?>