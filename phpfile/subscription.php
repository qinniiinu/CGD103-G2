<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

$sql = "SELECT level_id
FROM member m JOIN vip_level v ON m.level_id=v.level_id;
ORDER BY level_id DESC;";
$memSub = $pdo->query($sql);
$memSubRow = $memSub->fetchAll(PDO::FETCH_ASSOC);
$data = [];
foreach ($memSubRow as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>