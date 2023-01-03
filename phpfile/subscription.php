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
    header("Content-Type:application/json;charset=utf-8");
    $errMsg = "";
    // 抓取此會員的訂閱資訊
    try{
        if (isset($_SESSION['member'])) {
            require_once("../connectBooks.php");
            $sql = "SELECT v.*,o.*
            FROM vip_level v JOIN vip_orders o ON v.level_id=o.level_id
            where o.mem_id=:mem_id;";
            $msg="新增成功";
            $mem_id = $_SESSION['member']['mem_id'];
            $level = $pdo->prepare($sql); //先編譯好
            $level->bindValue(":mem_id", $mem_id); //代入資料
            $level->execute(); //執行之
            $levelRow = $level->fetch(PDO::FETCH_ASSOC);
            $_SESSION['subscribe']=$levelRow;
            echo json_encode($levelRow);
        }else{
            //尚未登入
            $errMsg .= "none";
            echo json_encode(["msg"=>$errMsg]);
        }
    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
        echo json_encode(["msg"=>$errMsg]);
    }
?>