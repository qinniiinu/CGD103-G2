<?php
    // 更新會員資料
    session_start();
    $Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*"; 
    // 如果 $origin 為 * 號時，則跨域訪問不支持 cookie 的發送
    header("Access-Control-Allow-Origin: {$Origin}");           
    // 允許請求的類型
    header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    
    // 跨域訪問是否允許帶 cookie 的發送
    header("Access-Control-Allow-Credentials:true");
    header("Content-Type:application/json;charset=UTF-8");
    $msg = '';
    $errMsg = "";

    $mem_id = $_SESSION['member']['mem_id'];
    $mem_name = $_POST["mem_name"];
    $mem_mail = $_POST["mem_mail"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $bday = $_POST["bday"];
    // 會員照片檔名
    $mem_pic = $_FILES['upFile'];

try {
    // 會員大頭照上傳
    switch($_FILES['upFile']['error']){
        case UPLOAD_ERR_OK:
            // $dir = "../public/pic";
            $dir = "../pic";
            if (file_exists($dir) === false) {
                mkdir($dir); //make directory
            }
            $from = $mem_pic['tmp_name'];
            $to = $dir . "/" . $mem_pic['name']; //images/check.ico
            copy($from, $to);
            if (copy($from, $to)) {
                $msg .= '照片上傳成功';
            }

            //基本資料
            require_once("../connectBooks.php");
            $sql = "UPDATE `member` SET mem_name=:mem_name,
            mem_mail=:mem_mail,
            phone=:phone,
            address=:address,
            bday=:bday,
            mem_pic=:mem_pic
            WHERE mem_id = :mem_id ;";

            $member = $pdo->prepare($sql);
            $mem_pic = $mem_pic['name'];
            $member->bindValue(":mem_name", $mem_name);
            $member->bindValue(":mem_mail", $mem_mail);
            $member->bindValue(":phone", $phone);
            $member->bindValue(":address", $address);
            $member->bindValue(":bday", $bday);
            $member->bindValue(":mem_id", $mem_id);
            $member->bindValue(":mem_pic", $mem_pic);
            $member->execute(); //執行之
            if ($member->rowCount() > 0) {
                // 更新成功
                $msg .= '更新成功';
                echo json_encode(["msg"=>$msg]);
            } else {
                // 更新失敗
                $errMsg .= "更新失敗";
                echo json_encode(["errMsg"=>$errMsg]);
            }
            break;
        case UPLOAD_ERR_INI_SIZE:
            $errMsg .= "檔案太大, 不得超過".ini_get("upload_max_filesize");
            echo json_encode(["errMsg"=>$errMsg]);
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $errMsg .= "檔案太大, 不得超過".$_POST["MAX_FILE_SIZE"];
            echo json_encode(["errMsg"=>$errMsg]);
            break;
        case UPLOAD_ERR_PARTIAL:
            $errMsg .= "檔案上傳不完整";
            echo json_encode(["errMsg"=>$errMsg]);
            break;
        case UPLOAD_ERR_NO_FILE:
            $mem_pic = $_FILES['mem_pic'];
            $dir = "https://tibamef2e.com/cgd103/g2/front/pic";
            if (file_exists($dir) === false) {
                mkdir($dir); //make directory
            }
            $from = $mem_pic['tmp_name'];
            $to = $dir . "/" . $mem_pic['name']; //images/check.ico
            copy($from, $to);
            if (copy($from, $to)) {
                $msg .= '照片上傳成功';
            }

            //基本資料
            require_once("../connectBooks.php");
            $sql = "UPDATE `member` SET mem_name=:mem_name,
            mem_mail=:mem_mail,
            phone=:phone,
            address=:address,
            bday=:bday,
            mem_pic=:mem_pic
            WHERE mem_id = :mem_id ;";

            $member = $pdo->prepare($sql);
            $mem_pic = $mem_pic['name'];
            $member->bindValue(":mem_name", $mem_name);
            $member->bindValue(":mem_mail", $mem_mail);
            $member->bindValue(":phone", $phone);
            $member->bindValue(":address", $address);
            $member->bindValue(":bday", $bday);
            $member->bindValue(":mem_id", $mem_id);
            $member->bindValue(":mem_pic", $mem_pic);
            $member->execute(); //執行之
            if ($member->rowCount() > 0) {
                // 更新成功
                $msg .= '更新成功';
                echo json_encode(["msg"=>$msg]);
            } else {
                // 更新失敗
                $errMsg .= "更新失敗";
                echo json_encode(["errMsg"=>$errMsg]);
            }
            break;
        default : 
            echo "errMsg : ", $_FILES['upFile']['error'];
            break;
    }

    
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage();
    $errMsg .= "行號 : ".$e -> getLine();
    echo json_encode(["errMsg"=>$errMsg]);
}
?>