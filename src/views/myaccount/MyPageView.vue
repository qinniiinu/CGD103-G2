<template>
	<!-- 會員 container -->
	<div class="mem_container">
		<!-- 側邊欄組件 -->
		<MemberSideMenu></MemberSideMenu>
		<!-- 右側會員資料-->
		<div class="mem_data">
			<p class="title">Costomer, 歡迎回來</p>
			<div class="data">
				<!-- 這裡開始寫 -->
				<div class="box">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, et, quas harum molestiae perspiciatis eius doloribus minima dignissimos natus, ab quod distinctio. Accusantium, vel laboriosam ex similique optio explicabo dolores.
					</p>
				</div>
			</div>
		</div>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";
import MemberSideMenu from "@/components/MemberSideMenu.vue";
export default {
	name: "MyPage",
	components: {
        Footer,
		MemberSideMenu
	},
};

</script>
<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
.box{
	border: 1px solid black;
	padding: $padding;
}
</style>
