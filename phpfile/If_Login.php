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
    $msg = "";
try{
    if (isset($_SESSION['member']['mem_id'])) {
        $msg .= "已登入";
        echo json_encode(["msg"=>$msg]);
    }
    else{
        $errMsg .= "未登入";
        echo json_encode(["errMsg"=>$errMsg]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["errMsg"=>$errMsg]);
}
?> 