<?php
session_start();
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
if (isset($_SESSION['member'])) {
    require_once("../connectBooks.php");
    $data = json_decode(file_get_contents('php://input'));
    $prod = $data->id;
    $id = $_SESSION['member']['mem_id'];


    $q = $pdo->query("SELECT COUNT(*) from `collect_product` WHERE  mem_id= $id && product_id= $prod;");
    $rows = $q->fetch();
    $rowCount = $rows[0];


    if ($rowCount === 0) {
        $stmt = $pdo->prepare("INSERT INTO  `collect_product`( mem_id ,product_id) VALUES( :id , :prod);");
        $stmt->bindValue(':prod', $prod, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $msg = "收藏加入成功";

    } else {
        $stmt = $pdo->prepare("DELETE FROM collect_product WHERE mem_id = :id && product_id =:prod ;");
        $stmt->bindValue(':prod', $prod, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $msg = "收藏刪除成功";

    }

} else {
    $msg = "要加入收藏，請先登入";
}

$result = ["msg" => $msg];
echo json_encode($result);
?>