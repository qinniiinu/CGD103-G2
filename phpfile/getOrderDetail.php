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
    // $sql = "SELECT *
    // FROM (orders INNER JOIN order_item  ON orders.order_id= order_item.order_id)
    // INNER JOIN order_qa
    // ON orders.mem_id=order_qa.mem_id
    // where orders.mem_id=:mem_id && order_qa.meg_id = 101 
    // order by order_qa.meg_time DESC
    // ;";



//以下為  帳號101可以成功   的寫法

    $msg="success";
    $errMsg = "";
    
    // $sql = "SELECT *
    //             FROM (
    //                 (orders
    //                 INNER JOIN order_qa
    //                 ON orders.mem_id=order_qa.mem_id
    //                  )
    //         INNER JOIN order_item
    //         ON orders.order_id=order_item.order_id
    //         )
    // INNER JOIN product
    // ON order_item.product_id=product.product_id        
    // where orders.mem_id=:mem_id 
    // order by order_qa.meg_time DESC";


    // $sql = "SELECT *
    //             FROM (
    //                 (orders
    //                 INNER JOIN order_qa
    //                 ON orders.mem_id=order_qa.mem_id
    //                  )
    //         INNER JOIN order_item
    //         ON orders.order_id=order_item.order_id
    //         )
    // INNER JOIN product
    // ON order_item.product_id=product.product_id        
    // where order_qa.mem_id=:mem_id 
    // order by order_qa.meg_time DESC";





    // $sql = "SELECT o.*
    //         FROM orders o
    //         JOIN order_qa q ON o.mem_id=q.mem_id
    //         JOIN order_item i ON o.order_id=i.order_id
    //         INNER JOIN product p ON i.product_id=p.product_id       
    //         where o.mem_id=:mem_id 
    //         order by q.meg_time DESC";


    $sql = " SELECT * from member m 
            join orders o on m.mem_id = o.mem_id 
            join order_item i on o.order_id = i.order_id 
            join product p ON i.product_id=p.product_id  
            where m.mem_id = :mem_id ";


    $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
    $member = $pdo->prepare($sql); //先編譯好
    $member->bindValue(":mem_id", $member_id); //代入資料
    $member->execute(); //執行之
    $memberRow = $member->fetchAll(PDO::FETCH_ASSOC);


    // ==================

//以下想要帶入oder_qa的資料


    // $sql = " SELECT * from order_qa
    // where order_qa.mem_id = :mem_id ";

    // $order_id =$_SESSION['member']['mem_id'];
    // $order_qa = $pdo->prepare($sql); //先編譯好
    // $order_qa->bindValue(":order_id", $order_id); //代入資料
    // $order_qa->execute(); //執行之
    // $order_qaRow = $order_qa->fetchAll(PDO::FETCH_ASSOC);

    // // $result=["order_items"=>$order_itemsRows, "order_qaRow" => $order_qaRows]

    // echo json_encode($order_qaRow);

    
    echo json_encode($memberRow);

   

}catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>