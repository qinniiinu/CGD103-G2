<template>
	<!-- 會員 container -->
	<div class="mem-container">
		<!-- 側邊攔 -->
		<SideMenu></SideMenu>
		<!-- 右側資料 -->
		<div class="mem-data">
			<h1>This is測試 page</h1>
			<font-awesome-icon icon="fa-duotone fa-plane" />
			<font-awesome-icon icon="fa-solid fa-star" />
			<font-awesome-icon icon="fa-solid fa-book" />
			<button @click="action" class="btn btn-info">bootstrap測試</button>
			<font-awesome-icon icon="fa-solid fa-heart" />
			<div class="box"></div>
		</div>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";
import SideMenu from "@/components/SideMenu.vue";

export default {
	name: "Test",
	components: {
		Footer,SideMenu
	},
	methods: {
		action() {
			console.log("測試按鈕");
		},
	},
};
</script>

<style lang="scss">
 @import "../assets/sass/main.scss";
    .mem-container{
		display: flex;
		width: 100vw ;
		margin: auto;	
		.mem-data{
		flex-grow: 1;
		}
	}


</style>
