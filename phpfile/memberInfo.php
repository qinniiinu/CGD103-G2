<?php
// 取得已登入會員 身形 body、風格 style、訂閱等級 vip_level、
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
try {
    if (isset($_SESSION['member'])) { // 若會員已登入
        require_once("../connectBooks.php");
        $sql = "SELECT m.*, b.*, s.*, vl.* from member m JOIN body b on(m.body_id=b.body_id) 
                                     JOIN style s on(m.style_id=s.style_id)
                                     JOIN vip_level vl on(m.level_id=vl.level_id)
        where m.mem_id=:mem_id;";

        $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
        $member = $pdo->prepare($sql); //先編譯好
        $member->bindValue(":mem_id", $member_id); //代入資料
        $member->execute(); //執行之
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        echo json_encode($memberRow);
    }
    else{//尚未登入，
        $errMsg .= "請先登入";
        echo json_encode(["msg"=>$errMsg]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>

