<template>
	<!-- <div class="login" v-if="(isLogin==false)">
		<div class="front_end longin_box" @click="(this.isLogin=true)">
			<p>前台</p>
		</div>
		<a href="https://tibamef2e.com/cgd103/g2/back/">
			<div class="back_end longin_box" >
				<p>後台</p>
			</div>
		</a>
		
	</div> -->
	<div class="home_page" >
		<Header class="all_header"></Header>
		<router-view/>
		<Footer></Footer>
	</div>
</template>
<script>
import Footer from "@/components/Footer.vue";
import Header from "@/components/Header.vue";



export default {
	name: "App",

	components: {
		Footer,
		Header, 
	},
	
  	data() {
    	return {
			isLogin:false,

    	} 
  	},
	computed:{
	
	},
	methods:{
		LoginBackend(){
			// this.isLogin=true
			// console.log(this.isLogin)
		}
	},

};
</script>
<style lang="scss" scoped>

	.home_page{
		position: relative;
		.all_header{
			position: sticky;
			top: 0;
		}
	}
	
</style>
