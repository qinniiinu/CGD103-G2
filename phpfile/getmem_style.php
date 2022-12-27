<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
try {
    if (($_POST["style_id"])) { // 若會員有風格
        require_once("../connectBooks.php");
        $style_id = $_POST["style_id"];
        require_once("../connectBooks.php");
        $sql = "SELECT * FROM style WHERE style_id = :style_id;";
        $style = $pdo->prepare($sql);
        $style->bindValue(":style_id", $style_id); //代入資料
        $style->execute(); //執行之
        $styleRow = $style->fetch(PDO::FETCH_ASSOC);
        echo json_encode($styleRow);
    }
    else{//尚未訂閱，
        $errMsg .= "沒有風格";
        echo json_encode(["msg"=>$errMsg]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>

