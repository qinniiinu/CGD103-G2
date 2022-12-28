<?php
    // 更新會員資料
    session_start();
    $Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*"; 
    // 如果$origin为*号时,则跨域访问不支持cookie的发送
    header("Access-Control-Allow-Origin: {$Origin}");           
    // 允许请求的类型
    header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    
    // 跨域访问是否允许带cookie的发送
    header("Access-Control-Allow-Credentials:true");
    header("Content-Type:application/json;charset=UTF-8");
try {
        require_once("../connectBooks.php");

        $mem_id = $_SESSION['member']['mem_id'];
        $mem_name = $_POST["mem_name"];
        $mem_mail = $_POST["mem_mail"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $bday = $_POST["bday"];


        $msg = '';
        $errMsg = "";

        $sql = "UPDATE member SET mem_name=:mem_name,
        mem_mail=:mem_mail,
        phone=:phone,
        address=:address,
        bday=:bday
        WHERE mem_id = :mem_id ;";


        $member = $pdo->prepare($sql);

        $member->bindValue(":mem_name", $mem_name);
        $member->bindValue(":mem_mail", $mem_mail);
        $member->bindValue(":phone", $phone);
        $member->bindValue(":address", $address);
        $member->bindValue(":bday", $bday);
        $member->bindValue(":mem_id", $mem_id);
        $member->execute(); //執行之
        if ($member->rowCount() > 0) {
            // 更新成功
            $msg .= '更新成功';
            echo json_encode(["msg"=>$msg]);
        } else {
            // 更新失敗
            $errMsg = "更新失敗";
            echo json_encode(["errMsg"=>$errMsg]);
        }

        exit();
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage();
    $errMsg .= "行號 : ".$e -> getLine();
    echo json_encode(["errMsg"=>$errMsg]);
}
?>