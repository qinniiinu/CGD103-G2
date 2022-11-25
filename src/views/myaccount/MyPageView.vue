<template>
	<!-- 會員 container -->
	<div class="mem_container">
		<!-- 側邊攔 -->
		<SideMenu></SideMenu>
		<!-- 右側資料-->
		<div class="mem_data">
			<h1>右側內容</h1>
		</div>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";
import SideMenu from "@/components/SideMenu.vue";

export default {
	name: "MyPage",
	components: {
		Footer,SideMenu
	},
};

</script>
<style lang="scss">
@import "@/assets/sass/mulstyle";
    .mem_container{
		display: flex;
		width: 100% ;
		margin: auto;	
		.mem_data{
		flex-grow: 1;
		}
	}
</style>
