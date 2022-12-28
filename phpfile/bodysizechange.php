<?php
session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
// 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Origin:{$Origin}");
// 允许请求的类型
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
// 跨域访问是否允许带cookie的发送
header("Access-Control-Allow-Credentials:true");
header("Content-Type:application/json;charset=UTF-8");
try {
    // 註冊帳號資料
    if ($_SESSION['member']) { //送出註冊
        $member_id = $_SESSION['member']['mem_id'];
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
        $body_id = $_POST["body_id"];
        $msg = '';
        $errMsg = "";
        require_once("../connectBooks.php");

        $sql = "UPDATE member SET chest=:chest,
        shoulder=:shoulder,
        waistline=:waistline,
        hip=:hip,
        clothes=:clothes,
        pants=:pants,
        shoesize=:shoesize,
        height=:height,
        weight=:weight,
        body_id=:body_id,
        sex=:sex
        WHERE mem_id = :member_id ;";


        $member = $pdo->prepare($sql);

        $member->bindValue(":chest", $chest);
        $member->bindValue(":shoulder", $shoulder);
        $member->bindValue(":waistline", $waistline);
        $member->bindValue(":hip", $hip);
        $member->bindValue(":clothes", $clothes);
        $member->bindValue(":pants", $pants);
        $member->bindValue(":shoesize", $shoesize);
        $member->bindValue(":height", $height);
        $member->bindValue(":weight", $weight);
        $member->bindValue(":body_id", $body_id);
        $member->bindValue(":sex", $sex);
        $member->bindValue(":member_id", $member_id, PDO::PARAM_INT);

        $member->execute(); //執行之
        if ($member->rowCount() > 0) {
            echo json_encode('1');
        } else {
            echo json_encode('11');
        }
        exit();
    } else {
        echo json_encode('0');

    }

} catch (PDOException $e) {
    $errMsg = "錯誤 : " . $e->getMessage();
    $errMsg .= ", 行號 : " . $e->getLine();

    echo json_encode(["msg" => $msg, "errMsg" => $errMsg]);
}
?>