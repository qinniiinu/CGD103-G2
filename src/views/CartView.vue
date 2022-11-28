<template>
	<template v-if="load">loading...</template>
	<template v-else>
		<div class="productContainer">
			<div v-for=" (item) in product" :key="item.id">
				<p>{{item.title}}</p>
				<img :src="item.image" v-bind:alt="item.title">
				<!-- <p>${{parsePrice(item.price)}}元</p> -->
				<div>
					<!-- <button @click="reduceCount(index)">-</button> -->
					<!-- <input type="text" v-model.number="count"> -->
					<!-- <input type="number" min="0" v-model="count[index]"> -->
					<!-- <button @click="addCount(index,1)">+</button> -->
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
		}
	},
	created(){
		console.log('created');
		this.getResource()
	},
	methods:{
		getResource(){
			this.load=true;
			fetch('https://fakestoreapi.com/products').then(res=>res.json())
			.then(json=>{
				this.source=json
				for(let item in this.product){
					this.count.push(0)
				}
				this.load=false
			})
		}
	}
};
</script>
<style lang="scss" scoped>
	.cart{
		height: 600px;
		width:1200px;
	}
	
</style>
