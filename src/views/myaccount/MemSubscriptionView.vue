<template>
	<!-- 會員 container -->
	<div class="mem_container">
		<!-- 側邊欄組件 -->
		<MemberSideMenu></MemberSideMenu>
		<!-- 右側會員資料-->
		<div class="mem_data">
			<p class="title">訂閱服務</p>
			<div class="data">
				<!-- 這裡開始寫 -->
			</div>
		</div>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";
import MemberSideMenu from "@/components/MemberSideMenu.vue";
export default {
	name: "MemSubscriptionView",
	components: {
        Footer,
		MemberSideMenu
	},
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";

</style>
