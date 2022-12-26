<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

$sql = "select * from `product` where product_state=1 && product_name is not null";
$book = $pdo->query($sql);
$books = $book->fetchAll(PDO::FETCH_ASSOC);
$data = [];
foreach ($books as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>