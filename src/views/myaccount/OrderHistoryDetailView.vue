<template>
	<p class="title">#訂單紀錄細項</p>
	<router-view/>
	<div class="data">
		<div class="Ordh_container"><!-- 訂單紀錄容器盒 -->
			<div v-for="e in orders" :key="e.order_id" class="ord_detail_container">
				<h3 class="ord_title">訂單詳情</h3>
				<div class="ord_detail">
					<div class="ord_condition">
						<p>訂單編號：</p>
						<p>{{e.order_id}}</p>
					</div>
					<div class="ord_condition">
						<p>訂單狀態：</p>
						<p>{{e.order_con}}</p>
					</div>
					<div class="ord_condition">
						<p>收件人：{{e.ord_mem}}</p>
						<p>電話：{{e.ord_phone}}</p> 
						
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
						<p>送件地址：{{e.ord_addr}}</p>
						
					</div>
				
				</div>
			</div>
			
			<div class="ord_recipt">
				<h3 class="ord_title">訂單明細</h3>
					<div v-for="e in order_item" :key="e.order_item_id" class="prod_item_row"><!-- 訂單商品列 -->
						<img class="prod_pic" src="https://cf.shopee.tw/file/df4b87d6f94bb46bff2b209ed4047c27_tn" alt="">
						<div class="item_name">{{e.product_id}}</div>
						<div class="item_name">${{e.item_price}}</div>
						<div class="item_name">{{e.size}}</div>
						<div class="item_name">X {{e.quantity}}</div>
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
				<button class="btn_ms">取消</button>
				<button class="btn_ml">送出</button>
			</div>
				</div>
			</div>
		</div>
	</div>
	<div class="order_back">
		<router-link to="/MyPage/OrderHistory"><!-- 返回鍵 -->
			<button class="btn_l">返回</button>
		</router-link>
	</div>
</template>

<script>
import { BASE_URL } from '../../assets/js/common.js'
import Button from "@/components/Button.vue";
export default {
	name: "OrderHistoryDetail",
	components: {
		Button
	},
	data(){
		return{
			orders:[],
			order_item:[],//要符合資料庫表單名稱

		}
	},
	methods:{
		getResource() {
        this.axios.get(`${BASE_URL}/getOrderDetail.php`).then((response) => {
			console.log(response.data);
			this.orders = response.data;
			this.order_item = response.data;
            });
        },
	},
	mounted() {
    	this.getResource();
    },

};
</script>

<style lang="scss" scoped>
.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}

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
	background-color: $second_color;
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
