<?php
session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
// 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Origin: {$Origin}");
// 允许请求的类型
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
// 跨域访问是否允许带cookie的发送
header("Access-Control-Allow-Credentials:true");
header("Content-Type:application/json;charset=UTF-8");

if (isset($_SESSION['member'])) {
    require_once("../connectBooks.php");
    $data = json_decode(file_get_contents('php://input'));
    $prod = $data->id;
    $id = $_SESSION['member']['mem_id'];


    $q = $pdo->query("SELECT COUNT(*) from `collect_product` WHERE  mem_id= $id && product_id= $prod;");
    $rows = $q->fetch();
    $rowCount = $rows[0];


    if ($rowCount == 1) {
        $stmt = $pdo->prepare("DELETE FROM collect_product WHERE mem_id = :id && product_id =:prod ;");
        $stmt->bindValue(':prod', $prod, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $msg = "收藏刪除成功";

    } else {


        $stmt = $pdo->prepare("INSERT INTO  `collect_product`( mem_id ,product_id) VALUES( :id , :prod);");
        $stmt->bindValue(':prod', $prod, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $msg = "收藏加入成功";
    }

} else {
    $msg = "要加入收藏，請先登入";
}

$result = ["msg" => $msg, 'rowCount' => $rowCount];
echo json_encode($result);
?>