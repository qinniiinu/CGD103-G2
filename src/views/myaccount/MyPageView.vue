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
					<MemCard title="我的身型" type="沙漏型"></MemCard>
					<MemCard title="我的風格" type=""></MemCard>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import MemberSideMenu from "@/components/MemberSideMenu.vue";
import MemCard from "@/components/mypage/MemCard.vue";
export default {
	name: "MyPage",
	components: {
		MemberSideMenu,
		MemCard
	},

	data() {
		return {
			Bodytype:[
				{
					id:1,
					name:'沙漏型',
				},
				{
					id:2,
					name:'三角型',
				},
				
			],

			egtype:[

			]

		}
	},
};
			console.log(type);
</script>
<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";

</style>
