<template>
	<!-- 會員 container -->
	<div class="mem_container">
		<!-- 側邊欄組件 -->
		<MemberSideMenu></MemberSideMenu>
		<!-- 右側會員資料-->
		<div class="mem_data">
			<p class="title">訂閱服務</p>
			<div class="data">
				<!-- 這裡開始寫 -->
				<div class="card">
					<div v-if="memsub==false" class="card-wrap">
						<div class="card-content">
						<h2>#BASIC</h2>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月專屬搭配一套
						</p>
						<span>上身* 1、下身*1、外套*1</span>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月諮詢造型師<span>1</span>次
						</p>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月免運費<span>1</span>次
						</p>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							商品<span>95</span>折優惠
						</p>
						<h3>NT$ <span>899</span>/月</h3>
						<button>立即訂閱</button>
                		</div>
						<div class="card-content">
						<h2>#STANDARD</h2>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月專屬搭配一套
						</p>
						<span>上身* 1、下身*1、外套*1</span>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月諮詢造型師<span>2</span>次
						</p>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月免運費<span>2</span>次
						</p>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							商品<span>9</span>折優惠
						</p>
						<h3>NT$ <span>1,899</span>/月</h3>
						<button>立即訂閱</button>
                		</div>
						<div class="card-content">
						<h2>#ULTRA</h2>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月專屬搭配一套
						</p>
						<span>上身* 1、下身*1、外套*1、鞋子*1</span>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月諮詢造型師<span>5</span>次
						</p>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月免運費
						</p>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							商品<span>8</span>折優惠
						</p>
						<h3>NT$ <span>3,999</span>/月</h3>
						<button>立即訂閱</button>
                		</div>
					</div>
					<div v-else class="card-wrap">
						<div class="card-sub">
							<h2>您的訂閱方案</h2>
							<p class="memlevel">#{{memlevel}}</p>
							<button>更改方案</button>
                		</div>
					</div>
					<button class="back">返回</button>
				</div>
				<div class="decoration">
					#PREMIUM
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Footer from "@/components/Footer.vue";
import MemberSideMenu from "@/components/MemberSideMenu.vue";
export default {
	name: "MemSubscriptionView",
	components: {
		MemberSideMenu
	},
	data(){
		return{
			memsub:true,
			memlevel:'ULTRA'
		}
	},
	created(){
		
	},
	computed:{
		
	},
	methods:{
		
	}
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
.mem_container{
	background-color: $bg_gray;
}
.data{
	position: relative;
	.card{
		width: auto;
		min-height: 600px;
		background-color: #fff;
		border: 1px solid $text_color;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		.back{
			right: 20px;
			bottom: 20px;
			position: absolute;
			align-self: flex-end;
			background: #fff;
			color: $main_color;
			padding: 8px 30px;
			border: 1px solid $main_color;
			&:hover{
				background-color: $bg_violet;
				color:$main_color;
			}
		}
		.card-wrap{
			display: flex;
			gap: 3%;
			
			.card-content{
				display: flex;
				flex-direction: column;
				align-items: center;
				gap: 2%;
				width: 250px;
				height: 300px;
				border: 1px solid rgb(194, 194, 194);
				padding: 20px;
				h2{
					color: $main_color;
					font-size: 32px;
					font-weight: bolder;
					margin: 15px;
				}
				h3{
					color:$title_color;
					font-size: 18px;
					font-weight: bold;
					margin: 20px;
				}
				p {
					color: $text_color;
					font-size: 14px;
				}
				span {
					font-size: 32px;
				}
				:first-child ~ span {
					font-size: 14px;
					font-weight: bold;
				}
				button{
					background: $main_color;
					color: white;
					padding: 8px 12px;
					border: 1px solid $main_color;
					&:hover{
						background-color: white;
						color:$main_color;
					}
				}
			}
		}
		
	}
	.decoration{
		left: 20px;
		bottom: 20px;
		font-size: 72px;
		font-weight: bolder;
		font-style: italic;
		position: absolute;
		color: $secondary;
	}
}

</style>
