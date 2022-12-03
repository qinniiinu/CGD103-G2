<template>
	<div class="checkout">
		<div class="paydetails">
			<h2>結帳</h2>
			<div class="paytetails-wrap">
				<div class="delivery">
					<h4>配送資訊</h4>
					<p>配送方式</p>
					<select name="" id="">
						<option value="hDelivery">宅配</option>
						<option value="sPickup">超商取貨</option>
					</select>
				</div>
				<div class="buyer">
					<h4>購買人資訊</h4>
					<p>姓名</p>
					<input class="memName" type="text" v-model="mem_name">
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="phone">
					<p>電子信箱</p>
					<input class="email" type="text" v-model="mem_mail">
					<p>聯絡地址</p>
					<input class="address" type="text" v-model="address">
				</div>
				<div class="receiver">
					<h4>收件人資訊</h4>
					<p>姓名</p>
					<input class="mem_name" type="text" v-model="mem_name1">
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="phone1">
					<p>電子信箱</p>
					<input class="email" type="text" v-model="mem_mail1">
					<p>配送地址</p>
					<input class="receive-address" v-model="address1">
					<label class="same" for="same"><input type="checkbox" id="same" @click="check()" >同購買人資訊</label>
				</div>
				<div class="payment">
					<h4>付款方式</h4>
					<select name="" id="">
						<option value="hDelivery">信用卡線上刷卡</option>
						<option value="sPickup">貨到付款</option>
					</select>
				</div>
			</div>
			<button>完成訂購</button>
		</div>
		<div class="list">
			<h2>購物車</h2>
			<div class="list-wrap">
				<div class="items">
				<div class="item" v-for="(item,index) in product" :key="item.id">
					<div class="product">
						<img :src="item.image" v-bind:alt="item.title">
						<div class="prod-detail">
							<p>{{item.title}}</p>
							<div class="spec">
								<p>{{item.color}}</p>
								<p>{{item.size}}</p>
								<p>${{item.price}}元</p>
							</div>
						</div>
					</div>
					<div class="count">
						<p>x1</p>
					</div>
				</div>
				</div>
				<div class="detail">
					<div>共 {{product.length}} 件商品</div>
					<div>{{memLevel}} 會員等級折扣: -429$</div>
					<div>總計: $8151元</div>
				</div>
			</div>
		</div>	
	</div>
</template>

<script>

export default {
	name: "Product",
	components: {
	},
	data(){
		return{
			load: false,
			source:[],
			count:[],
			order:[],
			min:0,
			max:0,
			memLevel:'BASIC',
			discount:0.05,
			product:[
			//產品資訊
			{
			id: 1,
			image: "https://nb.scene7.com/is/image/NB/m990gl5_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=472&hei=472",
			title: "Newbalance鞋",
			color: "灰色",
			size: "23cm",
			price: 7990,
			},
			{
			id: 2,
			image: "https://pics.pzcdn.tw/pazzo/ProductBasics/f06d3568-2bd1-4b9c-9f9e-aef3dcceed16.jpg",
			title: "帆布袋",
			color: "米色",
			size: "F",
			price: 590,
			},
			],
			memId:"a001",
			mem_name:"王小明",
			phone:"0912345678",
			mem_mail:"bj4@gmail.com",
			address:"320桃園市中壢區復興路46號9樓",
			mem_name1:"",
			phone1:"",
			mem_mail1:"",
			address1:""
		}
	},
	created(){
	},
	computed:{
	},
	methods:{
		check(){
			this.mem_name1 = this.mem_name;
			this.phone1 = this.phone;
			this.mem_mail1 = this.mem_mail;
			this.address1 = this.address;
			console.log("mem_name1",this.mem_name1);
		}
	}
};
</script>
<style lang="scss" scoped>
	h2{
		font-size: 24px;
		color: $title_color;
		margin-bottom: 20px;
	}
	input{
		height: 15px;
	}
	.checkout{
		width: 1200px;
		height: 900px;
		display: flex;
		justify-content: center;
		margin: auto;
		margin-top: 25px;
		gap: 5%;
		.paydetails{
			display: flex;
			flex-direction: column;
			width: 100%;
			button{
				align-self: right;
				margin-top: 20px;
				background: $main_color;
				color: white;
				padding: 8px 12px;
				border: 1px solid $main_color;
				&:hover{
					background-color: white;
					color:$main_color;
				}
			}
			.paytetails-wrap{
				display: flex;
				flex-direction: column;
				gap:20px;
				height: 650px;
				border: 1px solid $text_color;
				padding: 20px;
				p{
					font-size: 14px;
					color: $text_color;
				}
				.delivery,.payment,.buyer,.receiver{
					display: flex;
					flex-direction: column;
					gap: 8px;
				}
				.same{
					font-size: 14px;
				}
			}
		}
		.list{
			width: 100%;
			display: flex;
			flex-direction: column;
			.detail{
				display: flex;
				flex-direction: column;
				gap: 5px;
				align-self: flex-end;
				text-align: right;
			}
			.list-wrap{
				display: flex;
				flex-direction: column;
				.items{
					height:450px;
					overflow-y: scroll;
					margin:20px 0;
					display: flex;
					flex-direction: column;
					border-top: 1px solid $text_color;
					border-bottom: 1px solid $text_color;
					.item{
						display: flex;
						gap:5px;
						justify-content: space-between;
						align-items: center;
						padding: 15px;
						border-bottom: 1px solid $text_color;
						&:last-child{
							border: none;
						}
						.product{
							display: flex;
							gap: 10px;
							img{
								width: 150px;
								height: 150px;
							}
							.prod-detail{
								display: flex;
								flex-direction: column;
								gap:10px;
								width:200px;
								.spec{
									display: flex;
									justify-content: space-between;
								}
								:last-child{
									text-align: right;
								}
							}
						}
					}
				}
			}
		}
	}
</style>
