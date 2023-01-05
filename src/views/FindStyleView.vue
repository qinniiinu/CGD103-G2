<template>
	<div class="cover_Pic">
		<div class="cover_main">
			<h2>Don’t know how to wear?</h2>
			<p>快來探索屬於你的專屬風格</p>
			
			<router-link to="/Wearing"><button class="btn_ns">看更多穿搭</button></router-link>
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
			
			<StyleCard content="時尚風" link="./pic/fashion2-1.png"/>
			<StyleCard content="極簡風" link="./pic/minimalist2-1.png"/>
			<StyleCard content="運動風" link="./pic/sport2-1.png"/>
			<StyleCard content="文青風" link="./pic/hipster2-1.png"/>
			<p>
				不確定自己適合哪種風格嗎 ? 
				<br>
 				現在立刻前往個人風格測驗分析
			</p>
		</div>
		<router-link :to="{ name:'QuestionBox' }"><button class="btn_ns">測驗去</button></router-link>
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

	<section class="mulstyles_page">
		<h2>風格穿搭</h2>
		<div class="style_type">
			<div class="type_item" v-for="(styleType,index) of styleTypes" :key="index">
				<div class="type_pic">
					<img :src="styleType.src" alt="">
				</div>
				<p>{{styleType.text}}</p>
			</div>
		</div>
		


		<router-link to="/MulStyles"><button class="btn_ns">看更多</button></router-link>
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
	
	<div class="chat_stylist">
		<h2>風格諮詢</h2>
		<div class="our_stylist">
		
			<h3>#Our Stylist</h3>
			<h3 class="sec-h2">#Our Stylist</h3>
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
				<router-link :to="{ name:'Consultating'}">
					<button class="btn_ns"> 諮詢造型師 </button>
				</router-link>
		
			</div>
		</div>
	</div>
		 		

</template>



<script>
import StyleCard from "@/components/StyleCard.vue";


export default {
	name: "FindStyle",
	components: {
		StyleCard,

	},

	data() {
    	return {
			logoText:'RE:Outfit  ',
			stylistPics:[
				{src:'./pic/stylist-8.jpg'},
				{src:'./pic/stylist-4.jpg'},
				{src:'./pic/stylist-5.jpg'},
				{src:'./pic/stylist-6.jpg'},
				{src:'./pic/stylist-7.jpg'},
				{src:'./pic/stylist-3.jpg'},
			],
			styleTypes:[
				{src:'./look/style_type1.jpg',text:'#野營Outdoor風'},
				{src:'./look/style_type2.jpg',text:'#都會休閒風'},
				{src:'./look/style_type3.jpg',text:'#居家健身風'},
				{src:'./look/style_type4.jpg',text:'#登山Outdoor風'},
			],
		}
	}
};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/main";
.cover_Pic{
	width: 100%;
	height: 100vh;
	background-image:url("../../public/pic/cover-photo.jpg");
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
		font-size: 28px;
		@include m{
			font-size: 32px;
		}
		text-align: center;
		font-weight: 700;
		color: $third_color;
		margin-bottom:20px ;
		margin-top:auto ;
	}
	Button{
		display: block;
		margin: auto;
		margin-top:50px ;
	}
}
.mulstyles_page{
	width: 85%;
    max-width: 960px;
	@include m{
		width: 90%;
    	max-width: 1080px;
		
	}
	@include xl{
		width: 100%;
    	max-width: 1200px;
	}
	margin: auto;
	h2{
		text-align: center;
		font-weight: 700;
		color: $title_color;
		font-size: 32px;
		margin-bottom:30px;
		@include m{
			font-size: 48px;
		}
	}
	.style_type{
		display:flex;
		width: 100%;
		gap:20px;
		flex-wrap: wrap;
		@include xl{
			width: 95%;
			margin: auto;
		}
		.type_item{
			display:flex;
			flex-direction: column;
			
			.type_pic{
				position: relative;
				&::before {
					content:"";
					position: absolute;
					top: 5px;
					left: 5px;
					border: 1px solid #000;
					background-color: #EEEEEE;
					width: 100%;
					height: 100%;
					z-index: -1;
				}

				&::after {
					content: "";
					position: absolute;
					top: 10px;
					left: 10px;
					border: 1px solid #000;
					background-color: #D7D7D7;
					width: 100%;
					height: 100%;
					z-index: -2;
				}
			}
			
			@include ss{
				width: 48%;
				margin-bottom:10px ;
			}
			margin: 10px auto;
			width: 100%;
			margin-bottom:30px ;

			@include m{
				width: 22%;
				margin-bottom:10px ;
			}
			p{
				font-style: italic;
				font-weight: 700;
				font-size: 28px;
				margin-top: 25px;
				text-align: center;
				@include ss{
					margin-top: 20px;
					font-size: 20px;
					// text-align: center;

				}	

				@include m{
					font-size: 24px;
					text-align: start;
				}
				@include xl{
					font-size: 32px;
					text-align: start;
				}
				
			}
			img{
				width: 100%;
				height: 100%;
				object-fit: cover;
				position: relative;
				border: 1px solid #000;
				margin-bottom:10px;
				@include m{
					margin-bottom:20px;
				}
				
			
			}
			&:nth-child(1){
				.type_pic{
					@include m{
						margin-top:20px;
						order: 1;
						margin-bottom:0px;
					}
					
				}
			}
			&:nth-child(3){
				.type_pic{
					@include m{
						margin-top:20px;
						order: 1;
						margin-bottom:0px;
					}
				}
			}

			&:nth-child(2){
				p{
					@include m{
						margin-top:20px;
						
					}
					
				}
			}
			&:nth-child(4){
				p{
					@include m{
						margin-top:20px;
						
					}
				}
			}
		
		}
	}
	button{
		display:block;
		margin: auto;
		margin-top:10px ;
		@include ss{
			margin-top:30px ;
		}
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
	.chat_stylist{
		margin: auto;
		margin-bottom: 50px;
		h2{
			font-size: 32px;
			color: $title_color;
			font-weight: 600;
			text-align: center;
			margin: 0px 0px 40px;
			@include m{
				font-size: 48px;
			}
		}
		
	}
	.our_stylist{
		display: flex;
		flex-direction: column;
		margin: auto;
		position: relative;
	
		
		@include m{
			flex-direction: row;
			width: 85%;
			margin: auto;
			margin-bottom: 80px;
		}
		
		h3{
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
				width: 60%;
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
			background-color:$second_color;
			display: flex;
			align-items: center;
			justify-content: space-around;
			@include m{
					width: 40%;
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
				margin: 20px;

			}
			Button{
				height: 60px;
				line-height: 30px;
				// color: aliceblue;
			}

		}
	}

</style>
