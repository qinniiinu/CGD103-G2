<template>
	<div class="checkout">
		<form class="paydetails" action="" @submit.prevent="orderSubmit()">
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
					<input class="memName" type="text" v-model="memInfo.mem_name" disabled>
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="memInfo.phone" disabled>
					<!-- <p>電子信箱</p>
					<input class="email" type="text" v-model="memInfo.mem_mail" disabled> -->
					<p>聯絡地址</p>
					<input class="address" type="text" v-model="memInfo.address" disabled>
				</div>
				<div class="receiver">
					<h4>收件人資訊</h4>
					<p>姓名</p>
					<input class="mem_name" type="text" v-model="inner[0]">
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="inner[1]">
					<!-- <p>電子信箱</p>
					<input class="email" type="text" v-model="inner[2]"> -->
					<p>配送地址</p>
					<input class="receive-address" v-model="inner[3]">
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
				<div class="item" v-for="item in order" :key="item.id">
					<div class="product">
						<img :src="`/pic/${item.image}`" v-bind:alt="item.title">
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
					<div v-if="subscribe !==false">
						{{subscribe.level_name}}訂閱等級折扣: -${{parseInt(total*(1-subscribe.discount))}}
					</div>
					<div v-else>尚無訂閱等級折扣</div>
					<div>總計: ${{total}}元</div>
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
			cart:[],
			count:[],
			order:[],
			min:0,
			max:0,
			subscribe:[],
			memInfo:[],
			inner:[]
		}
	},
	created(){
		this.getStorage();
		this.getResource();
	},
	computed:{
		total(){
			let total=0;
			let distotal=0;
			if(this.subscribe!=false){
				for(const index in this.order){
					distotal+=this.order[index]['count']*this.order[index]['price']*this.subscribe.discount
				}
				console.log(distotal);
				return parseInt(distotal);
			}else{
				for(const index in this.order){
					total+=this.order[index]['count']*this.order[index]['price']
				}
				console.log(total);
				return parseInt(total);
			}
		},
	},
	methods:{
		check(){
			this.isChecked = !this.isChecked;
			console.log(this.isChecked);
			if(this.isChecked==true){
				this.inner[0]=this.memInfo.mem_name;
				this.inner[1]=this.memInfo.phone;
				this.inner[2]=this.memInfo.mem_mail;
				this.inner[3]=this.memInfo.address;
				console.log(this.inner);
			}
			else{
				this.inner=[];
			}
		},
		getStorage(){
			let data =localStorage.getItem('cart');
			data=JSON.parse(data)
			this.order=data? data:[]
        },
		getResource() {
            this.axios.get("/api_server/subscription.php").then((response) => {
                this.subscribe= response.data;
				console.log(this.subscribe);
            });
            this.axios.get("/api_server/subMemInfo.php").then((response) => {
                this.memInfo= response.data;
				console.log(this.memInfo);
            });
    	},
		orderSubmit(){
			// let formData = new FormData();
			// formData.append("mem_id", this.subMemInfo.mem_id);
			// formData.append("level_id",this.subOrder[0].id);
			// formData.append("sub_paid", this.subOrder[0].price);
			// formData.append("action", "subOrder");

			// fetch("/api_server/inserSubOrder.php", {
			// 	method: "post",
			// 	body: formData,
			// })
			// .then((response) => {
			// 	return response.json();
			// })
			// .then((data) =>{
			// 	console.log(data);
			// 	if (data.msg) {
			// 		alert("data.msg");
			// 	}
			// })
			// .catch((error) => console.log(error));
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
								gap:10px;
								width:150px;
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
