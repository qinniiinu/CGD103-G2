<?php
session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*"; 
// 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Origin:{$Origin}");           
// 允许请求的类型
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    
// 跨域访问是否允许带cookie的发送
header("Access-Control-Allow-Credentials:true");
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
?>
   






 
