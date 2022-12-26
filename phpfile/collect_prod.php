<?php
session_start();
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
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