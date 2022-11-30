<template>
	<div class="cover_Pic">
		<div class="cover_main">
			<h2>Don’t know how to wear?</h2>
			<p>快來探索屬於你的專屬風格</p>
			<Button content="探索去"/>
		</div>
	</div>
	<section class="find_style_page">
		<div class="wrap">
			<StyleCard content="時尚風" link="./style1.png"/>
			<StyleCard content="極簡風" link="./style2.png"/>
			<StyleCard content="運動風" link="./style3.png"/>
			<StyleCard content="文青風" link="./style4.png"/>
			<p>首先，請讓我們更認識你<br>點擊下方開始測驗你的風格</p>
			<h2>找尋你的個人風格</h2>
		<p>嗨~ 你了解自己嗎 ?<br>也許你不知道自己適合什麼，也許你正在尋找新的自我風格，<br>不論你現在處於什麼狀態，讓 UR:Style 一起陪你尋找屬於你的<strong>穿搭風格公式</strong>吧!</p>
		</div>
		<Button content="測驗去"/>
	</section>
</template>
<script>
import StyleCard from "@/components/StyleCard.vue";
import Button from "@/components/Button.vue";

export default {
	name: "FindStyle",
	components: {
		StyleCard,
		Button,
	},
};
</script>
<style lang="scss" scoped>

.cover_Pic{
	width: 100%;
	// margin-top:60px ;
	height: 100vh;
	background-image:url("../../public/cover-photo.jpg");
	background-size: cover;
	background-position: center;
	position: relative;
	.cover_main{
		left: 0;
		right: 0;
		margin: 0 auto;
		position:absolute;
		bottom: 80px;
	}
	h2{
		display: block;
		text-align: center;
		font-weight: 900;
		color: $third_color;
		font-size: 48px;
		margin-bottom:20px;
		margin-top:auto ;
	}
	p{
		display: block;
		font-size: 32px;
		text-align: center;
		font-weight: 700;
		color: $third_color;
		margin-bottom:20px ;
		margin-top:auto ;
	}
	Button{
		display: block;
		margin: auto;
		width: 120px;
    	line-height: 50px;
		margin-top:50px ;
	}
}
.find_style_page{
	box-sizing: border-box;
	max-width: 1200px;
	margin: 0 auto 50px;
	h2{
		font-size: 32px;
		color: $title_color;
		font-weight: 600;
		text-align: center;
		padding: 30px;
	}
	p{
		font-size: 14px;
		text-align: center;
		color: $text_color;
		strong{
			font-weight: 600;
		}
	}
	.wrap{
		display: flex;
		flex-wrap: wrap;
		justify-content: space-around;
		padding: 30px 5px 0 5px;
		margin: 0 auto;
		p{
			margin-bottom: 30px;
		}
		
	}
	button{
		margin: auto;
		display: block;
	}
}
// 平板以上
@media screen and (min-width:768px) {
	.find_style_page{
		h2{
			font-size: 48px;
		}
		p{
			font-size: 22px;
		}
		.wrap{
			padding: 50px 0;
			.item{
				width: 20%;
			}
			.item:nth-child(1), .item:nth-child(4){
				top: 50px;
			}
			P{
				display: none;
			}
		}

	}
}

</style>
