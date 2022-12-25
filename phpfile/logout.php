<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
$errMsg = "";
$msg = "";

try{
    // 將 session 中的資料全刪
    if(isset($_SESSION["member"])){
        session_unset();
        echo json_encode(["msg"=>"已登出"]);
        exit();
        // 轉址到登入頁面
    }else{
        echo json_encode(["errMsg"=>"錯誤"]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["errMsg"=>$errMsg]);
}
?>