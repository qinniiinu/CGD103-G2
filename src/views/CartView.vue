<template>
	<template v-if="load">loading...</template>
	<template v-else>
		<div class="productContainer">
			<div class="prod-wrap">
				<h2>我是假設的商品區</h2>
				<div class="items">
					<div class="item" v-for="(item,index) in product" :key="item.id">
						<!-- 產品編號 -->
						<p>{{item.id}}</p>
						<!-- 產品圖 -->
						<img :src="item.image" v-bind:alt="item.title">
						<!-- 產品名稱 -->
						<p>{{item.title}}</p>
						<!-- 產品顏色 -->
						<p>{{item.color}}</p>
						<!-- 產品尺寸 -->
						<p>{{item.size}}</p>
						<!-- 產品單價 -->
						<p>{{item.price}}元</p>
						<div class="count">
							<button @click="reduceCount(index,item)">-</button>
							<button @click="addCount(index,item)">+</button>
						</div>
					</div>
				</div>
			</div>
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
					<ul v-if="order.length>0" class="order-list">
						<li class="item" v-for="item in order" :key="item.id">
							<div><img :src="item.image" v-bind:alt="item.title"></div>
							<div>{{item.title}}</div>
							<div>{{item.color}}</div>
							<div>{{item.size}}</div>
							<div>
								<button @click="reduceCount(index,item)">-</button>
								<span>{{item.count}}</span>
								<button @click="addCount(index,item)">+</button>
							</div>
							<div>${{item.price}}元</div>
							<div>${{item.price*item.count}}元</div>
							<button @click="dele(index,item)">x</button>
						</li>
						<div class="detail">
							<div>共 {{order.length}} 種商品</div>
							<div>{{memLevel}} 會員等級折扣: -${{parseInt(total*discount)}}</div>
							<div>總計: ${{aftertotal}}元</div>
						</div>
						<div class="payment">
							<router-link to="/ProductList" ><button>繼續逛逛</button></router-link>
							<router-link to="/Checkout"><button>去付款</button></router-link>
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

export default {
	name: "Cart",
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
			]
		}
	},
	created(){
		// console.log('created');
		this.getStorage()
	},
	computed:{
		total(index,item){
			if(this.product.length>0){
				let total=0
				for(const index in this.order){
					total+=this.order[index]['count']*this.order[index]['price']
				}
				console.log(total);
				return parseInt(total)
			}else{
				return 0
			}
		},
		aftertotal(index,item){
			if(this.order.length>0){
				let aftertotal=0
				for(const index in this.order){
					aftertotal+=(this.order[index]['count']*this.order[index]['price'])*0.95
				}
				console.log(aftertotal);
				return parseInt(aftertotal);
			}else{
				return 0
			}
		}
	},
	methods:{
		
		// getResource(){
		// 	this.load=true;
		// 	fetch('https://fakestoreapi.com/products').then(res=>res.json())
		// 	.then(json=>{
		// 		this.source=json
		// 		for(let item in this.source){
		// 			this.count.push(0)
		// 		}
		// 		this.load=false
		// 	})
		// }
		addCount(index,item){
			console.log(item)
			this.count[index]+=1
			const prodIndex=this.order.findIndex(orderItem=>{
				return orderItem.id===item.id
			})
			if(prodIndex>=0){
				this.order[prodIndex]['count']+=1
			}else{
				// 推進購物車產品資訊
				this.order.push({
					id:item.id,
					title:item.title,
					image:item.image,
					color:item.color,
					size:item.size,
					price:item.price,
					count:1
				})
			}
			this.setStorage()
		},
		reduceCount(index,item){
			console.log(item)
			if(this.count[index]<=0) return
			this.count[index]-=1
			const prodIndex=this.order.findIndex(orderItem=>{
				return orderItem.id===item.id
			})
			if(prodIndex<0) return;
			if(this.order[prodIndex]['count']>1){
				this.order[prodIndex]['count']-=1
			}else{
				this.order.splice(prodIndex,1)
				alert("確定要刪除此產品嗎?")
			}
			this.setStorage()
		},
		getStorage(){
			let data =localStorage.getItem('order');
			data=JSON.parse(data)
			this.order=data? data:[]
        },
		setStorage(){
			const data=JSON.stringify(this.order);
			localStorage.setItem('order',data);
        },
		dele(index,item){
			const prodIndex=this.order.findIndex(orderItem=>{
				return orderItem.id===item.id
			})
			if(prodIndex<0) return;
			this.order.splice(prodIndex,1)
			alert("確定要刪除此產品嗎?")
		},
	
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
	width:1200px;
	margin: auto;
		.prod-wrap{
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
	width: 1200px;
	min-height: 500px;
	margin:auto;
	.cart-wrap{
		width: 940px;
		margin: auto;
		padding: 10px 20px;
		.cart-title{
			color: rgb(80, 80, 80);
			display: flex;
			padding: 10px 20px;
			:nth-child(1){
				width:200px;
			}
			:nth-child(2){
				width: 140px;
			}
			:nth-child(3){
				width:100px;
			}
			:nth-child(4),:nth-child(5),:nth-child(6),:nth-child(7){
				width:120px;
			}
		}
	}
	.order-list{
		margin: auto;
		padding: 10px 20px;
		.item{
			color: $text_color;
			display: flex;
			align-items:center;
			margin-top: 20px;
			padding-bottom: 15px;
			border-bottom: 1px solid $text_color;
			:first-child{
				width: 200px;
				img{
					width:150px;
					height:150px;
				}
			}
			:nth-child(5){
				width:120px;
				span{
					padding: 0 10px;
				}
				button{
					font-size: 16px;
					background: none;
					border: none;
					width: 20px;
					height: 20px;
				}
			}
			:nth-child(2){
				width:140px;
			}
			:nth-child(3){
				width:100px;
			}
			:nth-child(4),:nth-child(6),:nth-child(7){
				width:120px;
			}
			:last-child{
				font-size: 16px;
				height: 20px;
				width:20px;
				background: none;
				border:none;
			}
		}
		.detail{
			text-align: right;
			margin-top: 20px;
			display: flex;
			flex-direction: column;
			gap:10px;
			margin-bottom: 20px;
		}
		.payment{
			display: flex;
			justify-content: space-between;
			margin-bottom: 200px;
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
}

	
	
</style>
