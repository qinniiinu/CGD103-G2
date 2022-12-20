<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
session_start();

// 將 session 中的資料全刪
if(isset($_SESSION["memId"])){
    session_unset(); 

    // 轉址到登入頁面
    header('Location: /login');
}
?>