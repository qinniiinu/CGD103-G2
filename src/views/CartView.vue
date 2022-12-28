<template>
	<template v-if="load">loading...</template>
	<template v-else>
		<div class="productContainer">
			<div class="cart">
				<div class="cart-wrap">
					<h2>購物車</h2>
					<ul class="cart-title">
						<div>產品</div>
						<div>名稱</div>
						<div>顏色</div>
						<div>尺寸</div>
						<div>數量</div>
						<div>單價</div>
						<div>總價</div>
					</ul>
					<ul v-if="cart.length>0" class="order-list">
						<li class="item" v-for="item in cart" :key="item.id">
							<div class="item-left"><img :src="`/pic/${item.image}`" v-bind:alt="item.title"></div>
							<div class="item-right">
								<div class="item-des">
									<div>{{item.title}}</div>
									<div>{{item.color}}</div>
									<div>{{item.size}}</div>
								</div>
								<div class="item-p">
									<div class="count">
										<button @click="reduceCount(index,item)">-</button>
										<span>{{item.count}}</span>
										<button @click="addCount(index,item)">+</button>
									</div>
									<div>${{item.price}}元</div>
									<div>${{item.price*item.count}}元</div>
									<div><button @click="dele(index,item)">x</button></div>
								</div>
								
							</div>
						</li>
						<div class="detail">
							<div>共 {{cart.length}} 種商品</div>
							<div v-if="this.subMemInfo!==false && this.subMemInfo.msg!=='請先登入' &&this.subscribe!==false">
								{{subscribe.level_name}}訂閱等級折扣: -${{parseInt(total*(1-subscribe.discount))}}
							</div>
							<div v-else>尚無訂閱等級折扣</div>
							<div>總計: ${{total}}元</div>
						</div>
						<div class="nextbtn">
							<router-link to="/ProductList" ><button>繼續逛逛</button></router-link>
							<!-- <router-link to="/Checkout"><button @click="ifLogin()">去付款</button></router-link> -->
							<button @click="isLogin()">去付款</button>
						</div>
					</ul>
					<ul v-else class="none-list">
						<li>目前尚無商品</li>
						<router-link to="/ProductList"><button>去逛逛</button></router-link>
					</ul>
				</div>
			</div>
		</div>
	</template>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
export default {
	name: "Cart",
	components: {
	},
	data(){
		return{
			load: false,
			count:[],
			order:[],
			cart:[],
			min:0,
			max:0,
			subscribe:[],
			subMemInfo:[],
		}
	},
	created(){
		this.getStorage();
		this.getResource();
	},
	computed:{
		total(){
			if(this.cart.length>0){
				let total=0;
				if(this.subMemInfo!==false && this.subMemInfo.msg!=='請先登入'){
					if(this.subscribe){
						for(const index in this.cart){
							total+=this.cart[index]['count']*this.cart[index]['price']*this.subscribe.discount
						}
						console.log(total);
						return parseInt(total);
					}else{
						for(const index in this.cart){
							total+=this.cart[index]['count']*this.cart[index]['price']
						}
						console.log(total);
						return parseInt(total);
					}
				}else{
					for(const index in this.cart){
						total+=this.cart[index]['count']*this.cart[index]['price']
						return parseInt(total);
					}
				}
			}else{
				return 0;
			}
		},
	},
	methods:{
		setStorage(){
			const data=JSON.stringify(this.cart);
			localStorage.setItem('cart',data);
		},
		getStorage(){
			this.load=true;
			let data =localStorage.getItem('cart');
			data=JSON.parse(data)
			this.cart=data? data:[]
			console.log(this.cart);
			if(this.subMemInfo)
			this.load=false;
        },
		addCount(index,item){
			console.log(item.count);
			item.count+=1;
			this.setStorage()
		},
		reduceCount(index,item){
			console.log(item.count);
			if(item.count<0) return;
			if(item.count>1){
				item.count-=1
			}else{
				this.cart.splice(item,1)
			}
			this.setStorage()
		},
		dele(index,item){
			if(item.count<0) return;
			this.cart.splice(item,1)
			this.setStorage()
		},
		getResource() {
            this.axios.get(`${BASE_URL}/subMemInfo.php`).then((response) => {
				console.log(response.data.state);
				this.subMemInfo= response.data;
				console.log(this.subMemInfo);
				if(this.subMemInfo!==false && this.subMemInfo.msg!=='請先登入'){
					this.axios.get("/api_server/subscription.php").then((response) => {
						this.subscribe= response.data;
						console.log(this.subscribe);
					});
				}
            });
			
    	},
		isLogin(){
			if(this.subMemInfo!==false && this.subMemInfo.msg!=='請先登入'){
				this.$router.push({ path: "/checkout" });
			}else{
				alert('請先登入會員')
				this.$router.push({ path: "/login" });
			}
		}
	}
};
</script>
<style lang="scss" scoped>
h2{
	font-size: 24px;
	color: black;
	margin:10px 0;
	border: 1px solid $title_color;
	padding: 10px 20px;
}
.productContainer{
	width:100%;
	margin: auto;
		.prod-wrap{
			// display:none;
			width: 800px;
			margin: auto;
			margin-bottom: 100px;
			.items{
				display: flex;
				.item{
				width: auto;
				// display: flex;
				// justify-content: flex-start;
				img{
					width: 150px;
					height: 150px;
				}
				}
			}
		}
}
.cart{
	margin: auto;
	h2{
		font-size: 18px;
		@include m{
			font-size: 24px;
		}
	}
	.cart-wrap{
		margin:20px;
		@include m{
			margin:50px 100px 100px 100px;
		}
		.cart-title{
			color: #777;
			margin-bottom: 10px;
			text-align: center;
			display: none;
			@include m{
				display: flex;
				:first-child{
					min-width: 150px;
				}
				:nth-child(n+2){
					display: block;
					width:150px;
				}
			}
			@include l{
				display: flex;
				:first-child{
					width: 150px;
				}
				:nth-child(n+2){
					display: block;
					width:150px;
				}
			}
		}
		.order-list{
			width:100%;
			.item{
				display: flex;
				width: 100%;
				font-size: 12px;
				margin-bottom: 10px;
				padding-bottom: 10px;
				border-bottom: 1px solid #777;
				.item-left{
					img{
						width: 65px;
						height: 65px;
						@include m{
							width: 150px;
							height: 150px;
						}
					}
				}
				.item-right{
					display: flex;
					flex-direction: column;
					justify-content: space-evenly;
					align-items: center;
					text-align: center;
					width: 100%;
					@include m{
						flex-direction: row;
						justify-content: flex-start;
						width: 42%;
						font-size: 16px;
					}
					.item-des{
						width: 100%;
						display: flex;
						:first-child(){
							min-width: 100px;
							@include m{
								width: 150px;
							}
						}
						:nth-child(n){
							width: 80px;
							@include m{
								width: 150px;
							}
						}
					}
					.item-p{
						width: 100%;
						display: flex;
						align-items: center;
						:last-child>button{
							width: 30px;
							font-size: 16px;
							background-color: white;
							border: none;
						}
						.count{
							display: flex;
							justify-content: center;
							button{
								color: $main_color;
								font-size: 18px;
								width: 30px;
								background-color: white;
								border: none;
							}
							span{
								width: 30px;
								margin: auto;
							}
						}
						:nth-child(n-1){
							width: 80px;
							@include m{
								width: 150px;
							}
						}
						:last-child{
							width: 30px;
						}
					}
				}
			}
			.detail{
				text-align: right;
				display: flex;
				flex-direction: column;
				gap: 10px;
				margin-bottom: 20px;
				font-size: 12px;
				@include m{
					font-size: 16px;
				}
			}
			.nextbtn{
				display: flex;
				justify-content: space-between;
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
}
	.none-list{
		height: 200px;
		border-bottom: 1px solid $text_color;
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 5%;
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
// }

	
	
</style>
