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
							<input type="number" min="0" v-model="count[index]">
							<button @click="addCount(index,item)">+</button>
						</div>
					</div>
				</div>
				
			</div>
			<div class="cart">
				<div class="cart-wrap">
					<h2>購物車</h2>
					<ul class="product">
						<p>產品編號</p>
						<p>產品圖</p>
						<p>名稱</p>
						<p>顏色</p>
						<p>尺寸</p>
						<p>數量</p>
						<p>單價</p>
					</ul>
					<ul class="order-wrap">
						<li class="order-item" v-for="item in order" :key="item.id">
							<p>{{item.id}}</p>
							<img :src="item.image" v-bind:alt="item.title">
							<p>{{item.title}}</p>
							<p>{{item.color}}</p>
							<p>{{item.size}}</p>
							<button @click="reduceCount(index,item)">-</button>
							<p>{{item.count}}</p>
							<button @click="addCount(index,item)">+</button>
							<p>{{item.price}}</p>
						</li>
					</ul>
					<!-- 總價 -->
						<p>總價: {{total}}元</p>
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
			product:[
			//產品資訊
			{
			id: 1,
			image: "https://nb.scene7.com/is/image/NB/m990gl5_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=472&hei=472",
			title: "Newbalance鞋",
			color: "灰色",
			size: "23cm",
			price: 2990,
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
		// this.getResource()
	},
	computed:{
		total(){
			if(this.product.length>0){
				let total=0
				for(const index in this.product){
					total+=this.count[index]*this.product[index]['price']
				}
				return parseInt(total)
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
			// this.setStorage()
		}
		
	}
};
</script>
<style lang="scss" scoped>
h2{
	font-size: 24px;
	color: black;
	margin: 10px;
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
	margin:auto;
	.cart-wrap{
		width: 800px;
		margin:auto;
		.product{
			display: flex;
			gap: 8%;
			:nth-child(2){
				padding:0px 8%;
			}
			}
		}
		.order-wrap{
			margin: 20px;
			.order-item{
				display: flex;
				margin-bottom: 10px;
				gap: 6%;
				button{
						width: 20px;
						height: 20px;
					}
				img{
					padding:0px 5%;
					width: 150px;
				}
			}
		}
}

	
	
</style>
