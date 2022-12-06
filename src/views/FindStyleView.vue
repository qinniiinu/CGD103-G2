<template>
	<div class="cover_Pic">
		<div class="cover_main">
			<h2>Don’t know how to wear?</h2>
			<p>快來探索屬於你的專屬風格</p>
			<Button content="探索去"/>
		</div>
	</div>

	<div class="textLoop_animate">
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
				
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
	</div>
		 
	<section class="find_style_page">
		<h2>風格測驗</h2>
		<div class="wrap">
			
			<StyleCard content="時尚風" link="./fashion2-1.png"/>
			<StyleCard content="極簡風" link="./minimalist2-1.png"/>
			<StyleCard content="運動風" link="./sport2-1.png"/>
			<StyleCard content="文青風" link="./hipster2-1.png"/>
			<p>
				不確定自己適合哪種風格嗎 ? 
				<br>
 				現在立刻前往個人風格測驗分析
			</p>
		</div>
		<router-link :to="{ name:'QuestionBox' }"><button class="btn_s">測驗去</button></router-link>
	</section>


	<div class="textLoop_animate">
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
				
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
	</div>

	<div class="our_stylist">
		<h2>#Our Stylist</h2>
		<h2 class="sec-h2">#Our Stylist</h2>
		<div class="our_stylist_main">
			<div class="our_stylist_pic" v-for="stylistPic of stylistPics" :key="stylistPic">
				<img :src="stylistPic.src" alt="">
			</div>
		</div>
		<div class="stylist_content">
			<p>
				更深入了解 
				<br>
				制定個人穿搭攻略
				<br>
				預約我們的風格團隊
			</p>
			<Button content="諮詢造型師"></Button>
		</div>

	</div>
		 		

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

	data() {
    	return {
			logoText:'RE:Outfit  ',
			stylistPics:[
				{src:'./stylist-8.jpg'},
				{src:'./stylist-4.jpg'},
				{src:'./stylist-5.jpg'},
				{src:'./stylist-6.jpg'},
				{src:'./stylist-7.jpg'},
				{src:'./stylist-3.jpg'},
			]
		}
	}
};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/main";
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
		// text-shadow: 3.5px 1px $third_color;
		text-align: center;
		font-weight: 900;
		color: $third_color;
		font-size: 48px;
		margin-bottom:20px;
		margin-top:auto ;

	}
	p{
		// text-shadow: 3.5px 1px $third_color;
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
		// width: 120px;
    	// line-height: 50px;
		margin-top:50px ;
	}
}
.find_style_page{
	box-sizing: border-box;
	max-width: 1200px;
	margin: 0 auto 0px;
	h2{
		font-size: 32px;
		color: $title_color;
		font-weight: 600;
		text-align: center;
			margin: 0px 0px 20px;
	}
	p{
		font-size: 16px;
		text-align: center;
		color: $text_color;
		line-height: 28px;

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
			font-size: 20px;
		}
		.wrap{
			padding: 50px 0;
			.item{
				width: 20%;
			}
			.item:nth-child(1), .item:nth-child(4){
				top: 50px;
			}
			p{
				margin: 50px 0 0px;
				line-height: 40px;
			}
		}
		Button{
			margin-top:-20px ;
		}

	}
}

	.textLoop_animate {
		display: flex;
		flex-wrap: nowrap;
  		overflow: hidden;
		margin: 40px auto;;
	
	}
	.logo_texts{
		animation: textLoop 10s linear infinite;
		font-size: 48px;
		color: $second_color;
		font-weight: 900;
		font-style: italic;
		white-space: nowrap;  


	}
	@keyframes textLoop {
		0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0)
		}
		100% {
			-webkit-transform: translate3d(-100%, 0, 0);
			transform: translate3d(-100%, 0, 0)
		}
	}
	.our_stylist{
		display: flex;
		flex-direction: column;
		margin: auto;
		position: relative;
		margin-bottom: 50px;
		
		@include m{
			flex-direction: row;
			width: 85%;
			margin: auto;
			margin-bottom: 80px;
		}
		h2{
			position:absolute;
			top: 12%;
			left: 0;
			right: 0;
			// bottom: 0;
			margin: auto;
			font-weight: 900;
			font-size: 48px;
			font-style: italic;
			width: fit-content ;
			height: fit-content;

			@include m{
				left: -35%;
				top: 0;
				bottom: 0;
			}
		
		}

		.sec-h2{
			// bottom: 0;
			top: 70%;

			@include m{
				display: none;
			}
			
		}

		.our_stylist_main{
			display: flex;
			flex-wrap:wrap;
			@include m{
				width: 70%;
				gap: 10px;
			}
			
			
			.our_stylist_pic{
				@include m{
					width: 31.5%;

				}
				width: 50%;
				img{
					width: 100%;
					height: 100%;
					object-fit: cover;
					object-position: center;
				}
			}
		}
		.stylist_content{
		
			display: flex;
			align-items: center;
			justify-content: space-around;
			@include m{
					width: 30%;
					flex-direction: column;
					justify-content: center;
					gap: 20px;
			}
			p{
				@include m{
					font-size: 18px;
					line-height: 36px;
				}
				@include l{
					font-size: 24px;
					line-height: 40px;
				}
				font-size: 24px;
				font-weight: 700;
				color:$title-color ;
				display: inline-block;
				line-height: 40px;
				margin: 10px;
			}
			Button{
				height: 60px;
				line-height: 30px;
			}

		}
	}

</style>
