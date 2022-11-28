<template>

	<div class="mulstyle">
		<img alt="Vue logo" src="../../assets/logo.png" />
	
		<ul class="outfit-title">
			<h2>穿搭情境</h2>
			<!-- <li  :class="['outfit-item', { active: currentTag === tag }]" v-for="tag of tags" :key="tag" @click="currentTag = tag">
				{{tag}}
			</li> -->
			<li :class="['outfit-item', { active: currentTag === tag }]" v-for="(tag,index) of tags" :key="index" @click="currentTag = tag">
				{{tag}}
			</li>
		</ul>
		<!-- <component :is="tagComponent"></component> -->
		<div class="container" >
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				<div class="col" v-for="(img,index) of showimgs" :key="index">
					<img :src="img.src">
				</div>
			</div>
		</div>
		
		 

	
	</div>
	<Footer></Footer>
</template>

<script>

export default {
	name: "MulStyle",

	components: {
		// Footer		// Header, 
	},
	
  	data() {
    	return {
			imgs:[
				[{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'}],

				[{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'}],

				[{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'}],

				[{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'}],

				[{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'}],

				[{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'}],

				[{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'}],

				[{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'}],

				[{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'}],
			],
			// showimgs:[{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},]
			// ,
			tags:[
				'#上班穿搭',
				'#開會穿搭',
				'#海邊穿搭',
				'#約會穿搭',
				'#旅行穿搭',
				'#面試穿搭',
				'#上課穿搭',
				'#趴踢穿搭',
				'#宴會穿搭',
			],
			currentTag:'#上班穿搭',

    	} 
  	},
	computed: {
		showimgs() {
			const index = this.tags.indexOf(this.currentTag);
			if (index > -1) {
				return this.imgs[index];
			}
			return this.imgs[0];
			// return this.imgs.filter(item => item.cat === this.currentTag)
		},
	},
	methods:{
		tagtest(index){
			this.showimgs=this.imgs[index];
			// console.log(this.tag.style.property )
			// console.log(this.showimgs);
		}
	}


};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/mulstyle";
	@import "@/assets/sass/grid";

	.col{
		margin: 10px 0px;
		img{
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	}
	.container{
		width: 80%;
		max-width: 390px;
		@include m{
			max-width: 768px;
		}
		@include m{
			max-width: 960px;
		}
		.row{
			margin: 10px;
		}
	}
</style>
