<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
    require_once("../connectBooks.php");
    $style_id = (int)$_POST['style_id'];
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

    // $appointment_time=$_REQUEST['appointment_time'];
    // $appointment_qa=$_REQUEST['appointment_qa'];
    // $appointment_qatext=$_REQUEST['appointment_qatext'];

    //sql 指令
    // $sql = "INSERT INTO appointment VALUES(null, '$member_id', '103','$appointment_date', '$appointment_time', '$appointment_qa', '$appointment_qatext', '0')";
    //編譯, 執行
    // $chatqa = $pdo->query($sql);
    // $Msg='OK';
    // echo json_encode(["msg"=>$Msg]);
/* } */
/* else{//尚未登入，
    $errMsg .= "請先登入";
    echo json_encode(["msg"=>$errMsg]);
} */






?>
   






 
