<?php
// 跨域
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
require_once("../connectBooks.php");
$member_id = (int)$_POST['mem_id'];
$sql = "SELECT s.style_name,s.style_id,s.style_descrip,s.style_pic from member m
 JOIN style s on(m.style_id=s.style_id)
 where m.mem_id = $member_id;";
 $member = $pdo->prepare($sql);
 $member->execute();
 $memberRow = $member->fetch(PDO::FETCH_ASSOC);
 echo json_encode($memberRow);
?>

