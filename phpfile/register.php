<?php
// 前台 會員註冊
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
    // 註冊帳號資料
    if($_POST["action"] === "register"){ //送出註冊
        $mem_mail = $_POST["mem_mail"];
        $mem_pwd = $_POST["mem_pwd"];
        $mem_name = $_POST["mem_name"];
        $bday = $_POST["bday"];

        // 身形資料
        $sex = $_POST["sex"];
        $chest = $_POST["chest"];
        $shoulder = $_POST["shoulder"];
        $waistline = $_POST["waistline"];
        $hip = $_POST["hip"];
        $clothes = $_POST["clothes"];
        $pants = $_POST["pants"];
        $shoesize = $_POST["shoesize"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        $msg = '';
        $errMsg = "";
        require_once("../connectBooks.php");

        $sql = "INSERT INTO member (mem_mail, mem_pwd, mem_name, bday, mem_date, chest, shoulder, waistline, hip, clothes, pants, shoesize, height, weight, body_id, sex)
        VALUES (:mem_mail, :mem_pwd, :mem_name, :bday, CURRENT_DATE(),:chest, :shoulder, :waistline, :hip, :clothes, :pants, :shoesize, :height,:weight, 101, :sex);";
        
        $member = $pdo->prepare( $sql );
        $member->bindValue(":mem_mail", $mem_mail);
        $member->bindValue(":mem_pwd", $mem_pwd);
        $member->bindValue(":mem_name", $mem_name);
        $member->bindValue(":bday", $bday);
        $member->bindValue(":chest", $chest);
        $member->bindValue(":shoulder", $shoulder);
        $member->bindValue(":waistline", $waistline);
        $member->bindValue(":hip", $hip);
        $member->bindValue(":clothes", $clothes);
        $member->bindValue(":pants", $pants);
        $member->bindValue(":shoesize", $shoesize);
        $member->bindValue(":height", $height);
        $member->bindValue(":weight", $weight);
        $member->bindValue(":sex", $sex);

        $member->execute();//執行之
        if($member->rowCount() > 0) {// 註冊成功

            require_once("../connectBooks.php");
            $sql2= "SELECT * FROM member WHERE mem_mail = :mem_mail";
            $stmt = $pdo->prepare($sql2);
            $stmt->bindValue(":mem_mail", $_POST["mem_mail"]);
            $stmt->execute();
            $memberRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // 帶入登入者資料 session
            $_SESSION['member'] = $memberRow;
            $msg = '註冊成功';
            echo json_encode(["msg" => $msg,"member"=>$memberRow]);
            exit();
        } else {// 註冊不成功
            $errMsg = '錯誤:註冊失敗';
            echo json_encode(["errMsg" => $errMsg]);
            }

    }else if($_POST["action"] === "check_email"){ //檢查 email 是否已註冊
        require_once("../connectBooks.php");
        $sql = "SELECT * from member where mem_mail=:mem_mail;";
        $msg = '';
        $errMsg = '';
        $member = $pdo->prepare( $sql );
        $member->bindValue(":mem_mail", $_POST["mem_mail"]);
        $member->execute();//執行之
        if ($member->rowCount() == 1) { // 已有帳號
            $errMsg = "此帳號已註冊";
        }else{
            $msg = "帳號可使用";
        }
    }
} catch (PDOException $e) {
    $errMsg = "錯誤 : ".$e -> getMessage();
    $errMsg .= ", 行號 : ".$e -> getLine();
}
echo json_encode(["msg" => $msg , "errMsg" => $errMsg]);
?> 
