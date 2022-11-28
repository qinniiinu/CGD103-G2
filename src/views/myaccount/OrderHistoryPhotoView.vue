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
					<li class="item_num" ><!-- 訂單記錄列 -->
						<div class="item_num_row">
							<div class="item_num_title">訂單編號 20221202001</div>
							<h2>已出貨</h2>
						</div>
						<div class="item_page_photo">
							<img src="" alt="">
							<img src="" alt="">
						</div>
						<div class="item_money">
							<p>共兩件商品</p>
							<h2>訂單金額 $8888</h2>
						</div>
						
					</li><!-- 訂單記錄 -->
	
						
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
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/main";
@import "@/assets/sass/member_side_menu";

.Ordh_container{
	width: 100%;
	outline: solid 1px gray;
}

.ord_condition_box{
	width: 100%;
	display: flex;
	justify-content: right;
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
	width: 90%;
	height: 50vh;
	margin: 50px;
	padding-bottom: 50px;
	overflow:scroll;
	display: flex;
	justify-content: center;
}

.item_num{
	width: 100%;
	outline: 1px solid red;
margin: 20px;
}

.item_num_row{
	display: flex;
	justify-content: space-between;
	width: 100%;
}


.order_history_bottom{
	width: 100%;
	display: flex;
	justify-content: space-around;
}
.order_title{
	color:rgb(195, 195, 195);
	@include font_set($second_font, $null, 900, italic);
	@include s() {
	font-size: 56px;
	}
	@include m() {
		font-size: 96px;
	}
	}
.transport_detail{

font-weight:bold ;
color: $main_color;
text-decoration: underline;

}
</style>
