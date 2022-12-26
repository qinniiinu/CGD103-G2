<template>
	<div class="cover">
		<!-- <h2>你有穿搭困擾嗎？</h2> -->
		<video autoplay muted loop class="chat_cover">
			
			<source src="/pic/test_03.mp4" type="video/mp4">
		</video>
	</div>
	
	
	<section>
		<div class="trouble_part">
			<h2>
				你也有相同困擾嗎
			</h2>
			<div class="trouble_item" v-for="trouble of troubles" :key="trouble">
				<p>{{trouble}}</p>
			</div>
		</div>

	</section>
	<section>
		<div class="consult_part">
			<h2>
				風格諮詢
			</h2>
			<div class="consult_item"  v-for="(consultPic,index) in consultPics" :key="index">
				<img :src="consultPic.src" alt="">
				<div class="consult_content">
					<h3 class="consult_title" >
						{{consultTitle[index]}}
					</h3>
					<p class="consult_text">
						{{consultText[index]}}
					</p>
					<div class="consult_tag">
						<p >
							{{consultTag[index]}}
						</p>
					</div>
				</div>
			</div>
		</div>

	</section>
	<section>
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
	</section>
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
</template>
<script>
import { gsap } from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default {
	name: "Chat",
	components: {
		gsap,
		ScrollTrigger,

	},

	

	data() {
    	return {
			troubles:[
				'想嘗試更多風格',
				'不了解自己適合什麼',
				'對自己的穿搭沒自信',
				'想把單品穿搭成多組合',
				'不敢嘗試新風格',
				'不想思考每天要穿什麼',
				'想學穿搭不知道怎麼開始',
				'不確定特定場合怎麼穿搭',
				'買不到適合自己的衣服',
				'想要更多穿搭靈感',
				'很怕穿不適合的衣服',
				'不知道要買什麼衣服',
			],
			consultPics:[
				{src:'./pic/trouble_pic1.jpg'},
				{src:'./pic/trouble_pic2.jpg'},
				{src:'./pic/trouble_pic3.jpg'},
				{src:'./pic/trouble_pic4.jpg'},
			],
			consultText:[
				'建立基本風格確實需要勇氣，同時也要對現今的自己有正確的接納與理解。除了自己的風格，也必須認識其他的品味。',
				'當個人對服裝的喜好傾向與適合風格變得一致，衣服才能穿得長久，自然不會浪費，選購服裝時最好從版型及剪裁著手，先判斷這兩項元素是否適合自己；只要沒有問題，再確認材質是否得宜、顏色是否相襯即可。',
				'我們雖然有必要建立基本風格，但無需誤以為現在的風格就代表全世界。除了自己的風格，也必須認識其他的品味，如此一來，當人生出現變化時，這些知識將有助於我們快速地重建嶄新的風格。',
				'如何才能培養出鑑賞好物的能力？唯一的方法就是鍛鍊自己的五感，讓自己處於能帶來正面影響的環境，懂得鑑賞好物，身邊就不會再出現廉價的劣質品。',
			],
			consultTitle:[
				'認識自己，了解喜好',
				'什麼才叫做適合?',
				'建立自己風格',
				'日常練習',
			],
			stylistPics:[
				{src:'./pic/stylist-8.jpg'},
				{src:'./pic/stylist-4.jpg'},
				{src:'./pic/stylist-5.jpg'},
				{src:'./pic/stylist-6.jpg'},
				{src:'./pic/stylist-7.jpg'},
				{src:'./pic/stylist-3.jpg'},
			],
			consultTag:[
				'SELF-RECOGNITION',
				'SUIT YOURSELF',
				'CREATE YOUR OWN STYLE',
				'DAILY OUTFITS',
			]
		}
	},
	mounted(){
	

		gsap.to('.trouble_item:nth-child(2)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(2)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		
		gsap.to('.trouble_item:nth-child(3)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(3)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(4)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(4)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(5)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(5)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(6)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(6)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		}),
		gsap.to('.trouble_item:nth-child(7)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(7)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(8)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(8)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		}),
		gsap.to('.trouble_item:nth-child(9)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(9)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(10)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(6)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(11)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(5)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(12)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(4)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
		gsap.to('.trouble_item:nth-child(13)',{
			scale:1,
			scrollTrigger: {
			trigger: '.trouble_item:nth-child(3)', 
			start: "center bottom ",  
			end: "bottom center", 
			
			scrub: true, 
			markers:false,
			} 
		})
	},
};

</script>
<style lang="scss" scoped>
	@import "@/assets/sass/main";
	.cover{
		position: relative;

		// h2{
		// 	text-align: center;
		// 	color: $second_color;
		// 	font-size:72px ;
		// 	font-weight: 700;
		// 	position: absolute;
		// 	top: 0;
		// 	bottom: 0;
		// 	left:0; 
		// 	right: 0;
		// 	margin: auto;
		// 	line-height: 100vh;
		// }
	}

	.chat_cover{
		width: 100%;
		margin: auto;
	}
	.trouble_part{
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: space-evenly;
		@include m{
			display: block;
			position: relative;
			height: 85vh;
		}
		height: 100vh;
		h2{
			font-size:32px ;
			color: $title_color ;
			font-weight: 700;
			margin: 50px ;
			text-align: center;
		}
		.trouble_item{
			
				transform: scale(0);
				// color: $text_color ;
				font-size: 16px;
				padding: 20px;
				border-radius:50% ;
				border: 2px solid $main_color;
				width: fit-content;
				font-weight: 700;
				@include m{
					display:block;
					position:absolute;
					padding: 30px;
					font-size: 18px;
				}
		
		}
		
		.trouble_item:nth-child(2) {
			
			@include m{
				top: 23%;
				left: 10%;
			}
		}
		.trouble_item:nth-child(3){
			
			@include m{
				top: 15%;
				left: 30%;
			}
		}
		.trouble_item:nth-child(4){
			
			@include m{
				top: 20%;
				left: 50%;
			}
		}
		.trouble_item:nth-child(5){
			top:40% ;
			left:60% ;
			@include m{
				top: 12%;
				left: 80%;
			}
		}
		.trouble_item:nth-child(6){
			top:80% ;
			left:0 ;
			@include m{
				top: 55%;
				left: 3%;
			}
		}
		.trouble_item:nth-child(7){
			top:80% ;
			left:0 ;
			@include m{
				top: 40%;
				left: 23%;
			}
		}
		.trouble_item:nth-child(8){
			
			@include m{
			top: 55%;
			left: 45%;
			}
		}
		.trouble_item:nth-child(9){
			
			@include m{
			top: 35%;
			left: 70%;
			}
		}
		.trouble_item:nth-child(10){
			top:80% ;
			left:0 ;
			@include m{
				top: 80%;
				left: 8%;
			}
			
		}
		.trouble_item:nth-child(11){
		
			@include m{
			top: 70%;
			left: 28%;
			}
		}
		.trouble_item:nth-child(12){
			
			@include m{
			top: 85%;
			left: 58%;
			}
		}
		.trouble_item:nth-child(13){
			
			@include m{
			top: 65%;
			left: 77%;
			}
		}
		.trouble_item:nth-child(3n) {
			background-color: $main_color;
			color:$second_color;
		}

	}
	.consult_part{
	
		background-color: $second_color;
		h2{
			font-size:32px ;
			color: $title_color ;
			font-weight: 700;
			margin: 50px 0;
			text-align: center;
			padding-top: 30px;
		}
		.consult_item:nth-child(2n-1){
			.consult_content{
				@include m{
					order:-1;
					h3{
					text-align: end;
				}
				p{
					text-align: end;
				}
				}
				
				.consult_tag{
					// color:transparent;
					// -webkit-text-stroke: 2px $main_color;;
					// font-size: 48px;
					font-weight: 900;
					text-align: center;
				}
			}
		}	
		.consult_item:last-child{
			padding-bottom: 50px;
		}		
		.consult_item{
			width: 80%;
			margin: 50px auto;
			max-width: 1200px;
			display: flex;
			align-items: center;
			flex-direction: column;
			@include m{
				flex-direction: row;
			}
			gap: 20px;
			img{
				width: 80%;
				@include m{
					width: 45%;
				}
				
			}
			.consult_content{

				@include m{
					width: 55%;
				}
				width: 80%;
				display: flex;
				flex-direction: column;

				h3{
					font-size:24px ;
					font-weight: 700;
					color: $title_color;
					line-height: 46px;
					flex-grow:1 ;

				}
				p{
					font-size: 16px;
					color:$text_color;
					line-height: 24px;
					flex-grow:1 ;
				}
				.consult_tag{
					display: flex;
					flex-grow:8;
					align-items: center;
					p{
						display: block;
						color:transparent;
						-webkit-text-stroke: 2px $main_color;;
						font-size: 40px;
						line-height: 60px;
						@include m{
							font-size: 46px;
							line-height: 70px;
							text-align: center;
						}
						@include l{
							font-size: 56px;
							line-height: 81px;
							text-align: center;
						}
						font-weight: 900;
						text-align: start;
						width: fit-content;
						margin: auto;
						text-shadow: 5px 4px #fff;
					}
					// line-height: 96px;
				}
			}
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
	
</style>