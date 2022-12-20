<!-- 前台 判斷會員登入狀態，若已登入 => 取得 SESSION 中的會員資料，
    尚未登入 => 跳轉至登入頁 -->
    <?php
    if (isset($_SESSION['member'])) { // 會員已登入
        //取得會員資料
        $member = $_SESSION['member'];
        // 設定回應標頭
        header('Content-Type: application/json');
        // 將會員資料輸出為 JSON 格式
        echo json_encode($member);
        exit();
    }
    else{//尚未登入，
        header('Location:/login');
    }
?> 
