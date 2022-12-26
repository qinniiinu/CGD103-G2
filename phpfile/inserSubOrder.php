<?php
    session_start();
    // //跨域(正式開發不能這樣)
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
        // if($_POST["action"] === "subOrder"){
        $msg="success";
        $errMsg = "";

        require_once("../connectBooks.php");

        $sql = "INSERT INTO vip_orders (mem_id,level_id,sub_paid,sub_time,sub_deadline)
        VALUES (:mem_id,:level_id,:sub_paid,CURRENT_TIMESTAMP(),TIMESTAMPADD(MONTH,1,sub_time));";

        $subOrder = $pdo->prepare($sql); //先編譯好
        $subOrder->bindValue(":mem_id", $_POST["mem_id"]); //代入資料
        $subOrder->bindValue(":level_id", $_POST["level_id"]); //代入資料
        $subOrder->bindValue(":sub_paid", $_POST["sub_paid"]); //代入資料
        $subOrder->execute(); //執行之
        $subOrderRow = $subOrder->fetch(PDO::FETCH_ASSOC);

        echo json_encode($subOrderRow);
        // }else{

        // }
    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
        echo json_encode(["msg"=>$errMsg]);
    }
    // echo json_encode(["msg" => $msg , "errMsg" => $errMsg]);
?>