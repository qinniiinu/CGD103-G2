<template>
	<p class="title">#訂單紀錄</p>
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
					<router-link  to="/OrderHistoryPhoto">	<font-awesome-icon icon="fa-solid fa-clipboard" />	</router-link>
					
				</div>
			</div>
			<div class="ord_history_box"><!-- 訂單記錄表單盒 -->
				
				<ul class="ord_history_toplist"><!-- 最上方選單 -->
					<li class="ord_history_toplist_title">
						<p>訂購日期</p>
					</li>
					<li class="ord_history_toplist_title">
						<p>訂單編號</p>
					</li>
					<li class="ord_history_toplist_title">
						<p>金額</p>
					</li>
					<li class="ord_history_toplist_title">
						<p>訂單狀態</p>
					</li>
					<li class="ord_history_toplist_title" id="Q" >
						<p>訂單問題</p>
					</li>
					<li class="ord_history_toplist_title" id="C" >
						<p>物流狀態</p>
					</li>
				</ul>
				<ul class="ord_history_content"><!-- 選單內容加scroll bar -->
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
					<li class="ord_history_content_word">
						<router-link to="/OrderHistoryDetail">
						<ul class="content_row">
							<li class="ord_history_content">20221202</li>
							<li class="ord_history_content">20221202001</li>
							<li class="ord_history_content">$8888</li>
							<li class="ord_history_content">已出貨</li>
							<li class="ord_history_content" id="Q" >
								<a class="transport_detail" href="">聯繫客服</a>
							</li>									
							<li class="ord_history_content" id="C" >
								<a class="transport_detail" href="">物流詳情</a>
							</li>
						</ul>
					</router-link>
					</li>
				</ul>
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
</template>

<script>
import Button from "@/components/Button.vue";
export default {
	name: "OrderHistory",
	components: {    
		Button
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
.body{
	@include b() {
		p{
			font-size: 12px;
		} 
	}
}
.Ordh_container{
	width: 100%;
	outline: solid 1px gray;
	.ord_condition_box{
	display: flex;
	justify-content: right;
	}
	@include b() {
		outline:none;
      }
	

}

.ord_sel{
	margin: 10px;
	
}

.ham{
	cursor: pointer;
	margin: 10px;
	margin-right:7%;
	@include b() {
		display:none;
      }
}

.ord_history_box{
	outline: solid 1px gray;
	width: 90%;
	height: 50vh;
	margin: auto;
	padding-bottom: 10%;
	overflow:scroll;
	@include b() {
		width: 100%;     
		outline: none; 
	}
}
.ord_history_toplist{
	display: flex;
	justify-content: center;
	width: 80%;
	padding-left: 10%;
	@include b() {
		width: 100%;  
		padding-left: 0%;
	}
}

#C{
	@include b() {
	display: none;
	}
}

#Q{
	@include b() {
	display: none;
	}
}

.ord_history_toplist_title{
	margin: 4%;
}

.content_row{
	width: 100%;
	display: flex;
	justify-content: center;
	outline: solid 1px gray;
	margin-bottom: 20px;
	@include b() {
		width: 100%;     
		outline: none; 
	}
	&:hover{
            background-color:$second_color;
            color: $main_color ;
            cursor: pointer;
        }

}

.ord_history_content{
	margin: 3%;
	color: #444;
	justify-content: center;
	cursor: pointer;
	
}

.order_history_bottom{
	width: 100%;
	display: flex;
	justify-content: space-around;

}
.order_title{
	color:$bg_violet;
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
