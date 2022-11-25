<template>

	<div class="Ord-history-container">
		<SideMenu></SideMenu>
		<h2>#訂單記錄</h2>

	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";
import Heaader from "@/components/Header.vue";
import SideMenu from "@/components/SideMenu.vue";

export default {
	name: "OrderHistory",
	components: {
		Footer,
		Heaader,
		SideMenu,
	},
};
</script>


<style lang="scss">
@import "@/assets/sass/main";
@import "@/assets/sass/member_side_menu";


.Ord-history-container{
	display: flex;
	
}



</style>
