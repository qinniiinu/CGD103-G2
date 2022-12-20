<?php
// 跨域
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../../connectBooks.php");

$sql = "SELECT combo_name,combo_pic FROM product_combo WHERE hashtag = '極簡風';";
$book = $pdo->query($sql);
$books = $book->fetchALL(PDO::FETCH_ASSOC);
$data = [];
foreach ($books as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>