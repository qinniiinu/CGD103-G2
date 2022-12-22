<?php

session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
try {
  
        require_once("../connectBooks.php");
        $sql = "SELECT s.style_name from member m
        JOIN style s on(m.style_id=s.style_id)
        where m.mem_id=:mem_id;";

        $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
        $member = $pdo->prepare($sql); //先編譯好
        $member->bindValue(":mem_id", $member_id); //代入資料
        $member->execute(); //執行之
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        echo json_encode($memberRow);
    
  
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>

