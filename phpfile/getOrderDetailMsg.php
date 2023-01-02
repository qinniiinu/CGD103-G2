<?php
// //跨域(正式開發不能這樣)
session_start();
$Origin=isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*";
    // 如果$Origin為*號時，跨域訪問不支持cookie的發送
    // //跨域(正式開發不能這樣)
    header("Access-Control-Allow-Origin:{$Origin}");
    // 允許請求的類型
    header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
    // 跨域訪問是否允許帶cookie的發送
    header("Access-Control-Allow-Credentials:true");
require_once("../connectBooks.php");

try {
    $msg="success";
    $errMsg = "";
    

//以下想要帶入oder_qa的資料


$sql = " SELECT * from orders o
join order_qa q  on o.order_id = q.order_id 
where o.order_id = :order_id 
order by q.meg_time DESC";



    $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
    $member = $pdo->prepare($sql); //先編譯好
    $member->bindValue(":order_id", $_GET["order_id"]); //代入資料
    $member->execute(); //執行之
    $memberRow = $member->fetchAll(PDO::FETCH_ASSOC);

    
    echo json_encode($memberRow);

   

}catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>