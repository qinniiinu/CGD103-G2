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
					<MemCard title="我的身型">
						<type-tag :TypeTag="bodytypes[0].type1"></type-tag>
						<bg-tag :Bgtag="body[0].type1" class="bgtag"></bg-tag>
					</MemCard>
					<MemCard title="我的風格">
						<type-tag :TypeTag="styletypes[0].type1"></type-tag>
						<bg-tag :Bgtag="body[0].type1" class="bgtag"></bg-tag>
					</MemCard>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import MemberSideMenu from "@/components/MemberSideMenu.vue";
import MemCard from "@/components/mypage/MemCard.vue";
import BgTag from '@/components/mypage/BgTag.vue';
import TypeTag from '@/components/mypage/TypeTag.vue';
export default {
	name: "MyPage",
	components: {
		MemberSideMenu,
		MemCard,
		BgTag,
		TypeTag,
	},
	data() {
		return {
            bodytypes:[
				{type1:'沙漏型'},
				{type2:'222'},
				{type3:'333'},
				{type4:'444'},
            ],
            styletypes:[
				{type1:'文青風'},
				{type2:'222'},
				{type3:'333'},
				{type4:'444'},
            ],
			    body:[
				{type1:'HOURGLASS'},
				{type2:'222'},
				{type3:'333'},
				{type4:'444'},
            ],
            	style:[
				{type1:'VINTAGE'},
				{type2:'222'},
				{type3:'333'},
				{type4:'444'},
            ],
		}
	}
}

</script>
<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
	.type{
	display: block;
	}
	.bgtag{
		display:block;
		position: absolute;
		right: $padding;
	}
</style>
