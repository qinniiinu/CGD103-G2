<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

// 將 session 中的資料全刪
if(isset($_SESSION["memId"])){
    session_unset(); 

    // 轉址到登入頁面
    header('Location: /login');
}
?>