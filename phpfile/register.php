<!-- 前台 會員註冊 -->
<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try {
$mem_mail = $_POST["mem_mail"];
$mem_pwd = $_POST["mem_pwd"];
$mem_name = $_POST["mem_name"];
$bday = $_POST["bday"];
$errMsg = "";
    require_once("../connectBooks.php");
    
    $sql = "INSERT INTO `member` (mem_mail, mem_pwd, mem_name, mem_bday, mem_date) VALUES ($mem_mail, $mem_pwd, $mem_name, $bday, CURRENT_DATE())"; //''


    // $member = $pdo->prepare( $sql ); //先編譯好
    // $member->bindValue(":mem_mail", $mem_mail); //代入資料
    // $member->bindValue(":mem_pwd", $mem_pwd);
    // $member->execute();//執行之

    if( $member->rowCount() == 0 ){//登入失敗
        $errMsg .= "用戶帳號或密碼錯誤請重新登入<br>";
    }else{ //登入成功,
        //自資料庫中取回資料
        $memRow = $member->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = $memRow;

        //送出登入者的資料
        // $result = ["memNo"=>$_SESSION["memNo"], "memId"=>$_SESSION["memId"],"memName"=>$_SESSION["memName"],"email"=>$_SESSION["email"]];
        // echo json_encode($result);

        // 設定回應的 HTTP 標頭
        header('Content-Type: application/json');
        // 將會員資料輸出為 JSON 格式
        echo json_encode($user);

        header('Location: /MyPage'); // 自動跳轉至會員頁
        exit;
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?> 
