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
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
// 抓取登入會員的資料
try {
    if (isset($_SESSION['member'])) { // 若會員已登入
        // 取得已登入會員 身形 body、風格 style、訂閱等級 vip_level、
        require_once("../connectBooks.php");
        $sql = "SELECT * FROM member WHERE mem_id=:mem_id;";

        // $sql = "SELECT m.*, b.*, s.* from member m JOIN body b on(m.body_id=b.body_id)  
        // JOIN style s on(m.style_id=s.style_id)
        // JOIN vip_level vl on(m.level_id=vl.level_id)
        
        $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
        $member = $pdo->prepare($sql); //先編譯好
        $member->bindValue(":mem_id", $member_id); //代入資料
        $member->execute(); //執行之
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        echo json_encode($memberRow);
    }
    else{
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

