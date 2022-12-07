<template>
	<!-- 會員 container -->
	<div class="mem_container">
		<!-- 側邊欄組件 -->
		<MemberSideMenu></MemberSideMenu>
		<!-- 右側會員資料-->
		<div class="mem_data">
			<p class="title">#訂單紀錄細項</p>
			<router-view/>
			<div class="data">
				<div class="Ordh_container"><!-- 訂單紀錄容器盒 -->
					<div class="ord_detail_container">
						<h3 class="ord_title">訂單詳情</h3>
						<div class="ord_detail">
							<div class="ord_condition">
								<p>訂單編號：</p>
								<p>21157867866</p>
							</div>
							<div class="ord_condition">
								<p>訂單狀態：</p>
								<p>已出貨</p>
							</div>
							<div class="ord_condition">
								<p>收件人：</p>
								<p>王曉明 0935141735</p>
							</div>
						</div>
						<div class="ord_detail_second_row">
							<div class="ord_condition">
								<p>物流狀態：</p>
								<p><a href="">
									前往物流公司查看
								</a></p>
							</div>
							<div class="ord_condition">
								<p>送件地址：</p>
								<p>210 桃園市中壢區復興路424號</p>
							</div>
						
						</div>
					</div>
					
					<div class="ord_recipt">
						<h3 class="ord_title">訂單明細</h3>
					<div class="prod_item_row">
						<img class="prod_pic" src="https://cf.shopee.tw/file/df4b87d6f94bb46bff2b209ed4047c27_tn" alt="">
						<div class="item_name">經典夏威夷草裙</div>
					
							<div class="item_name">$700</div>
							<div class="item_name">L</div>
						
						<div class="item_name">x20</div>
					</div>
					<div class="prod_item_row">
						<img class="prod_pic"  src="https://cf.shopee.tw/file/df4b87d6f94bb46bff2b209ed4047c27_tn" alt="">
						<div class="item_name">經典夏威夷草裙</div>
						<div class="item_name">$700</div>
						<div class="item_name">L</div>
						<div class="item_name">x20</div>
					</div>
					<div class="sum_money">
						<div class="money_detail">
							<li class="money_word">共2件 商品金額 $8888</li>
							<li class="money_word">折扣 $8888</li>
							<li class="total_money">訂單總額$12666</li>
						</div>
					</div>
				</div>

					<div class="ord_msg">
						<h2 class="ord_title">訂單留言</h2>
						<div class="ord_msg_box">
							<div class="msg_title">
								<h4>你的留言紀錄</h4> 
								<div class="msg_time">留言時間：20201231 23:59</div>
							</div>
							<h3>
								我希望可以多了解一下自己的穿衣風格
							</h3>
							
						</div>
						<div class="ord_msg_box">
							<div class="msg_title">
								<h4>客服回覆狀態</h4> 
								<div class="msg_time">回覆時間：20201231 23:59</div>
							</div>
							<h3>
								你打扮的已經不錯了，但是從我的角度，你可以再做以下幾點修正<div class=""></div>
							</h3>
						</div>
						<div class="ord_msg_box">
							<div class="msg_title">
								<h3>您的留言</h3> 
							</div>
							<input class="text_box" type="textarea" placeholder="親愛的客人歡迎在此留言詢問問題">
							<div class="msg_button_container">
						<button class="sm-b">取消</button>
						<button class="sm-b">送出</button>
					</div>
						</div>
					</div>
				</div>
			</div>
			<div class="order_back">
				<router-link to="/MyPage"><!-- 返回鍵 -->
					<button>返回</button>
				</router-link>
			</div>
		</div>
	
	</div>
	<Footer></Footer>
</template>

<script>

import Button from "@/components/Button.vue";
import MemberSideMenu from "@/components/MemberSideMenu.vue";
export default {
	name: "OrderHistoryDetail",
	components: {
    
		MemberSideMenu,
		Button
	},
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/main.scss";
@import "@/assets/sass/member_side_menu";

@mixin b() {
	@media screen and (max-width: 1023px) {
		@content;
	}
}
.mem_container .mem_data{
	@include b() {
		padding: 0%;
	}
}

.Ordh_container{
	width: 90%;
	margin: auto;

}


.ord_detail_container{
	width: 100%;
	background-color:$second_color;
	border:1px solid rgb(162, 162, 162) ;
	p{
		text-align: left;
		font-size: 16px;	}
@include b(){
	display: block;
	border: 0;
}

}

.ord_title{
	color: #444;
	font-weight: bold;
	
}

.ord_detail{
	display: flex;
	width: 100%;
	justify-content: flex-start;
	@include b(){
	display: block;
}

}

.ord_detail_second_row{
	display: flex;
	width: 100%;
	justify-content: flex-start;
	@include b(){
	display: block;
}

}

p{
	margin: 5px;
	color: #444;
	font-size: 12px;
}
.ord_condition{
	display: flex;
	margin: 10px;
}

/* 訂單明細 */
.ord_recipt{
	width: 100%;
	margin-top: 50px;
	background-color:$second_color;
	border:1px solid rgb(162, 162, 162) ;
	@include b(){
	display: block;
	border: 0;
}
}

.prod_item_row{
	margin: 50px;
	width: 80%;
	display: flex;
	justify-content: space-around;
	@include b(){
	display: block;
	}
	// .item_block{
	// 	@include b(){
	// display:flex;
	// justify-content: space-between;
	// }
	// }
}
.prod_pic{
	width: 100px;
	height: 100px;
	margin: 20px;
}

.item_name{
	margin: 20px;
	color: #444;
}

.prod_item_row{
	// display: flex;
	align-items: center;
}
.sum_money{
	width: 100%;
	display: flex;
	justify-content:right ;
	list-style: none;
}

li{
	margin: 20px;
	color: #444;
}
.money_detail{
	text-align: right;}

/* 訂單留言 */
.ord_msg{
	width: 100%;
	background-color:$bg_violet;
	background-color:$second_color;
	border:1px solid rgb(162, 162, 162) ;
	margin-top: 50px;
	.ord_msg_box{
		margin-top:50px ;
	}
	@include b(){
	display: block;
	border: 0;
}

}




.text_box{
	width: 90%;
	margin: auto;
	height: 200px;
	margin-bottom: 30px;

	.text_box:last-child{
		height: 100px;
	}
}

.msg_title{
	width: 100%;
	display: flex;
}

h3{
	color: #444;
	margin: 5px;
}

.msg_time{
	margin-left: 30px;
	color:#444;
}

.msg_button_container{
	display: flex;
	justify-content: right;
	margin: 10px;

}

.sm-b{
	margin: 20px;
	height: 50px;
	width: 100px;
	display: flex;
	justify-content: center;
	align-items: center;
	margin-right: 20px;
}
.order_back{
	display: flex;
	width: 90%;
	justify-content: right;

	
	
}

</style>
