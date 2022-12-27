<?php
// //跨域(正式開發不能這樣)
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

try {
    // $sql = "SELECT *
    // FROM (orders INNER JOIN order_item  ON orders.order_id= order_item.order_id)
    // INNER JOIN order_qa
    // ON orders.mem_id=order_qa.mem_id
    // where orders.mem_id=:mem_id && order_qa.meg_id = 101 
    // order by order_qa.meg_time DESC
    // ;";

    $sql = "SELECT *
    FROM orders
    INNER JOIN order_qa
    ON orders.mem_id=order_qa.mem_id
    where orders.mem_id=:mem_id and order_qa.meg_status = 0
    order by order_qa.meg_time";


    $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
    $member = $pdo->prepare($sql); //先編譯好
    $member->bindValue(":mem_id", $member_id); //代入資料
    $member->execute(); //執行之
    
    $memberRow = $member->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($memberRow);

}catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>