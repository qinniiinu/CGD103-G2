<?php
	//跨域
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");

  require_once("../connectBooks.php");
  $sql = "SELECT p.product_id,c.combo_id,p.product_name,p.unit_price,p.product_pic,p.product_text FROM product p JOIN combo_item c ON p.product_id=c.product_id; ";
  $product = $pdo->query($sql);
  $productRows = $product->fetchAll();
  $data = [];
  foreach ($productRows as $productRow) {
      $data[] = $productRow;
  }
  echo json_encode($data);
?>