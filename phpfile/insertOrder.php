<?php
    // //跨域(正式開發不能這樣)
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    $json = file_get_contents("php://input");
    $datas = json_decode($json, true);
    var_dump($json); echo "-------";
    var_dump($datas); exit();
    // if(empty($datas)){
    //     $errMsg = "QQ,wrong";
    //     echo echo json_encode(["msg"=>$errMsg]);
    // }else{
        $mem_id=$datas["mem_id"];
        $total=$datas["total"];
        $discount=$datas["discount"];
        $order_paid=$datas["ord_paid"];
        $ord_addr=$datas["ord_addr"];
        $ord_mem=$datas["ord_mem"];
        $ord_phone=$datas["ord_phone"];
        try{
            $msg="success";
            $errMsg = "";
            

            require_once("../connectBooks.php");

            $sql1 = "INSERT INTO orders (order_con,order_time,mem_id,emp_id,total,discount,order_paid,ord_addr,ord_mem,ord_phone)
            VALUES (2,CURRENT_TIMESTAMP(),:mem_id,101,:total,:discount,:ord_paid,:ord_addr,:ord_mem,:ord_phone);";

            $orders = $pdo->prepare($sql1);
            // $orders->bindValue(":order_con",2);
            $orders->bindValue(":mem_id",$mem_id);
            // $orders->bindValue(":emp_id",101);
            $orders->bindValue(":total",$total);
            $orders->bindValue(":discount",$discount);
            $orders->bindValue(":ord_paid",$order_paid);
            $orders->bindValue(":ord_addr",$ord_addr);
            $orders->bindValue(":ord_mem",$ord_mem);
            $orders->bindValue(":ord_phone",$ord_phone);
            $orders->execute(); //執行之
            $orderRow = $orders->fetch(PDO::FETCH_ASSOC);
            // $pdo->commit(); //提交交易

            if ($orders->rowCount() > 0) { 
                $msg = "訂單成功";

                $order_id = $pdo->last_insert_id(); //最新那筆
                $sql2 = "INSERT INTO order_item (order_id,product_id,quantity,item_price,size,color)
                VALUES (:ord_id,:product_id,:quantity,:item_price,:size,:color);";
                $order_item=$pdo->prepare($sql2);

                foreach($datas["order"] as $i=>$item){
                    $order_item->bindValue(":ord_id",$order_id);
                    $order_item->bindValue(":product_id",$item["id"]);
                    $order_item->bindValue(":quantity",$item["count"]);
                    $order_item->bindValue(":item_price",$item["price"]);
                    // $order_item->bindValue(":item_total",$item["count"]*$item["price"]); //這個怎麼辦(?)
                    $order_item->bindValue(":size",$item["size"]);
                    $order_item->bindValue(":color",$item["color"]);
                    $order_item->execute(); //執行之
                }
            }else{
                $errMsg = "失敗";
                echo json_encode(["msg" => $errMsg]);
            }
        } catch (PDOException $e) {
            $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
            $errMsg .= "行號 : ".$e -> getLine()."<br>";
            echo json_encode(["msg"=>$errMsg]);
        }
    // }
    // if ($datas !== null && isset($datas["mem_id"])) {
    
    // }else{
    //     $errMsg="QQ,wrong"
    //     echo json_encode(["msg"=>$errMsg]);
    // }
?>