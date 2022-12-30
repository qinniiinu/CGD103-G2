<?php
//跨域
session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
// 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Origin: {$Origin}");
// 允许请求的类型
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
// 跨域访问是否允许带cookie的发送
header("Access-Control-Allow-Credentials:true");
header("Content-Type:application/json;charset=UTF-8");

try{
    require_once("../connectBooks.php");
    $sql = "insert into client values (null, :client_person, :client_name, :client_phone, :client_mail, :client_meg,0,CURRENT_TIMESTAMP
    ,101)";
    
    // 編譯
    $client = $pdo->prepare($sql);
    $client->bindValue(":client_person",$_POST["client_person"]);
    $client->bindValue(":client_name",$_POST["client_name"]);
    $client->bindValue(":client_phone",$_POST["client_phone"]);
    $client->bindValue(":client_mail",$_POST["client_mail"]);
    $client->bindValue(":client_meg",$_POST["client_meg"]);
    $client->execute();

    $msg = "新增成功";
}catch(PDOException $e){
    $msg = "錯誤行號: ".$e->getLine().",錯誤訊息: " .$e->getMessage();
}

$result = ["msg"=>$msg];
echo json_encode($result);
?>