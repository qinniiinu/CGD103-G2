<?php
//跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

$memId = $_REQUEST['mem_id'];
$sql = "DELETE FROM appointment WHERE mem_id = '$memId';";
$pdo->query($sql);

echo json_encode(['success' => true]);
?>
