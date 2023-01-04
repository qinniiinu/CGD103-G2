<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");
$comboId = $_REQUEST['combo_id'];

$sql = "SELECT p.*,c.combo_id,t.product_id FROM product p JOIN combo_item t ON p.product_id = t.product_id JOIN product_combo c ON t.combo_id = c.combo_id WHERE c.combo_id= $comboId  ;";


$book = $pdo->query($sql);
$books = $book->fetchAll();
$data = [];
foreach ($books as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>