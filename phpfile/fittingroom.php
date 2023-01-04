<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

$sql = "SELECT `product_pic` FROM `product`  LIMIT 6;";
$book = $pdo->query($sql);
$books = $book->fetchAll();
$data = [];
foreach ($books as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>