<?php
session_start()
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");

$mem_id=$_SESSION['member']['mem_id']
$level = $pdo->prepare($sql); //先編譯好
$level->bindValue(":mem_id", $member_id); //代入資料
$level->execute(); //執行之
$levelRow = $level->fetch(PDO::FETCH_ASSOC);
echo json_encode($levelRow);



$appointment_date=$_REQUEST['appointment_date'];
$appointment_time=$_REQUEST['appointment_time'];
$appointment_qa=$_REQUEST['appointment_qa'];
$appointment_qatext=$_REQUEST['appointment_qatext'];


    //sql 指令
    // $sql = "SELECT a.* , m.mem_name FROM appointment a join member m on a.mem_id = m.mem_id ORDER BY a.appointment_date ASC";
    $sql = "INSERT INTO appointment VALUES(null, '$mem_id', '103','$appointment_date', '$appointment_time', '$appointment_qa', '$appointment_qatext', '0') WHERE m.mem_id =:mem_id ";
    //編譯, 執行
    $chatqa = $pdo->query($sql);

?>