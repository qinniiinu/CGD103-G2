<?php
// 前台 判斷會員登入狀態，若已登入 => 取得 SESSION 中的會員資料，
//     尚未登入 => 傳送錯誤訊息
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=UTF-8");
    $errMsg = "";
    if (isset($_SESSION['member'])) { // 會員已登入
        //取得會員資料

        $member = $_SESSION['member'];
        // 將會員資料輸出為 JSON 格式
        echo json_encode($member);
        
        exit();

    }
    else{//尚未登入，
        $errMsg .= "請先登入";
        echo json_encode(["msg"=>$errMsg]);
    }
    ?> 