<?php
// 跨域
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("../../connectBooks.php");
$style_id = (int)$_POST['style_id'];
// echo $style_id;
if($style_id === 101){
    $sql = "select * from product where style_type LIKE ('%運動風%') limit 4; ";
    $book = $pdo->query($sql);
    $books = $book->fetchALL(PDO::FETCH_ASSOC);
    $data = [];
    foreach ($books as $i => $page) {
        $data[] = $page;    
    }
    echo json_encode($data);
}else if($style_id === 102){
    $sql = "select * from product where style_type LIKE ('%文青風%') limit 4";
        $book = $pdo->query($sql);
        $books = $book->fetchALL(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($books as $i => $page) {
            $data[] = $page;
        }
        echo json_encode($data);
}else if($style_id === 103){
    $sql = "select * from product where style_type LIKE ('%時尚風%') limit 4";
        $book = $pdo->query($sql);
        $books = $book->fetchALL(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($books as $i => $page) {
            $data[] = $page;
        }
        echo json_encode($data);
}else if($style_id === 104){
    $sql = "select * from product where style_type LIKE ('%極簡風%') limit 4";
        $book = $pdo->query($sql);
        $books = $book->fetchALL(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($books as $i => $page) {
            $data[] = $page;
        }
        echo json_encode($data);
}else{
    // $errMsg .= "error";
    echo '';
}
// $sql = "select * from product where style_type LIKE ('%時尚風%') limit 4";
// $book = $pdo->query($sql);
// $books = $book->fetchALL(PDO::FETCH_ASSOC);
// $data = [];
// foreach ($books as $i => $page) {
//     $data[] = $page;
// }
// echo json_encode($data);
?>