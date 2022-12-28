<template>
	<div class="checkout">
		<form class="paydetails" @submit.prevent="orderSubmit()">
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
					<input class="memName" type="text" v-model="subMemInfo.mem_name" disabled>
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="subMemInfo.phone" disabled>
					<p>聯絡地址</p>
					<input class="address" type="text" v-model="subMemInfo.address" disabled>
				</div>
				<div class="receiver">
					<h4>收件人資訊</h4>
					<p>姓名</p>
					<input class="mem_name" type="text" v-model="ord_mem">
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="ord_phone">
					<p>配送地址</p>
					<input class="receive-address" v-model="ord_addr">
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
			<button type="submit">完成訂購</button>
		</form>
		<div class="list">
			<h2>購物車</h2>
			<div class="list-wrap">
				<div class="items">
				<div class="item" v-for="i in order" :key="i">
					<div class="product">
						<img :src="`./pic/${i.image}`" v-bind:alt="i.title">
						<div class="prod-detail">
							<p>{{i.title}}</p>
							<div class="spec">
								<p>{{i.color}}</p>
								<p>{{i.size}}</p>
							</div>
							<div class="price">
								<p>${{i.price}}元</p>
							</div>
						</div>
					</div>
					<div class="count">
						<p>x{{i.count}}</p>
					</div>
				</div>
				</div>
				<div class="detail" v-if="subscribe !==false">
					<div>共 {{order.length}} 種商品</div>
					<div >
						{{subscribe.level_name}}訂閱等級折扣: -${{total-distotal}}
					</div>
					<!-- <div >尚無訂閱等級折扣</div> -->
					<div>總計: ${{distotal}}元</div>
				</div>
				<div class="detail" v-else>
					<div>共 {{order.length}} 種商品</div>
					<!-- <div >
						{{subscribe.level_name}}訂閱等級折扣: -${{parseInt(total-distotal)}}
					</div> -->
					<div >尚無訂閱等級折扣</div>
					<div>總計: ${{total}}元</div>
				</div>
			</div>
		</div>	
	</div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";

export default {
	name: "checkout",
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
			subscribe:[],
			subMemInfo:[],
			inner:[],
			ord_mem:'',
			ord_phone:'',
			ord_addr:'',
		}
	},
	created(){
		this.getStorage();
		this.getResource();
	},
	computed:{
		total(){
			let total=0;
			for(const index in this.order){
				total+=this.order[index]['count']*this.order[index]['price']
			}
			console.log(total);
			return parseInt(total);
		},
		distotal(){
			let distotal=0;
			for(const index in this.order){
				distotal+=this.order[index]['count']*this.order[index]['price']*this.subscribe.discount
			}
			console.log(distotal);
			return parseInt(distotal);
		},
	},
	methods:{
		check(){
			this.isChecked = !this.isChecked;
			console.log(this.isChecked);
			if(this.isChecked==true){
				this.ord_mem=this.subMemInfo.mem_name;
				this.ord_phone=this.subMemInfo.phone;
				this.ord_addr=this.subMemInfo.address;
				console.log(this.inner);
			}
			else{
				this.ord_mem='';
				this.ord_phone='';
				this.ord_addr='';
			}
		},
		getStorage(){
			let data =localStorage.getItem('cart');
			data=JSON.parse(data)
			this.order=data? data:[]
			console.log(this.order);
        },
		getResource() {
            this.axios.get(`${BASE_URL}/subscription.php`).then((response) => {
                this.subscribe= response.data;
				console.log(this.subscribe);
            });
            this.axios.get(`${BASE_URL}/subMemInfo.php`).then((response) => {
                this.subMemInfo= response.data;
				console.log(this.subMemInfo);
            });
    	},
		orderSubmit(){
			const total=this.order.reduce((acc,cur)=> acc += cur.count* cur.price, 0);
			let datas ={};
			datas.order = this.order;
			datas.mem_id = this.subMemInfo.mem_id;
			datas.ord_mem = this.ord_mem;
			datas.ord_phone = this.ord_phone;
			datas.ord_addr = this.ord_addr;
			datas.total = total;
			if(this.subscribe!=false&&this.subscribe!=''){
				datas.discount = parseInt(total*(1-this.subscribe.discount));
				datas.ord_paid = total*this.subscribe.discount;
				
			}else{
				datas.discount=0;
				datas.ord_paid=total;
			}
			console.log(datas);
			fetch(`${BASE_URL}/insertOrder_2.php`,{
				method:"post",
				body:JSON.stringify(datas),
			})
			.then((response) => {
				return response.json();
			})
			.then((data) =>{
				console.log(data);
				if (data.msg) {
					alert("已成功下單");
				}
				localStorage.clear();
				this.$router.push({ path: "/MyPage/OrderHistory"});
			})
			.catch((error) => console.log(error));
		}
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
					height:270px;
					@include m{
						height:450px;
					}
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
							height: 65px;
							@include m{
								width: 150px;
								height: 150px;
							}
						}
							.prod-detail{
								display: flex;
								flex-direction: column;
								justify-content: space-evenly;
								gap:10px;
								width:100px;
								.spec,.price{
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
