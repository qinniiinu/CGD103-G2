<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

$sql = "SELECT * FROM `vip_level`;";
$memSub = $pdo->query($sql);
$memSubAll = $memSub->fetchAll();
$data = [];
foreach ($memSubAll as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>