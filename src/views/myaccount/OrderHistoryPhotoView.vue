<template>
	
	<!-- 會員 container -->
	<div class="mem_container">
		<!-- 側邊欄組件 -->
		<MemberSideMenu></MemberSideMenu>
		<!-- 右側會員資料-->
		<div class="mem_data">
			<p class="title">#訂單紀錄</p>
			<router-view/>
			<div class="data">
				<div class="Ordh_container"><!-- 訂單紀錄容器盒 -->
					<div class="ord_condition_box"><!-- 右上角功能盒 -->
						<select class="ord_sel" name="" id="">
							<option>訂單狀態</option>
								<option>已出貨</option>
								<option>運送中</option>
								<option>尚未出貨</option>
						</select>
						<div class="ham">
							<router-link  to="/OrderHistory"><font-awesome-icon icon="fa-solid fa-list" /></router-link>

						</div>
					</div>
					
					<div class="ord_history_box"><!-- 訂單記錄表單盒 -->
					
					
						<li v-for="item in product" :key="item.id" class="item_num" >
						<div class="item_num_row">
							<div class="item_num_title">訂單編號： {{item.ord_num}}</div>
							<h2>{{item.ord_condtion}}</h2>
						</div>

						<div class="page_photo">
							<div class="page_photo_box">
								<div class="item_page_photo">
								<img :src="item.img_link" alt="">
							</div>
							<div class="item_page_photo">
								<img :src="item.img_link" alt="">
							</div>
							</div>
							
							<div class="item_money">
								<p>共{{item.item_product}}件商品</p>
								<h2>訂單金額 ${{item.sum_price}}</h2>
							</div>
						</div>
					</li>
					
					
					</div>

					<div class="order_history_bottom">
						<div class="order_title">#ORDER</div><!-- 左下角大字 -->
						<div class="order_back">
							<a href="#"><!-- 返回鍵 -->
								<button>返回</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<Footer></Footer>
</template>





<script>

import Button from "@/components/Button.vue";
import MemberSideMenu from "@/components/MemberSideMenu.vue";
export default {
	name: "OrderHistoryPhoto",
	components: {
    
		MemberSideMenu,
		Button
	},
	data() {
		return {
			product:[
				{
					id:1,
					ord_num:1201201,
			        ord_condtion:"已出貨",
					img_link:"./style1.png",
					item_product:2,
			        sum_price:8888,
				},
				{
					id:2,
					ord_num:1201201,
			        ord_condtion:"已出貨",
					img_link:"./style1.png",
					item_product:2,
			        sum_price:8888,
				},
				{
					id:3,
					ord_num:1201201,
			        ord_condtion:"已出貨",
					img_link:"./style1.png",
					item_product:2,
			        sum_price:8888,
				},
			],
		
		

		}
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

*{
	list-style: none;
}

.data{
	padding: 0;
}
.Ordh_container{
	width: 100%;
	outline: solid 1px gray;
	.ord_condition_box{
	width: 100%;
	display: flex;
	justify-content: right;
	}
	@include b() {
		outline:none;
      }

	
	.item_money{
	text-align: right;
	}
}


.ord_sel{
	margin: 10px;
	
}


.ham{
	cursor: pointer;
	margin: 10px;
	margin-right:7%;

}

.ord_history_box{
	outline: solid 1px gray;
	background-color: $bg-violet;
	width: 90%;
	height: 50vh;
	margin: 50px;
	padding-bottom: 50px;
	overflow:scroll;
	// display: flex;
	justify-content: center;
	@include b() {
		outline:none;
		width: 100%;
		margin: 0px;
      }
	.item_num{
	width: 90%;
	margin: 20px;
	background-color: $third_color;
	

	.page_photo{
		display: flex;
		width: 100%;
		justify-content: space-between;
		align-items: flex-end;
		.page_photo_box{
			display: flex;
		}
		.item_money{
		margin: 10px;
		text-align: right;
		p{
			margin: 10px;
		}
		h2{
			margin: 10px;
			font-weight: bold;
			font-size: 18px;
		}
}

	}
	.item_page_photo{
		width: 150px;
		height: 200px;
		overflow: hidden;
		padding: 20px;
		display: flex;
		}
	}
	
	.item_num_row{
		display: flex;
		justify-content: space-between;
		width:100%;
		.item_num_title{
			margin: 20px;
		}
		h2{
			font-weight: bold;
			font-size: 20px;
			margin: 20px;
		}
		
	}

}




.order_history_bottom{
	width: 90%;
	display: flex;
	justify-content: space-between;
	margin: 50px;
	.order_title{
	color:$bg-violet;
	text-align: left;
	@include font_set($second_font, $null, 900, italic);
	@include s() {
	font-size: 56px;
	}
	@include m() {
		font-size: 96px;
	}
	}
	
}

.transport_detail{

font-weight:bold ;
color: $main_color;
text-decoration: underline;

}
</style>
