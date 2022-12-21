<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");
/* try {
    require_once("../connect_cgd103g2.php");
    $data = json_decode(file_get_contents('php://input'));

    //sql 指令
    $sql = "INSERT INTO appointment VALUES(null, '$data->mem_id', '$data->appointment_date', '$data->product_stateappointment_time', '$data->appointment_qa', '$data->appointment_qatext', '$data->appointment_state'); ";
    //編譯, 執行
    $chatqa = $pdo->query($sql);


    $msg = "success";
} catch (PDOException $e) {
    $msg = "fail";
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

//輸出結果
$result = ["msg" => $msg];
echo json_encode($result); */

$appointment_date=$_REQUEST['appointment_date'];
$appointment_time=$_REQUEST['appointment_time'];
$appointment_qa=$_REQUEST['appointment_qa'];
$appointment_qatext=$_REQUEST['appointment_qatext'];

    //sql 指令
    $sql = "INSERT INTO appointment VALUES(null, '102', '103','$appointment_date', '$appointment_time', '$appointment_qa', '$appointment_qatext', '0')";
    //編譯, 執行
    $chatqa = $pdo->query($sql);

?>