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
try {
    require_once("../connectBooks.php");
    $sql = "select * from `member` where mem_mail=:mem_mail and mem_pwd=:mem_pwd;";
    $errMsg = "";
    if (isset($_POST['mem_mail']) && isset($_POST['mem_pwd'])) {
        // 使用表單數據
        $mem_mail = $_POST['mem_mail'];
        $mem_pwd = $_POST['mem_pwd'];

        $member = $pdo->prepare( $sql ); //先編譯好
        $member->bindValue(":mem_mail", $mem_mail); //代入資料
        $member->bindValue(":mem_pwd", $mem_pwd);
        $member->execute();//執行之

        if( $member->rowCount() === 0 ){//登入失敗
            $errMsg .= "用戶帳號或密碼錯誤，請重新登入";
            echo json_encode(["msg"=>$errMsg]);
        }else{ //登入成功,
            //自資料庫中取回資料
            $memRow = $member->fetch(PDO::FETCH_ASSOC);

            //將登入者的資料寫入session
            $_SESSION['member'] = $memRow;
            // 將會員資料輸出為 JSON 格式
            echo json_encode($memRow);
            // exit();
        }
    } else {
        // 表單未提交或缺少必填字段
        echo json_encode(["msg"=>"缺少必填欄位"]);
    }
  
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage();
    $errMsg .= "行號 : ".$e -> getLine();
    echo json_encode(["msg"=>$errMsg]);
}
?>