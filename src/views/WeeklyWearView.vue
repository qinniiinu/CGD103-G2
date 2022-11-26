<template>
	<div class="weeklywear">
		<h1 class="title">一週穿搭公式<br>讓你/妳有更多穿搭靈感</h1>
		<section class="section_one">
			<ul class="weekbox">
				<li>Monday</li>
				<li>Tuesday</li>
				<li>Wednesday</li>
				<li>Thursday</li>
				<li>Friday</li>
				<li>Weekend</li>
			</ul>
			<div class="imgbox">
				<img class="img_left"  src="../assets/weeklywear_pic/female01.jpg" alt="女裝01">
				<img class="img_right"  src="../assets/weeklywear_pic/female01.jpg" alt="女裝01"> 
			</div>
			<div class="bgpic">
				<div class="line"></div>
				<img class="bg_right" src="../assets/weeklywear_pic/bg_blue.png" alt="背景圖">
				<img class="bg_left" src="../assets/weeklywear_pic/bg_blue.png" alt="背景圖">
			</div>
		</section>
		
		<section class="section_two">
			<h2 class="subtitle">利用多層次搭配，即使是寒冷季節也能穿出輕盈感</h2>
			<p class="text">輕盈溫暖的夾層外套，本季依然大受歡迎。
			衣寬恰到好處，內搭針織上衣也不顯臃腫，
			適合搭配各種下半身單品的衣長設計更是加分。
			能穿出高品味的優美色調，搭配白色讓冬季造型也擁有輕快氣息。
			</p>
			<div class="line_second"></div>
			<div class="box_female">
				<img class="img_female"  src="../assets/weeklywear_pic/female01.jpg" alt="女裝01">
				<div class="videobox">
					<!-- <iframe class="video" src="https://drive.google.com/file/d/1-8JVd-ebsYMUjzi0CNMPU_WRMNzXMwab/preview" allow="autoplay" ></iframe> -->
				</div>
			</div>
		</section>

		<section class="section_three">
			<h2 class="subtitle">利用多層次搭配，即使是寒冷季節也能穿出輕盈感</h2>
			<p class="text">輕盈溫暖的夾層外套，本季依然大受歡迎。
			衣寬恰到好處，內搭針織上衣也不顯臃腫，
			適合搭配各種下半身單品的衣長設計更是加分。
			能穿出高品味的優美色調，搭配白色讓冬季造型也擁有輕快氣息。
			</p>
			<div class="line_second"></div>
			<div class="box_female">
				<img class="img_female"  src="../assets/weeklywear_pic/female01.jpg" alt="女裝01">
				<div class="videobox">

				</div>
			</div>
		</section>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";

export default {
	name: "Product",
	components: {
		Footer,
	},
};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/main.scss";
	@import "@/assets/sass/grid";

	.weeklywear{
		.title{
			font-size: 48px;
			font-weight: 700;
			font-family: $main_font;
			text-align: center;
			line-height: 100%;
			margin: 50px auto;
			color: $title_color;
		}
		.section_one{
			// max-width: 1200px;
			height: 500px;
			margin: 100px auto 300px auto;
			position: relative;
			.imgbox{
				display: flex;
				.img_left{
					position: absolute;
					top:-30px;
					left: 200px;
					z-index: 4;
				}
				.img_right{
					position: absolute;
					top:30px;
					right: 200px;
					z-index: 4;
				}
			}
			.weekbox{
				display: inline-block;
				position: absolute;
				top:110px;
				right: 660px;
				z-index: 3;
				text-align: center;
				font-size: 32px;
				font-weight: 700;
				font-family: $main_font ;
				color: $text_color;
				// border: 1px solid black;
				li{
					margin: 15px auto;
					cursor: pointer;
					&:hover{
						color:$main_color;
					}
				}

			}
			.bgpic{
				display: flex;
				justify-content: space-between;
				.bg_right{
				position: relative;
				top:30px;
				z-index: 2;
				}
				.bg_left{
					position: relative;
					top:-30px;
					z-index: 2;
				}
				.line{
					width: 0%;
					height: 60px;
					background-color:$second_color ;
					position: absolute;
					top:210px;
					z-index: 1;
					animation: line 1.5s ease-out forwards;

				}
				@keyframes line {
					from{width: 0%;}
					to{width: 100%;}
				}
			}	
		}
		.section_two{
			position: relative;
			height: 1000px;
			.subtitle{
				font-size: 32px;
				font-weight: 700;
				font-family: $main_font;
				text-align: center;
				line-height: 100%;
				margin: 20px auto 15px auto;
				color: $title_color;
			}
			.text{
				width: 605px;
				font-size: 20px;
				font-family: $main_font;
				text-align: center;
				line-height: 160%;
				margin: auto;
				margin-bottom: 180px;
				color: $title_color;
			}
			.line_second{
				width: 100%;
				height: 180px;
				margin: 140px auto;
				background-color:$second_color ;
				position: absolute;
				top:250px;
				z-index: 1;
			}
			.box_female{
				position: relative;
				.img_female{
					position: absolute;
					top:-80px;
					right: 250px;
					z-index: 4;
					width: 20%;
				}
				.videobox{
					position: absolute;
					top:-110px;
					left: 250px;
					z-index: 4;
					width: 427px;
					height: 550px;
					border: 1px solid black;
					// .video{
					// 	width: 1000px;
					// 	height: 100%;
					// 	overflow: hidden;
					// }
				}
			}

		}
		.section_three{
			position: relative;
			height: 1000px;
			.subtitle{
				font-size: 32px;
				font-weight: 700;
				font-family: $main_font;
				text-align: center;
				line-height: 100%;
				margin: 20px auto 15px auto;
				color: $title_color;
			}
			.text{
				width: 605px;
				font-size: 20px;
				font-family: $main_font;
				text-align: center;
				line-height: 160%;
				margin: auto;
				margin-bottom: 180px;
				color: $title_color;
			}
			.line_second{
				width: 100%;
				height: 180px;
				margin: 140px auto;
				background-color:$second_color ;
				position: absolute;
				top:250px;
				z-index: 1;
			}
			.box_female{
				position: relative;
				.img_female{
					position: absolute;
					top:-80px;
					right: 250px;
					z-index: 4;
					width: 20%;
				}
				.videobox{
					position: absolute;
					top:-110px;
					left: 250px;
					z-index: 4;
					width: 427px;
					height: 550px;
					border: 1px solid black;
					// .video{
					// 	width: 1000px;
					// 	height: 100%;
					// 	overflow: hidden;
					// }
				}
			}

		}

	}
	
	
	
</style>