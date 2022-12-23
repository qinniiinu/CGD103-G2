<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
$member_id = $_SESSION['member']['mem_id'];
echo  $member_id;
// if (isset($_SESSION['member'])) { // 若會員已登入
//     require_once("../connectBooks.php");
//     //sql 指令
//     //編譯, 執行
//     $member_id = $_SESSION['member']['mem_id']; //
//     // $mem_style_id=$_REQUEST['mem_style_id'];
//     $sql = "UPDATE member SET style_id = 104  WHERE mem_id = 101;";
//     $member = $pdo->query($sql);
//     $member->bindValue(":mem_id", $member_id); //代入資料
//     // $member->bindValue(":style_id", $mem_style_id); //代入資料
//     // $member->execute(); //執行之
    
// }
// else{//尚未登入，
//     $errMsg .= "請先登入";
//     echo json_encode(["msg"=>$errMsg]);
// }






?>
   






 
