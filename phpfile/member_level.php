<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
try {
    if (isset($_POST['level_id'])) { // 若會員有訂閱
        $level_id = $_POST["level_id"];
        require_once("../connectBooks.php");
        $sql = "SELECT * FROM vip_level WHERE level_id = :level_id;";
        $level = $pdo->prepare($sql);
        $level->bindValue(":level_id", $level_id); //代入資料
        $level->execute(); //執行之
        $levelRow = $level->fetch(PDO::FETCH_ASSOC);
        echo json_encode($levelRow);
    }
    else{//尚未訂閱，
        $errMsg .= "未訂閱";
        echo json_encode(["msg"=>$errMsg]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>

