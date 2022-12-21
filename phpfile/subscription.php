<?php
    session_start();
    // //跨域(正式開發不能這樣)
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
        if(isset($_SESSION['member'])){
            require_once("../connectBooks.php");
            $sql = "SELECT v.*
            FROM member m JOIN vip_level v ON m.level_id=v.level_id where m.mem_id=:mem_id
            ORDER BY level_id ASC;";
            $errMsg = "";
        }
        
    }


$memSub = $pdo->query($sql);
$memSubRow = $memSub->fetchAll(PDO::FETCH_ASSOC);
$data = [];
foreach ($memSubRow as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>