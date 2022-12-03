<template>
	<li class="item" v-for="order in orders" :key="order.order_id">
		<!-- 訂單記錄列 -->
		<div class="row">
			<div class="title">訂單編號： {{ order.order_id }}</div>
			<!-- 訂單狀態 -->
			<h2>{{ order.order_con[2] }}</h2>
		</div>
		<div class="photo_money">
			<!-- 商品圖 * 2 -->
			<div class="photos">
				<div class="photo">
					<img :src="order.product_pic[0]" alt="" />
				</div>
				<div class="photo">
					<img :src="order.product_pic[1]" alt="" />
				</div>
			</div>
			<!-- 商品數 + 金額 -->
			<div class="item_money">
				<span class="allitem">共{{ order.quantity }}件商品</span>
				<span class="allprice">訂單金額 ${{  order.total }}</span>
			</div>
		</div>
	</li>
</template> 

<script>
export default {
	name: "OrdHisCard",
	props: {
		order_id: String,
		order_con: String,
		quantity: String,
		total: String,
	},
	components: {
	},
	data() {
		return {
			orders:[
			{
				order_id:1201201,
				"order_con":{
					"0":"取消",
					"1":"未確認",
					"2":"備貨中",
					"3":"已出貨"
				},
				product_pic:["./style1.png","./style2.png"],
				quantity:2,
				total:888
			},
			{
				order_id:1201202,
				order_con:{
					"0":"取消",
					"1":"未確認",
					"2":"備貨中",
					"3":"已出貨"
				},
				product_pic:["./style1.png","./style2.png"],
				quantity:2,
				total:888
			},
			{
				order_id:1201202,
				order_con:{
					"0":"取消",
					"1":"未確認",
					"2":"備貨中",
					"3":"已出貨"
				},
				product_pic:["./style1.png","./style2.png"],
				quantity:2,
				total:888
			},
			{
				order_id:1201202,
				order_con:{
					"0":"取消",
					"1":"未確認",
					"2":"備貨中",
					"3":"已出貨"
				},
				product_pic:["./style1.png","./style2.png"],
				quantity:2,
				total:888
			},
			{
				order_id:1201202,
				order_con:{
					"0":"取消",
					"1":"未確認",
					"2":"備貨中",
					"3":"已出貨"
				},
				product_pic:["./style1.png","./style2.png"],
				quantity:2,
				total:888
			},
			{
				order_id:1201202,
				order_con:{
					"0":"取消",
					"1":"未確認",
					"2":"備貨中",
					"3":"已出貨"
				},
				product_pic:["./style1.png","./style2.png"],
				quantity:2,
				total:888
			},
			]
			
		}
	}
}
</script>

<style lang="scss" scoped>
*{list-style: none;}
.item{
	width: max-width;
	height: min-content;
	margin-block: 20px;
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
	.photo_money{
		display: flex;
		align-items: flex-end;
		justify-content: space-between;
		.photos{
			display: flex;
			gap: 20px;
			.photo{
				max-width: 120px;
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
			.allitem{
				display: block;
				font-size: 14px;
			}
			.allprice{
				margin-top: 10px;
				display: block;
				font-weight: bold;
				font-size: 18px;
			}
		}
	}

}
</style>
