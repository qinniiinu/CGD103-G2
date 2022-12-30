<?php
 session_start();
 $Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*"; 
 // 如果$origin为*号时,则跨域访问不支持cookie的发送
 header("Access-Control-Allow-Origin: {$Origin}");           
 // 允许请求的类型
 header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    
 // 跨域访问是否允许带cookie的发送
 header("Access-Control-Allow-Credentials:true");
 header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
try {
  
        require_once("../connectBooks.php");
        $sql = "SELECT s.style_name,s.style_id,s.style_descrip,s.style_pic from member m
        JOIN style s on(m.style_id=s.style_id)
        where m.mem_id=:mem_id;";

        $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
        $member = $pdo->prepare($sql); //先編譯好
        $member->bindValue(":mem_id", $member_id); //代入資料
        $member->execute(); //執行之
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        $id = (["mem_id"=>$member_id]);
        $data = array($memberRow, $id);
        echo json_encode($data);
    
  
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>