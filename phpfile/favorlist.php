<?php
session_start();
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
if (isset($_SESSION['member'])) {
    require_once("../connectBooks.php");
    $data = json_decode(file_get_contents('php://input'));
    $id = $_SESSION['member']['mem_id'];

    $sql = "SELECT collect_product.product_id, product.product_name,product.product_pic , product.unit_price
    FROM collect_product
    INNER JOIN product
    ON collect_product.product_id = product.product_id
    where collect_product.mem_id =$id;";

    $book = $pdo->query($sql);
    $books = $book->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($books);


} else {
    $msg = "請先登入";
    $result = ["msg" => $msg];
    echo json_encode($result);
}


?>