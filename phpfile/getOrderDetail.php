<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");


$sql = "SELECT *
FROM (orders INNER JOIN order_item  ON orders.order_id= order_item.order_id)
INNER JOIN order_qa
ON orders.order_id=order_qa.order_id
;";



$memSub = $pdo->query($sql);
$memSubAll = $memSub->fetchAll();
$data = [];
foreach ($memSubAll as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>