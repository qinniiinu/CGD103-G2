<template>
	<section class="home_cover">
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
			<div class="img_marquee_item" v-for="(mainImg,index) of mainImgs" :key="index">
				<img  v-show="mainImg.boolean"  :src="mainImg.src" alt="" @mouseenter="mainImg.boolean = false ; mainImg.hoverboolean = true">
				<img  v-show="mainImg.hoverboolean" :src="mainImg.hoversrc" alt="" @mouseout="mainImg.hoverboolean = false ; mainImg.boolean = true" >
			</div>
			<div class="img_marquee_item" v-for="(mainImg,index) of mainImgs" :key="index">
				<img  v-show="mainImg.boolean"  :src="mainImg.src" alt="" @mouseenter="mainImg.boolean = false ; mainImg.hoverboolean = true">
				<img  v-show="mainImg.hoverboolean" :src="mainImg.hoversrc" alt="" @mouseout="mainImg.hoverboolean = false ; mainImg.boolean = true" >
			</div>
		</div>

	</section>
	
	<section class="quiz_idx">
		<h2>找尋你的個人風格</h2>
		<p>嗨~ 你了解自己嗎 ?<br>也許你不知道自己適合什麼，也許你正在尋找新的自我風格，<br>不論你現在處於什麼狀態，讓 UR:Style 一起陪你尋找屬於你的<strong>穿搭風格公式</strong>吧!</p>
		<div class="wrap">
			<StyleCard content="時尚風" link="./style1.png"/>
			<StyleCard content="極簡風" link="./style2.png"/>
			<StyleCard content="運動風" link="./style3.png"/>
			<StyleCard content="文青風" link="./style4.png"/>
			<p>首先，請讓我們更認識你<br>點擊下方開始測驗你的風格</p>
		</div>
		<router-link :to="{ name:'QuestionBox' }"><Button class="btn_s">測驗去</Button></router-link>

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
		</div>
		<button class="btn_s">訂閱去</button>
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
			<Button class="btn_s">諮詢造型師</Button>
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

		data(){
			return{
				mainImgs:[
					{src:'/img_marquee_1.png',boolean:true,hoversrc:'/img_hover_1.png',hoverboolean:false},
					{src:'/img_marquee_2.png',boolean:true,hoversrc:'/img_hover_2.png',hoverboolean:false},
					{src:'/img_marquee_3.png',boolean:true,hoversrc:'/img_hover_3.png',hoverboolean:false},
					{src:'/img_marquee_4.png',boolean:true,hoversrc:'/img_hover_4.png',hoverboolean:false},
					{src:'/img_marquee_5.png',boolean:true,hoversrc:'/img_hover_5.png',hoverboolean:false},
					{src:'/img_marquee_6.png',boolean:true,hoversrc:'/img_hover_6.png',hoverboolean:false},
				],
				productImgs:[
					{src:'/productImg_1.png',content:'外套'},
					{src:'/productImg_2.png',content:'西裝外套'},
					{src:'/productImg_3.png',content:'襯衫'},
					{src:'/productImg_4.png',content:'長袖'},
					{src:'/productImg_5.png',content:'短袖'},
					{src:'/productImg_6.png',content:'長褲'},
					{src:'/productImg_7.png',content:'配件'},
					{src:'/productImg_8.png',content:'鞋子'},
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
		.img_marquee{
			display: flex;
			overflow: hidden;
			
		}
		.img_marquee_2{
			display: flex;
			overflow: hidden;
			
		}
	}
	.sub_part{

		h2{
			color: $title_color;
			font-size:32px ;
			text-align: center;
			font-weight: 700;
		}
		.sub_body{
			position: relative;
			.main_pic{
				width: 30%;
				max-width: 360px;
				margin: auto;
				margin-top:50px ;
				img{
					width: 100%;
					height: 100%;
					object-fit: cover;
				}
			}
			h3{
				color: $main_color;
				font-size:32px ;
				font-family: "Poppins", sans-serif;
    			font-weight: 900;
				@include m{
					font-size:56px ;
				}
				font-weight: 700;
				font-style: italic;
			}
			.basic{
				position: absolute;
				top: 15%;
    			left: 53%;
				@include m{
					// position: absolute;
					top: 15%;
    				left: 55%;
				}
				
				z-index: -1;
			}
			.standard{
				position: absolute;
				top: 50%;
				left: 10%;
				@include m{
					top: 50%;
					left: 18%;
				}
				
				// z-index: -1;
			}
			.ultra{
				top: 70%;
				left: 58%;
				@include m{
					top: 70%;
					left: 60%;
				}
				position: absolute;
				
				z-index: -1;
			}
		}
		button{
			margin: 50px auto 80px;
			display: block;
		}
		
	}
	.product_part{
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
			font-size:32px ;
			text-align: center;
			font-weight: 700;

		}
	}



	.our_stylist_h2{
			font-size:32px ;
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
				left: 0;
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
				width: 100%;
				// gap: 10px;
			}
			
			
			.our_stylist_pic{
				@include m{
					width: 33%;

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
		margin: 50px 0;
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
			margin-top:50px ;
		}
		text-align: center;
	}
	
	.quiz_idx{
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
		.quiz_idx{
			h2{
				font-size: 48px;
			}
			p{
				font-size: 18px;
				line-height: 27px;
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