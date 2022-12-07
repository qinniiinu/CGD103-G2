<template>
	<!-- 會員 container -->
	<div class="mem_container">
		<!-- 側邊欄組件 -->
		<MemberSideMenu></MemberSideMenu>
		<!-- 右側會員資料-->
		<div class="mem_data">
			<p class="title">風格諮詢</p>
			<div class="data">
				<!-- 這裡開始寫 -->
				<div class="book">
					<h3>您的預約</h3>
					<p>2022/12/25  15:00-16:00</p>
					<button class="btn_l">修改預約</button><button class="btn_s">進入聊天室</button>
				</div>
				<div class="recommend-part">
					<section class="recommend">
                        <h2>推薦穿搭</h2>
                        <div class="item">
                            <StylistLook2 class="stylist" scardP="./stylist-1.jpg" stylistName="Kevin" stylistInfo="擅長時尚風格,用前衛的單品,搭配出衝突的美感"></StylistLook2>
                        </div>
                    </section>
                    <section class="deco">
                        <div class="decoration">
					        #CASUAL
				        </div>
                        <div class="btn_box">
                            <router-link :to="{ name:'MyPage'}"><button class="btn_l">返回</button></router-link>
                        </div>
                    </section>
				</div>
			</div>
		</div>
	</div>
	<Footer></Footer>
</template>

<script>

import MemberSideMenu from "@/components/MemberSideMenu.vue";
import StylistLook2 from "@/components/StylistLook2.vue";
export default {
	name: "Consultation",
	components: {

		MemberSideMenu,StylistLook2
	},
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";

	.book{
		width: 100%;
		border: 1px solid $title_color;
		margin: auto;
		text-align: center;
		h3{
			font-weight: 700;
			color: $title_color;
			font-size: 24px;
			margin: 20px;
		}
		p{

			font-size: 18px;
			margin: 30px;
		}
		button{
			line-height: 50px;
			margin: 20px;
			margin-bottom:40px ;
		}
	}
	.recommend-part{
		width: 100%;
		border: 1px solid $title_color;
		margin: auto;
		margin-top:50px ;
		text-align: center;
		// margin-bottom:50px ;
		h2{
			font-weight: 700;
			color: $title_color;
			font-size: 24px;
			margin: 20px;
		}
		// .recommend{
        //   .item{
			
			
		// 	}
		// }
		.deco{
			// margin-top: 50px ;
			.decoration{
				display: none;
			}
			.btn_box{
				.btn_s{
					display: none;
				}
				.btn_l{
					margin-left: auto;
					display: block;
				}
			}
		}


	}
			
	
// 	.card-info-pic{
// 		width:100px;
// 		height:100px;
// 		
// 		@include l{
// 			width:80px;
// 			height:80px;
// 			
// 		}
// 		@include xl{
// 			width:120px;
// 			height:120px;
// 			
// 		}
// 
// 		img{
// 			border-radius: 500px;
// 			width: 100%;
// 			height: 100%;
// 			object-fit: top;
// 		}
//    }
   

	@media screen and (min-width:1024px) {
			.deco{
				position: relative;
				top: 50px;
			.decoration{
				display: inline-block;
				font-size: 72px;
				font-weight: bolder;
				font-style: italic;
				color: $secondary;
			}
			.btn_box{
				display: inline-block;
				position:absolute;
				right: 0;
				.btn_l{// 返回
					margin-left: 0;
					// display: block;
					display: inline-block;
					margin-right: 10px;
				}
				.btn_s{ //重新測驗
					display: inline-block;
				}
			}
		}
    }

		

					
</style>
