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
				<div class="item" v-for="item in order" :key="item.id">
					<div class="product">
						<img v-bind:alt="item.title">
						<div class="prod-detail">
							<p>{{item.title}}</p>
							<div class="spec">
								<p>{{item.color}}</p>
								<p>{{item.size}}</p>
								<p>${{item.price*item.count}}元</p>
							</div>
						</div>
					</div>
					<div class="count">
						<p>x{{item.count}}</p>
					</div>
				</div>
				</div>
				<div class="detail">
					<div>共 {{order.length}} 種商品</div>
					<div>{{vip_level[0].level_name}} 會員等級折扣: -${{parseInt(total*(1-vip_level[0].discount))}}</div>
					<div>總計: ${{parseInt(total*vip_level[0].discount)}}元</div>
				</div>
			</div>
		</div>	
	</div>
</template>

<script>
import {vip_level} from'@/assets/config/setting.js'
export default {
	name: "Product",
	components: {
	},
	data(){
		return{
			load: false,
			cart:[],
			count:[],
			order:[],
			min:0,
			max:0,
			memId:"a001",
			mem_name:"王小明",
			phone:"0912345678",
			mem_mail:"bj4@gmail.com",
			address:"320桃園市中壢區復興路46號9樓",
			mem_name1:"",
			phone1:"",
			mem_mail1:"",
			address1:"",
			vip_level:vip_level
		}
	},
	created(){
		this.getStorage();
	},
	computed:{
		total(){
			if(this.order.length>0){
				let total=0
				for(const index in this.order){
					total+=this.order[index]['count']*this.order[index]['price']
				}
				console.log(total);
				return parseInt(total)
			}else{
				return 0
			}
		}
	},
	methods:{
		check(){
			this.isChecked = !this.isChecked;
			console.log(this.isChecked);
			if(this.isChecked == true){
				this.mem_name1 = this.mem_name;
				this.phone1 = this.phone;
				this.mem_mail1 = this.mem_mail;
				this.address1 = this.address;
				console.log(this.mem_name1);
			}else{
				this.mem_name1 = "";
				this.phone1 = "";
				this.mem_mail1 = "";
				this.address1 = "";
			}
		},
		getStorage(){
			let data =localStorage.getItem('cart');
			data=JSON.parse(data)
			this.order=data? data:[]
        },
	}
};
</script>
<style lang="scss" scoped>
	h2{
		font-size: 16px;
		color: $title_color;
		margin: 20px;
		margin-bottom: 0px;
		@include m{
			font-size: 24px;
			color: $title_color;
			margin-bottom: 20px;
		}
	}
	input{
		height: 15px;
	}
	.checkout{
		flex-direction: column-reverse;
		height: 100%;
		@include m{
			margin: 20px 100px 100px 100px;
			height: 900px;
			flex-direction: row;
		}
		display: flex;
		justify-content: center;
		margin-top: 25px;
		gap: 5%;
		.paydetails{
			display: flex;
			flex-direction: column;
			min-width: 55%;
			@include l{
				min-width: 50%;
			}
			button{
				align-self: right;
				margin-top: 20px;
				background: $main_color;
				color: white;
				padding: 8px 12px;
				border: 1px solid $main_color;
				margin-bottom: 50px;
				&:hover{
					background-color: white;
					color:$main_color;
				}
			}
			.paytetails-wrap{
				display: flex;
				flex-direction: column;
				gap:20px;
				height: 450px;
				overflow-y: scroll;
                scrollbar-width: auto;
                scrollbar-color: #4673fb #ffffff;
                &::-webkit-scrollbar {
                    width: 14px;
                }
                &::-webkit-scrollbar-track {
                    background: #ffffff;
                }       
                &::-webkit-scrollbar-thumb {
                    background-color: rgb(194, 194, 194);
                    border-radius: 10px;
                    border: 3px solid #ffffff;
                }
				border: 1px solid $text_color;
				padding: 20px;
				margin: 20px;
				@include m{
					margin:0px;
				}
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
				margin: 20px;
				font-size: 12px;
				@include m{
					margin: 0px;
					font-size: 16px;
				}
				.items{
					height:450px;
					overflow-y: scroll;
					scrollbar-width: auto;
					scrollbar-color: #4673fb #ffffff;
					&::-webkit-scrollbar {
						width: 14px;
					}
					&::-webkit-scrollbar-track {
						background: #ffffff;
					}       
					&::-webkit-scrollbar-thumb {
						background-color: rgb(194, 194, 194);
						border-radius: 10px;
						border: 3px solid #ffffff;
					}
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
							width: 65px;
							height: 85px;
							@include m{
								width: 130px;
								height: 170px;
							}
						}
							.prod-detail{
								display: flex;
								flex-direction: column;
								gap:10px;
								width:150px;
									@include m{

									}
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
