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
    // $member->bindValue(":mem_mail", $mem_mail); 
    // $member->bindValue(":mem_pwd", $mem_pwd);
    // $member->execute();//執行之

} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?> 


<!-- 前台 身形建置 -->
<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try {
$chest = $_POST["chest"];
$shoulder = $_POST["shoulder"];
$waistline = $_POST["waistline"];
$hip = $_POST["hip"];
$clothes = $_POST["clothes"];
$pants = $_POST["pants"];
$hip = $_POST["hip"];
$shoesize = $_POST["shoesize"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$errMsg = "";

require_once("../connectBooks.php");

$sql = "INSERT INTO `member` (chest, shoulder, waistline, clothes, pants) VALUES ($chest, $shoulder, $waistline, $clothes, $pants, $shoesize, $height,$weight)"; 


// $member = $pdo->prepare( $sql ); //先編譯好
// $member->bindValue(":mem_mail", $mem_mail); 
// $member->bindValue(":mem_pwd", $mem_pwd);
// $member->execute();//執行之

} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?> 
