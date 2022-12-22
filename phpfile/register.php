<?php
// 前台 會員註冊
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try {
// 註冊帳號
$mem_mail = $_POST["mem_mail"];
$mem_pwd = $_POST["mem_pwd"];
$mem_name = $_POST["mem_name"];
$bday = $_POST["bday"];

// 身形建置
$chest = $_POST["chest"];
$shoulder = $_POST["shoulder"];
$waistline = $_POST["waistline"];
$hip = $_POST["hip"];
$clothes = $_POST["clothes"];
$pants = $_POST["pants"];
$chest = $_POST["chest"];
$shoesize = $_POST["shoesize"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$errMsg = "";

$errMsg = "";
    require_once("../connectBooks.php");
    
    $sql = "INSERT INTO `member` (mem_mail, mem_pwd, mem_name, mem_bday, mem_date, chest, shoulder, waistline, clothes, pants) VALUES ($mem_mail, $mem_pwd, $mem_name, $bday, CURRENT_DATE(),$chest, $shoulder, $waistline, $clothes, $pants, $shoesize, $height,$weight)"; //''

    $member = $pdo->prepare( $sql ); //先編譯好
    // $member->bindValue(":mem_mail", $mem_mail); 
    // $member->bindValue(":mem_pwd", $mem_pwd);
    $member->execute();//執行之

} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?> 
