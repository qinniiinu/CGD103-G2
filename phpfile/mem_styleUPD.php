<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
    require_once("../connectBooks.php");
    $style_id = (int)$_POST['style_id'];
    // 抓不到 store*****
    // $member_id = (int)$_REQUEST['mem_id']; 
    $member_id = $_SESSION['member']['mem_id']; 
    // $member_id = 117; 
    $sql = "update member set style_id = $style_id where mem_id = $member_id;";
    $products = $pdo->prepare($sql);	
    $products->execute();
 
?>
   






 
