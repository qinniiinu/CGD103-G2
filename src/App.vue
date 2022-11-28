<template>
	<div class="app">
		<Header></Header>
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

    	} 
  	},
	computed:{
	
	},


};
</script>
<style lang="scss" scoped>

</style>
