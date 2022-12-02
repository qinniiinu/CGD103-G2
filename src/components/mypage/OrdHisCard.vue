<template>
	<li class="item_num">
		<!-- 訂單記錄列 -->
		<div class="row">
			<div class="title">訂單編號： {{ order1.ord_num }}</div>
			<h2>{{ order1.ord_condtion }}</h2>
		</div>
		<div class="page_photo">
			<div class="box">
				<div class="item_page_photo">
					<img :src="order1.img_link[1]" alt="" />
				</div>
				<div class="item_page_photo">
					<img :src="order1.img_link[1]" alt="" />
				</div>
			</div>
			<div class="item_money">
				<p>共{{ order1.item_product }}件商品</p>
				<h2>訂單金額 ${{ order1.sum_price }}</h2>
			</div>
		</div>
	</li>
</template> 

<script>
export default {
	name: "OrdHisCard",
	props: {
		ord_num: String,
		ord_condtion: String,
		item_product: String,
		sum_price: String,
	},
	components: {
	},
	data() {
		return {
			order1:{
				ord_num:1201201,
				ord_condtion:"已出貨",
				img_link:["./style1.png","./style2.png"],
				item_product:2,
				sum_price:888,
			},
			order2:{
				ord_num:1201202,
				ord_condtion:"未出貨",
				img_link:["./style3.png","./style4.png"],
				item_product:2,
				sum_price:999,
			}
		}
	},
};
</script>

<style lang="scss" scoped>
*{list-style: none;}
.item_num{
	width: max-width;
	height: min-content;
	margin: 20px 0;
	padding: 20PX;
	border: 1px solid gray;
	background-color: $third_color;
	.row{
		display: flex;
		justify-content: space-between;
		h2{
			font-weight: bold;
			font-size: 20px;
		}
	}
	.page_photo{
		display: flex;
		align-items: flex-end;
		justify-content: space-between;
		.box{
			display: flex;
			.item_page_photo{
				width: 120px;
				height: 120px;
				display: flex;
				img{
					width: 100%;
					height: 100%;
					object-fit: cover;
				}
			}
		}
		.item_money{
			text-align: right;
			// p{
			// 	// margin: 10px;
			// }
			h2{
				// margin: 10px;
				font-weight: bold;
				font-size: 18px;
			}
		}
	}

}
</style>
