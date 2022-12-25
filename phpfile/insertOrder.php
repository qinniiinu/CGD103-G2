<?php
    session_start();
    // //跨域(正式開發不能這樣)
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
    // sql1
        // if($_POST["action"] === "Order"){
        //$order_id = $_POST["order_id"]; php帶入
        // $order_con=$POST["status"]; php帶入
        // $order_time=$POST["time"]; php帶入
        // $emp_id = $_POST["emp_id"]; php帶入
        $mem_id = $_POST["mem_id"];
        $total = $_POST["total"];
        $discount=$POST["discount"];
        $order_paid = $_POST["order_paid"];
        $order_addr = $_POST["order_addr"];
        $order_mem = $_POST["order_mem"];
        $order_phone = $_POST["order_phone"];
        $msg="success";
        $errMsg = "";

        require_once("../connectBooks.php");
        
        $sql1 = "INSERT INTO orders (mem_id,order_con,order_time,emp_id,total,discount,order_paid,ord_addr,ord_mem,ord_phone)
        VALUES (:mem_id,2,CURRENT_TIMESTAMP(),101,:total,:discount,:order_paid,:ord_addr,:ord_phone);";
        
        $Order = $pdo->prepare($sql1); //先編譯好
        $Order->bindValue(":mem_id", $mem_id); //代入資料
        $Order->bindValue(":total", $total); //代入資料
        $Order->bindValue(":discount", $discount); //代入資料
        $Order->bindValue(":order_paid", $order_paid); //代入資料
        $Order->bindValue(":ord_addr", $ord_addr); //代入資料
        $Order->bindValue(":ord_phone", $ord_phone); //代入資料
        $Order->execute(); //執行之
        $OrderRow = $Order->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode($OrderRow);

    // sql2
        $order_id = $pdo->last_insert_id(); //最新那筆
        
        $sql2 = "INSERT INTO order_item ()
        VALUES ();";
        $items=$pdo->prepare($sql2);
            foreach($cart as $i=>$item){
                $item->bindValue(":mem_id", $mem_id); //代入資料
            }
        $item->execute(); //執行之
        $itemRow = $item->fetch(PDO::FETCH_ASSOC);

        echo json_encode($itemRow);


    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
        echo json_encode(["msg"=>$errMsg]);
    }
    // echo json_encode(["msg" => $msg , "errMsg" => $errMsg]);
?>