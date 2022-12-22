<?php
// session_start()
// header('Access-Control-Allow-Origin:*');
// header("Content-Type:application/json;charset=utf-8");
// 
// require_once("../connectBooks.php");

// $mem_id=$_SESSION['member']['mem_id']




// $appointment_date=$_REQUEST['appointment_date'];
// $appointment_time=$_REQUEST['appointment_time'];
// $appointment_qa=$_REQUEST['appointment_qa'];
// $appointment_qatext=$_REQUEST['appointment_qatext'];
// 
//     //sql 指令
//     $sql = "INSERT INTO appointment VALUES(null, '104', '103','$appointment_date', '$appointment_time', '$appointment_qa', '$appointment_qatext', '0')";
//     //編譯, 執行
//     $chatqa = $pdo->query($sql);
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";

/* if (isset($_SESSION['member'])) {  */// 若會員已登入
    require_once("../connectBooks.php");
    $member_id = $_REQUEST['mem_id']; //
    $appointment_date=$_REQUEST['appointment_date'];
    $appointment_time=$_REQUEST['appointment_time'];
    $appointment_qa=$_REQUEST['appointment_qa'];
    $appointment_qatext=$_REQUEST['appointment_qatext'];

    //sql 指令
    $sql = "INSERT INTO appointment VALUES(null, '$member_id', '103','$appointment_date', '$appointment_time', '$appointment_qa', '$appointment_qatext', '0')";
    //編譯, 執行
    $chatqa = $pdo->query($sql);
    $Msg='OK';
    echo json_encode(["msg"=>$Msg]);
/* } */
/* else{//尚未登入，
    $errMsg .= "請先登入";
    echo json_encode(["msg"=>$errMsg]);
} */






?>
   






 
