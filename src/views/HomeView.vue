<template>
	<section class="home_cover">
		<img class="logo" src="../../public/re_logo.png" alt="">
		<div class="img_marquee">
			<div class="img_marquee_item" v-for="(mainImg,index) of mainImgs" :key="index">
				<img  v-show="mainImg.boolean"  :src="mainImg.src" alt="" @mouseenter="mainImg.boolean = false ; mainImg.hoverboolean = true">
				<img  v-show="mainImg.hoverboolean" :src="mainImg.hoversrc" alt="" @mouseout="mainImg.hoverboolean = false ; mainImg.boolean = true" >
			</div>
			<div class="img_marquee_item" v-for="(mainImg,index) of mainImgs" :key="index">
				<img  v-show="mainImg.boolean"  :src="mainImg.src" alt="" @mouseenter="mainImg.boolean = false ; mainImg.hoverboolean = true">
				<img  v-show="mainImg.hoverboolean" :src="mainImg.hoversrc" alt="" @mouseout="mainImg.hoverboolean = false ; mainImg.boolean = true" >
			</div>
		</div>
		<div class="img_marquee_2">
			<div class="img_marquee_item" v-for="(mainIImg,index) of mainIImgs" :key="index">
				<img  v-show="mainIImg.boolean"  :src="mainIImg.src" alt="" @mouseenter="mainIImg.boolean = false ; mainIImg.hoverboolean = true">
				<img  v-show="mainIImg.hoverboolean" :src="mainIImg.hoversrc" alt="" @mouseout="mainIImg.hoverboolean = false ; mainIImg.boolean = true" >
			</div>
			<div class="img_marquee_item" v-for="(mainIImg,index) of mainIImgs" :key="index">
				<img  v-show="mainIImg.boolean"  :src="mainIImg.src" alt="" @mouseenter="mainIImg.boolean = false ; mainIImg.hoverboolean = true">
				<img  v-show="mainIImg.hoverboolean" :src="mainIImg.hoversrc" alt="" @mouseout="mainIImg.hoverboolean = false ; mainIImg.boolean = true" >
			</div>
		</div>

	</section>
	
	<section class="quiz_idx">
		<h2>找尋你的個人風格</h2>
		<p>嗨~ 你了解自己嗎 ?<br>也許你不知道自己適合什麼，也許你正在尋找新的自我風格，<span>不論你現在處於什麼狀態，讓 RE:Outfit 一起陪你尋找屬於你的<strong>穿搭風格公式</strong>吧!</span></p>
		<div class="wrap">
			<StyleCard content="時尚風" link="./fashion2-1.png"/>
			<StyleCard content="極簡風" link="./minimalist2-1.png"/>
			<StyleCard content="運動風" link="./sport2-1.png"/>
			<StyleCard content="文青風" link="./hipster2-1.png"/>
			<p>首先，請讓我們更認識你<br>點擊下方開始測驗你的風格</p>
		</div>
		<router-link :to="{ name:'QuestionBox' }"><button class="btn_ns">測驗去</button></router-link>
	</section>

	<section class="sub_part">
		<h2>風格訂閱</h2>
		<div class="sub_body">
			<div class="main_pic">
				<img src="../../public/subStylist.png" alt="">
			</div>
			<h3 class="basic">#BASIC</h3>
			<h3 class="standard">#STANDARD</h3>
			<h3 class="ultra">#ULTRA</h3>
			<div class="text_bg">
				<p> #PREMIUM #單品消費優惠 #每月專屬搭配 #專屬造型顧問 #消費免運費</p>
				<p>#消費免運費 #PREMIUM #每月專屬搭配 #單品消費優惠 #專屬造型顧問 </p>
				<p> #每月專屬搭配 #專屬造型顧問 #單品消費優惠 #消費免運費 #PREMIUM</p>
				<p>#專屬造型顧問 #消費免運費 #PREMIUM #單品消費優惠 #每月專屬搭配 </p>
				<p>#單品消費優惠 #每月專屬搭配 #專屬造型顧問 #PREMIUM #消費免運費</p>
			</div>	
		</div>
		<router-link to="/subscription"><button class="btn_ns">訂閱去</button></router-link>

	
	</section>

	<section class="consult_part">
		<h2 class="our_stylist_h2">
			我們的造型師
		</h2>
		<div class="our_stylist">
			
			<h2>#Our Stylist</h2>
			<h2 class="sec-h2">#Our Stylist</h2>
			<div class="our_stylist_main">
				<div class="our_stylist_pic" v-for="stylistPic of stylistPics" :key="stylistPic">
					<img :src="stylistPic.src" alt="">
				</div>
			</div>
		</div>
		<div class="last_content">
		<h2>
			讓穿搭成為生活樂趣
		</h2>
		<p>
			風格造型師來帶領你，學習穿搭技巧、儀態調整，也重新認識自己，找出適合自己的穿搭風格！
		</p>
		<router-link :to="{ name:'Consultating'}">
			<Button class="btn_ns">諮詢造型師</Button>
		</router-link>
		
	</div>
	</section>

	<section class="product_part">
		<h2>熱銷單品</h2>
		  <div class="container">
				<div class="row row-cols-2 row-cols-md-2 row-cols-xl-4">
					<div class="col" v-for="(productImg,index) of productImgs" :key="index">
						<StyleCard :link="productImg.src" :content="productImg.content"></StyleCard>
					</div>
				</div>
		  </div>
		
	</section>
</template>

<script>
	import StyleCard from "@/components/StyleCard.vue";
	
	export default {
	

		name: "HomeView",
		components: {
			StyleCard,
		},
// 		setup(){
// 			const marquee = document.querySelectorAll('.img_marquee_item');
// 
// 		
// 			addEventListener("load", function () {
// 				marquee.forEach(el => {
// 					// set a default rate, the higher the value, the faster it is
// 					const rate = 200;
// 					// get the width of the element
// 					const distance = el.clientWidth;
// 					// get the margin-right of the element
// 					const style = window.getComputedStyle(el);
// 					const marginRight = parseInt(style.marginRight) || 0;
// 					// get the total width of the element
// 					const totalDistance = distance + marginRight;
// 					// get the duration of the animation 
// 					// for a better explanation, see the quoted codepen in the first comment
// 					const time = totalDistance / rate;
// 					// get the parent of the element
// 					const container = el.parentElement;
// 
// 					gsap.to(container, time, {
// 						repeat: -1,
// 						x: '-'+totalDistance,
// 						ease: Linear.easeNone,
// 					});
// 				});
// 			});
// 			return{marquee,}
// 		},

		data(){
			return{
				mainImgs:[
					{src:'./img_marquee_1.jpg',boolean:true,hoversrc:'./img_hover_1.jpg',hoverboolean:false},
					{src:'./img_marquee_2.jpg',boolean:true,hoversrc:'./img_hover_2.jpg',hoverboolean:false},
					{src:'./img_marquee_3.jpg',boolean:true,hoversrc:'./img_hover_3.jpg',hoverboolean:false},
					{src:'./img_marquee_4.jpg',boolean:true,hoversrc:'./img_hover_4.jpg',hoverboolean:false},
					{src:'./img_marquee_5.jpg',boolean:true,hoversrc:'./img_hover_5.jpg',hoverboolean:false},
					{src:'./img_marquee_6.jpg',boolean:true,hoversrc:'./img_hover_6.jpg',hoverboolean:false},
				],
				mainIImgs:[
					{src:'./img_marquee_4.jpg',boolean:true,hoversrc:'./img_hover_4.jpg',hoverboolean:false},
					{src:'./img_marquee_5.jpg',boolean:true,hoversrc:'./img_hover_5.jpg',hoverboolean:false},
					{src:'./img_marquee_2.jpg',boolean:true,hoversrc:'./img_hover_2.jpg',hoverboolean:false},
					{src:'./img_marquee_1.jpg',boolean:true,hoversrc:'./img_hover_1.jpg',hoverboolean:false},
					{src:'./img_marquee_6.jpg',boolean:true,hoversrc:'./img_hover_6.jpg',hoverboolean:false},
					{src:'./img_marquee_3.jpg',boolean:true,hoversrc:'./img_hover_3.jpg',hoverboolean:false},
				],
				


				productImgs:[
					{src:'./productImg_1.png',content:'外套'},
					{src:'./productImg_2.png',content:'西裝外套'},
					{src:'./productImg_3.png',content:'襯衫'},
					{src:'./productImg_4.png',content:'長袖'},
					{src:'./productImg_5.png',content:'短袖'},
					{src:'./productImg_6.png',content:'長褲'},
					{src:'./productImg_7.png',content:'配件'},
					{src:'./productImg_8.png',content:'鞋子'},
				],
				stylistPics:[
					{src:'./stylist-8.jpg'},
					{src:'./stylist-4.jpg'},
					{src:'./stylist-5.jpg'},
					{src:'./stylist-6.jpg'},
					{src:'./stylist-7.jpg'},
					{src:'./stylist-3.jpg'},
				],
			}
		},
		mounted(){
		
			

		}
		,
		methods:{
		
		}
	};
</script>
<style lang="scss" scoped>
@import "@/assets/sass/grid";
	.home_cover{
		position: relative;
		.logo{
			position:absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			width: 50%;
			background-color: $main_color;
			padding: 3.5%;
			// height: 50%;	
			z-index: 5;
			@include m{
					width: 25%;
					padding: 1.5%;
				}
		}

		
		@keyframes Loop1 {
			0% {
				-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0)
			}
			100% {
				-webkit-transform: translate3d(-600%, 0, 0);
				transform: translate3d(-600%, 0, 0)
			}
		}

		@keyframes Loop2 {
			0% {
				-webkit-transform: translate3d(-50%, 0, 0);
				transform: translate3d(-50%, 0, 0)
			}
			100% {
				-webkit-transform: translate3d(-650%, 0, 0);
				transform: translate3d(-650%, 0, 0)
			}
		}



		.img_marquee{
			
			display: inline-block;
			white-space:nowrap;
			overflow: hidden;
			vertical-align: middle;
			
			.img_marquee_item{
				animation: Loop1 14s linear infinite;
				display: inline-block;
				white-space:nowrap;
				width: 55%;
				@include m{
					width: 18%;
				}
				z-index: -2;
				// vertical-align: middle;
				img{
					width: 100%;
					vertical-align: middle;
				}
			}
			
			
		}
		.img_marquee_2{
			display: inline-block;
			white-space:nowrap;
			overflow: hidden;

			
			.img_marquee_item{
				animation: Loop2 15s linear infinite;
				display: inline-block;
				white-space:nowrap;
				width: 55%;
				@include m{
					width: 18%;
				}
				z-index: -2;
				img{
					width: 100%;
					vertical-align: middle;
				}
			}
			
		}
	}
	.sub_part{
		padding-top:30px ;
		@include m{
			padding-top:50px ;
		}

		h2{
			color: $title_color;
			font-size: 32px;
			@include m{
				font-size: 48px;
				margin-bottom: 30px;
			}
			text-align: center;
			font-weight: 700;
			margin-bottom: 10px;
		}
		.sub_body{
			position: relative;
			overflow: hidden;
			.main_pic{
				position: relative;
				width: 55%;
				max-width: 360px;
				margin: auto;
				margin-top:50px ;
				z-index: 5;
				@include m{
					width: 30%;
				}
				img{
					width: 100%;
					height: 100%;
					object-fit: cover;
					z-index: 5;
				}
			}
			h3{
				overflow: hidden;
				color: $main_color;
				font-size:4rem ;
				font-family: "Poppins", sans-serif;
    			font-weight: 900;
				// @include m{
				// 	font-size:56px ;
				// }
				font-weight: 700;
				font-style: italic;
			}
			.basic{
				position: absolute;
				top: 7%;
    			left: 5%;
				font-size:3.5rem ;
				@include m{
					// position: absolute;
					top: 15%;
    				left: 55%;
					font-size:4rem ;
				}
				
				z-index: -1;
			}
			.standard{
				position: absolute;
				top: 45%;
				left: 11.5%;
				font-size:3rem ;
				@include m{
					font-size:4rem ;
					top: 50%;
					left: 18%;
					z-index: -1;

				}
				
				z-index: 6;
			}
			.ultra{
				overflow: hidden;
				top: 80%;
				left: 30%;
				font-size:3.8rem ;
				@include m{
					font-size:4rem ;
					top: 70%;
					left: 58%;
				}
				position: absolute;
				
				z-index: 6;
			}
			.text_bg{
				position:absolute;
				top: 0;
				z-index: -5;
				width: 100%;
				overflow: hidden;
				// white-space:nowrap;
				p{	
					display: inline-block;
					white-space:nowrap;
					overflow: hidden;
					font-size:5rem;
					font-weight: 900;
					z-index: -5;
					line-height: 7.5rem;
					color: $second-color;
					&:nth-child(2){
						margin-left: -30px;
					}
					&:nth-child(3){
						margin-left: -80px;
					}
					&:nth-child(4){
						margin-left: 20px;
					}
					&:nth-child(5){
						margin-left: -200px;
					}
					
				}
			

			}
		}
		button{
			margin: 50px auto 80px;
			display: block;
			cursor: pointer;
		}
		
	}
	.product_part{
		padding-top:30px ;
		padding-bottom: 80px;
		@include m{
			padding-top:50px ;
		}
		.container{
			margin-bottom: 80px;
			.row{
				// gap: 5px;
			}
			// width:100% ;
			max-width: 1200px;
			// margin: auto;
			.item{
				width: 80%;
				margin: auto;
				margin-top: 50px;
			}
			
		}
		h2{
			color: $title_color;
			font-size: 32px;
			@include m{
				font-size: 48px;
			}
			text-align: center;
			font-weight: 700;

		}
	}

	.consult_part{
		padding-top:20px;
		@include m{
			padding-top:50px ;
		}
		width: 100%;
		max-width: 1200px;
		margin: auto;
	}

	.our_stylist_h2{
			font-size: 32px;
			@include m{
				font-size: 48px;
				margin-bottom: 50px;
			}
			color: $title_color ;
			font-weight: 700;
			line-height: 32px;
			text-align: center;
			margin-bottom: 30px;
		}
	.our_stylist{
		display: flex;
		flex-direction: column;
		margin: auto;
		position: relative;
		margin-bottom: 30px;
		
		
		@include m{
			flex-direction: row;
			width: 85%;
			margin: auto;
			margin-bottom: 30px;
		}
		h2{
			position:absolute;
			top: 13%;
			left: 0;
			right: 0;
			// bottom: 0;
			margin: auto;
			font-weight: 900;
			font-size: 32px;
			@include m{
				font-size: 48px;
				
			}
			font-style: italic;
			width: fit-content ;
			height: fit-content;

			@include m{
				left: 0;
				top: 0;
				bottom: 0;
			}
		
		}

		.sec-h2{
			// bottom: 0;
			top: 80%;

			@include m{
				display: none;
			}
			
		}

		.our_stylist_main{
			display: flex;
			flex-wrap:wrap;
			justify-content: center;
			@include m{
				width: 100%;
				// gap: 10px;
			}
			
			
			.our_stylist_pic{
				@include m{
					width: 30%;
					
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
	}
	.last_content{
		margin: 30px 10% 50px;
		h2{
			font-size:32px ;
			color: $title_color ;
			font-weight: 700;
			line-height: 64px;
		}
		p{
			font-size: 16px;
			color:$text_color;
			line-height: 30px;
		}
		Button{
			width: fit-content;
			margin-top:30px ;
		}
		text-align: center;
	}
	
	.quiz_idx{
		padding-top:20px;
		@include m{
			padding-top:50px ;
		}
		box-sizing: border-box;
		max-width: 1200px;
		margin: 0 5% 50px;
	h2{
		font-size: 32px;
		color: $title_color;
		font-weight: 600;
		text-align: center;
		padding: 30px;
	}
	p{
		margin: 0 5%;
		font-size: 16px;
		text-align: center;
		color: $text_color;
		line-height: 24px;
		strong{
			font-weight: 600;
			position: relative;
			&:after{
				content: "";
				background-color: $main_color;
				height: 5px;
				width: 100%;
				position: absolute;
				left: 0;
				bottom: 0;
				z-index: -1;
			}
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
	.quiz_idx{
		margin: 0 auto 50px;
		h2{
			font-size: 48px;
		}
		p{
			font-size: 18px;
			line-height: 30px;
			span{
				display: block;
			}
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