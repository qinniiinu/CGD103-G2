<template>
	<div class="main-part">
		<styleSideMenu class="sidemenu"></styleSideMenu>

		<div class="look-product">
			<SearchBar />
			  <div class="container">
					<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
						<div class="col" v-for="(col,index) of cols" :key="index" >
							<lookCard :link="col.src" :tag="col.tag" :ootdName="col.ootdName" :heartId="col.id"></lookCard>
						</div>
					</div>
			  </div>
			
		</div>
	</div>
</template>
<script>
import styleSideMenu from "@/components/styleSideMenu.vue";
import lookCard from "@/components/lookCard.vue";
import SearchBar from "@/components/product/SearchBar.vue";
export default {
	name: "Wearing",
	components: {
		styleSideMenu,lookCard,SearchBar
	},

	data(){
		return{
			cols:[
				{src:'/look-1.jpg',ootdName:'OOTD-001',tag:['#上班穿搭','＃沙漏形','素色'],id:'01'},
				{src:'/look-2.jpg',ootdName:'OOTD-002',tag:['#約會穿搭','＃梨形'],id:'02'},
				{src:'/look-3.jpg',ootdName:'OOTD-003',tag:['#上課穿搭','＃蘋果形'],id:'03'},
				{src:'/look-4.jpg',ootdName:'OOTD-004',tag:['#上課穿搭','＃蘋果形','單寧'],id:'04'},
				{src:'/look-5.jpg',ootdName:'OOTD-005',tag:['#開會穿搭','＃蘋果形'],id:'05'},
				{src:'/look-6.jpg',ootdName:'OOTD-006',tag:['#旅行穿搭','＃蘋果形'],id:'06'},
				{src:'/look-7.jpg',ootdName:'OOTD-007',tag:['#趴踢穿搭','＃蘋果形'],id:'07'},
				{src:'/look-8.jpg',ootdName:'OOTD-008',tag:['#宴會穿搭','＃蘋果形'],id:'08'},
				{src:'/look-9.jpg',ootdName:'OOTD-009',tag:['#運動穿搭','＃蘋果形'],id:'09'},
			]
		}
	},
	
};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/grid";
	.main-part{
			display: flex;
		
		}
	.look-product{
		margin: auto;
		.container{
			.row{
				.col{
					margin-bottom: 30px;
				}
			}
		}
	}
	.sidemenu{
		margin-left:auto ;
	}
</style>
