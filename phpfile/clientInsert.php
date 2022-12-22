<?php
//跨域
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{
    require_once("../connectBooks.php");
    $sql = "insert into client values (null, :client_person, :client_name, :client_phone, :client_mail, :client_meg)";
    
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