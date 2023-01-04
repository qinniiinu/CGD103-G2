<?php
//跨域

session_start();
$Origin=isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*";
    // 如果$Origin為*號時，跨域訪問不支持cookie的發送
    // //跨域(正式開發不能這樣)
    header("Access-Control-Allow-Origin:{$Origin}");
    // 允許請求的類型
    header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
    // 跨域訪問是否允許帶cookie的發送
    header("Access-Control-Allow-Credentials:true");
$errMsg = "";


// 以下是第一次成功版本



try{
    if (isset($_SESSION['member']['mem_id'])) {
    require_once("../connectBooks.php");

    $sql = "insert into order_qa values (null, :order_id, CURRENT_TIMESTAMP, 1, :meg_cont,:mem_id,null)";
    

    $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
    // $order_id = $_SESSION['order']['order_id'];
    // 編譯
    $client = $pdo->prepare($sql);
    $client->bindValue(":order_id",$_POST["order_id"]);
    $client->bindValue(":mem_id",$_SESSION['member']["mem_id"]);

    // $client->bindValue(":meg_cont",$_POST["meg_cont"]);
    $client->bindValue(":meg_cont",$_POST["meg_cont"]);
    $client->execute();

    $msg = "新增成功";
    }
}catch(PDOException $e){
    $msg = "錯誤行號: ".$e->getLine().",錯誤訊息: " .$e->getMessage();
}

$result = ["msg"=>$msg];
echo json_encode($result);




// try{
    
//     if(isset($_SESSION['member']['mem_id'])){
//         require_once("../connectBooks.php");

    
//         $sql = "insert into order_qa values (null, 101, CURRENT_TIMESTAMP, 1, :meg_cont,101,null)";
        
    
//         $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
//         // 編譯
//         $client = $pdo->prepare($sql);
//         $client->bindValue(":mem_id",$member_id);
//         $client->bindValue(":meg_cont",$_POST["meg_cont"]);
//         $client->execute();
    
//         $msg = "新增成功";
//     }  else{//尚未登入，
//         $errMsg .= "請先登入";
//         echo json_encode(["msg"=>$errMsg]);
//     }
// }catch(PDOException $e){
//     $msg = "錯誤行號: ".$e->getLine().",錯誤訊息: " .$e->getMessage();
// }

// $result = ["msg"=>$msg];
// echo json_encode($result);



?>


