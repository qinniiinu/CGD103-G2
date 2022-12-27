<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

$sql = "SELECT weeklywear_pic FROM weeklywear ORDER BY weeklywear_id DESC LIMIT 12  ;";
$book = $pdo->query($sql);
$books = $book->fetchAll();
$data = [];
foreach ($books as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>