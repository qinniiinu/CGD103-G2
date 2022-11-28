<template>

	<div class="mulstyle">
		<img alt="Vue logo" src="../../assets/logo.png" />
	
		<ul class="outfit-title">
			<h2>穿搭情境</h2>
			<li  :class="['outfit-item', { active: currentTag === tag }]" v-for="tag of tags" :key="tag" @click="currentTag = tag">
				{{tag}}
			</li>
		</ul>
		<!-- <component :is="tagComponent"></component> -->
		<div class="container" v-for="num of 9" :key="num">
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				<div class="col" v-for="(img,index) of imgs" :key="index">
					<img :src="img.src">
				</div>
			</div>
		</div>
		
		 

	
	</div>
	<Footer></Footer>
</template>

<script>
// import Footer from "@/components/Footer.vue";
// import Header from "@/components/Header.vue";



export default {
	name: "MulStyle",

	components: {
		// Footer,
		// Header, 
	},
	
  	data() {
    	return {
			imgs:[
				{src:'./look-1.jpg'},
				{src:'./look-2.jpg'},
				{src:'./look-3.jpg'},
				{src:'./look-4.jpg'},
				{src:'./look-5.jpg'},
				{src:'./look-6.jpg'},
				{src:'./look-7.jpg'},
				{src:'./look-8.jpg'},
			],
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
	computed:{
		tagComponent(){
			return `tag-${this.currentTag.toLowerCase()}`;
		},
	},


};
</script>
<style lang="scss">
	@import "@/assets/sass/mulstyle";
</style>
