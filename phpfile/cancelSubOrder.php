<?php
    session_start();
    $Origin=isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*";
    // 如果$Origin為*號時，跨域訪問不支持cookie的發送
    // //跨域(正式開發不能這樣)
    header("Access-Control-Allow-Origin:{$Origin}");
    // 允許請求的類型
    header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
    // 跨域訪問是否允許帶cookie的發送
    header("Access-Control-Allow-Credentials:true");
    // //跨域(正式開發不能這樣)
    header("Content-Type:application/json;charset=utf-8");
    try{
        require_once("../connectBooks.php");
        $sql = "UPDATE vip_orders SET level_id=NULL,sub_deadline=CURRENT_TIMESTAMP()
        WHERE sub_id=:sub_id;";

        // $sub_id = $_SESSION['subscribe']['sub_id'];
        // $mem_id = $_SESSION['subscribe']['mem_id'];
        $msg="更新成功";
        $errMsg = "";
        $cancelSub = $pdo->prepare($sql); //先編譯好
        $cancelSub->bindValue(":sub_id",$_SESSION['subscribe']['sub_id']); //代入資料
        // $cancelSub->bindValue(":mem_id",$_SESSION['subscribe']['mem_id']); //代入資料
        $cancelSub->execute(); //執行之
        $cancelSubRow = $cancelSub->fetch(PDO::FETCH_ASSOC);

        echo json_encode($cancelSubRow);
    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
        echo json_encode(["msg"=>$errMsg]);
    }
    // echo json_encode(["msg" => $msg , "errMsg" => $errMsg]);
?>