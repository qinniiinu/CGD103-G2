<?php
//跨域

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{
    require_once("../connectBooks.php");
    $sql = "insert into order_qa values (null, 101, CURRENT_TIMESTAMP, 1, :meg_cont, 101,null)";
    
    // 編譯
    $client = $pdo->prepare($sql);
    $client->bindValue(":meg_cont",$_POST["meg_cont"]);
    $client->execute();

    $msg = "新增成功";
}catch(PDOException $e){
    $msg = "錯誤行號: ".$e->getLine().",錯誤訊息: " .$e->getMessage();
}

$result = ["msg"=>$msg];
echo json_encode($result);
?>