<?php
// 前台 判斷會員登入狀態
    session_start();
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=UTF-8");
    $errMsg = "";
    $msg = "";
try{
    if (isset($_SESSION['member'])) { // 會員已登入
        // //取得會員資料
        // $member = $_SESSION['member'];
        $msg .= "已登入";
        echo json_encode(["msg"=>$msg]);
        exit();
    }
    else{//尚未登入，
        $errMsg .= "未登入";
        echo json_encode(["errMsg"=>$errMsg]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["errMsg"=>$errMsg]);
}
    ?> 