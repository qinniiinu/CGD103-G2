<?php
session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
// 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Origin: {$Origin}");
// 允许请求的类型
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
// 跨域访问是否允许带cookie的发送
header("Access-Control-Allow-Credentials:true");
header("Content-Type:application/json;charset=UTF-8");
// echo $_SESSION['member']['mem_id'];
if (isset($_SESSION['member'])) {
    require_once("../connectBooks.php");
    $id = $_SESSION['member']['mem_id'];


    $stmt = $pdo->prepare("SELECT * FROM `collect_product` where mem_id = $id;");

    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // echo "[1:1]";

    echo json_encode($results);
} else {
    $results = [];
    echo json_encode($results);

}
?>