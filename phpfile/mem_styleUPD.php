<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
    require_once("../connectBooks.php");
    $style_id = (int)$_POST['style_id'];
    $member_id = (int)$_POST['mem_id']; 
    $sql = "update member set style_id = $style_id where mem_id = $member_id;";
    $products = $pdo->prepare($sql);	
    $products->execute();

// echo json_encode("test");
?>
   






 
