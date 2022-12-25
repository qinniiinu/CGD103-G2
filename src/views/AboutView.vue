<template>
	<div class="landing_page_photo"><!-- 關於我們頁面 -->
		
		<div class="scroll_container" style="overflow-y: scroll; scroll-snap-type:y mandatory;height: 100vh;">
			
			
			<div class="box" style="height: 80vh; position: relative;">
			<video autoplay muted loop>
			<source src="../assets/video/pexels-ron-lach-7289099.mp4" type="video/mp4">
			</video>
				<div class="intro_container" style="height: 100vh; position: sticky; top: 0;">
					<div class="textBox">
						<h2>RE：<font-awesome-icon class="Re-anima" icon="fa-solid fa-recycle" />	<br>OUTFIT</h2>
					</div>
				
			
				</div>
			</div>
			<div class="box" style="height: 1200px; position: relative;">
				<div style="height: 200px; position: sticky; top: 0;">
					<div class="introBox">
		
						<h2>一個，讓過剩衣服<br>再利用的<br>時尚服飾品牌</h2>

					</div>
				</div>
			</div>
			<div class="box" style="height: 1200px; position: relative;">
				
				<div style="height: 200px; position: sticky; top: 0;">
					<div class="introBox">
						<h2>您的支持，減少了每年<br>{{waste}}的浪費</h2>
						<!-- <div class="textPart">
							<p>
								
							</p>
						</div> -->
					</div>
				</div>
			</div>
			<div class="box" style="height: 1200px; position: relative;">
			<video autoplay muted loop>
			<source src="../assets/video/pexels-artem-podrez-7048759.mp4" type="video/mp4">
			</video>
				<div style="height: 200px; position: sticky; top: 0;">
					<div class="introBox">
						<h2>這些衣服來自於<br>大量生產過剩的衣服</h2>
						<!-- <div class="textPart">
							<p>
								
							</p>
						</div> -->
					</div>
				</div>
			</div>
			<div class="box" style="height: 1200px; position: relative;">
				<div style="height: 200px; position: sticky; top: 0;">
					<div class="introBox">
						<h2>我們不斷思考<br>如何再利用這些衣服？</h2>
						<!-- <div class="textPart">
							<p>
								
							</p>
						</div> -->
					</div>
				</div>
			</div>
			<div class="box" style="height: 1500px; position: relative;">
				<video autoplay muted loop>
			<source src="../assets/video/pexels-anna-nekrashevich-8056088.mp4" type="video/mp4">
			</video>
				<div style="height: 200px; position: sticky; top: 0;">
					<div class="introBox">
						<h2>於是建立一個讓過季衣服的<br>整合平台，<br>成為我們的時尚。</h2>
						<!-- <div class="textPart">
							<p>
								
							</p>
						</div> -->
					</div>
				</div>
			</div>
			<div class="box" style="height: 1200px; position: relative;">
				<div style="height: 200px; position: sticky; top: 0;">
					<div class="introBox">
						<h2>歡迎支持我們RE:Outfit<br>讓衣服們找到屬於它的家。</h2>
						<!-- <div class="textPart">
							<p>
								
							</p>
						</div> -->
					</div>
				</div>
			</div>
			
			
			
	</div>
		<!-- <div class="testB"></div>
			<div class="testA">
				<div class="square"></div>
				<div class="square2"></div>
			</div> -->
    </div>
	<div class="contactUs"> <!-- 聯絡我們 -->
		
		<div class="container" id="insert_client" method="post" action="/clientInsert.php">	
			<div class="titleBox">
				<h4>歡迎來信合作</h4>
				<div class="order_title">#CONTACT</div>
				<h1>聯絡我們</h1>
				
				<p>有關商品相關問題(例如：商品瑕疵)，請透過客服專線、電子郵件連繫我們，或到鄰近您的店舖洽詢。(店舖營業時間，請查看 FAQ)</p>
				
			</div>
			<form class="inputBox"  @submit.prevent="checkLogin" id="insert_client" method="post" enctype="multipart/form-data" >
				<input class="inputBar" type="text"  id="client_person" name="client_person"
				placeholder="請輸入姓名">
				<input class="inputBar" type="text" id="client_name" name="client_name" placeholder="請輸入公司名稱">
				<input class="inputBar" type="email" 
				id="client_mail" name="client_mail" placeholder="請輸入信箱">
				<input class="inputBar" type="text" id="client_phone" name="client_phone" placeholder="請輸入連絡電話">
				<input class="inputText" type="textarea" id="client_meg" name="client_meg" placeholder="請輸入詢問內容">
				<div class="sendOut">
					<input class="check" id="isCheck" type="checkbox">  <label for="isCheck">點擊「送出」即表示您同意我們的隱私權條款聲明</label>

				<!-- <button class="btn_ml" @click="insert()" id="update">確認送出</button> -->
				<button class="btn_ml" @click="insert()">送出</button>
				</div>
				
			</form>
		</div>
		</div>
		
			
	

	<div class="FAQ"><!-- 常見問題 -->
		<div class="FAQbox">
			<h1>常見問題</h1>
			<div class="order_title">
				#FAQ
			</div>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nobis sed dolorem quasi, consequuntur </p>
		</div>
	</div>
	<div class="FAQRow">
		<ul>
			<li  v-for="e in faq" :key="e.id" >
				<div class="FAQcontainer">
					<h3>{{e.que}}</h3> 
					<p><span>Q：</span>{{e.how}}</p>
					<p><span>A：</span>{{e.ans}}</p>
					<div class="buttonPart">
						<router-link to ="/Faq">
							<button class="btn_ml">看更多</button>
						</router-link>
					</div>
				</div>
			</li>
			
			
		</ul>
	</div>
	<div class="aBox">

		<a href="">
			看更多
		</a>>
	</div>

	<Footer></Footer>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
import { gsap } from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import Header from "@/components/Header.vue";
import Button from "@/components/Button.vue";
import { MotionPathPlugin } from 'gsap/all';

gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(MotionPathPlugin);


export default {
	name: "About",
	components: {
		Header,
		Button,
		gsap,
		ScrollTrigger,
	},
	data(){
		return{
			waste:'8000件衣服',
			faq:[
				{
				id:1,
				que:"退換貨問題",
				how:"如何退貨",
				ans:"只要還沒剪標籤，都可以在十四日內郵寄退貨",
				},	
				{
				id:2,
				que:"退換貨問題",
				how:"如何退貨",
				ans:"只要還沒剪標籤，都可以在十四日內郵寄退貨",
				},
				{
				id:3,
				que:"退換貨問題",
				how:"如何退貨",
				ans:"只要還沒剪標籤，都可以在十四日內郵寄退貨",
				},
				{
				id:4,
				que:"退換貨問題",
				how:"如何退貨",
				ans:"只要還沒剪標籤，都可以在十四日內郵寄退貨",
				},
				{
				id:5,
				que:"退換貨問題",
				how:"如何退貨",
				ans:"只要還沒剪標籤，都可以在十四日內郵寄退貨",
				},
				{
				id:6,
				que:"退換貨問題",
				how:"如何退貨",
				ans:"只要還沒剪標籤，都可以在十四日內郵寄退貨",
				},
				{
				id:7,
				que:"退換貨問題",
				how:"如何退貨",
				ans:"只要還沒剪標籤，都可以在十四日內郵寄退貨",
				},	
			],
			client:[],
		};
	},
	methods: {
	checkLogin() {
      if (!this.client_mail || !this.client_name ) {
        alert("輸入成功！");
        return;
      }
	
    },
		insert() {
			fetch(`http://localhost/cgd103_g2_frontend/phpfile/clientInsert.php`,{
				method:'post',
				body:new FormData(document.querySelector('.inputBox'))
			}).then((res)=>res.json())
			.then((json)=>console.log(json))
	  
	}},
	
	mounted(){
		gsap.to(".FAQcontainer",{
		    x:1000,
		    duration:8,
		    scrollTrigger:{
			trigger:".FAQRow",
			start:"top 40%",
			end:"top 0%",
			// markers:true,
			scrub:8,

		},
	})

	/* FAQ滑鼠控制 */
	// gsap.to(".textBox",1,{
	// 	    delay:1.3,
	// 		opacity:0,
	// 		y:20,
	// })



	}
};




</script>







<style lang="scss" scoped>

@import "@/assets/sass/main";

@mixin b() {
	@media screen and (max-width: 1023px) {
		@content;
	}
}

*{
	scroll-snap-type: mandatory;
}


.btn_ml{
	margin: 20px;
}
.Re-anima{
	color:$second_color;
	width: 20vw;
	height: 20vh;
	margin-bottom: 10vh;	
	animation: rotation 2s infinite linear;
    @keyframes rotation {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(359deg);
    }}
	@include b(){
		margin-bottom: 0vh;	
	}
}

video{
	position: absolute;
	top: 0;
	right: 0;
}

.landing_page_photo{
	overflow: hidden;
	::-webkit-scrollbar{
		display: none;
		
	}





	.box{
		display: grid;
		place-items: center;
		align-content: center;
     
	 .intro_container{
		width:90%;
		display: flex;

		@include b(){
			display: block;
		}
		}
	 }
	 .textBox{
		display: flex;
		align-items: center;
		height: 100vh;
		margin:auto;
		h2{
		
		font-size: 21.5vw;
		font-weight:900;
		text-align: left;
		line-height: 30vh;
	 }
	 }
	 .introBox{
		padding-left: 5%;
		display: flex;
		align-items: flex-end;
		min-width: 70vw;
		h2{
			font-size: 6rem;
			font-weight: bold;
			color: aliceblue;
			line-height: 20vh;
			@include b(){
				font-size: 6rem;
		}
		}
		.textPart{
			outline: 1px solid hsl(208, 100%, 97%);
			width: 90%;
			padding: 50px;
			min-height: 200px;
			background-color: rgb(160, 165, 184,0.5);
			@include b(){
				width: 80%;
			}
		}
		p{
			color: white;
			line-height: 2em;
		}
	 }
	}

.contactUs{
	width: 60%;
	margin: auto;
	margin-top: 100px;
	
	.titleBox{
		width: 100%;
		h4{
			font-weight: bold;
			color: black;
			margin: 10px;
		}
		h1{
			font-size: 40px;
			margin: 10px;
			font-weight: bold;
		}
		p{
			margin: 10px;
			line-height: 1.5em;
			width: 100%;
		}
		.order_title{
			color:rgb(156, 156, 167);
			@include font_set($second_font, $null, 900, italic);
			@include s() {
			font-size: 56px;
			}
			@include m() {
				font-size: 96px;
			}
			position: absolute;
			z-index: -1;
			left: 30%;
			font-size: 120px;
			opacity: .5;
		}
		
	}
}

.inputBox{
			width: 100%;
			display: block;
			.inputBar{
				width: 100%;
				margin: 10px;
				height: 50px;
			}
			.inputText{
				height: 300px;
				width: 100%;
				margin: 10px;
			}
			.sendOut{
				display: flex;
				justify-content: right;
				align-items: center;
				flex-wrap: wrap;
			}
}
			
.FAQ{
	width: 60%;
	margin: auto;
	margin-top: 100px;
	h1{
			font-size: 40px;
			margin: 10px;
			font-weight: bold;
		}
		p{
			margin: 10px;
			line-height: 1.5em;
			width: 100%;
			
		}
		.order_title{
			color:rgb(156, 156, 167);
			@include font_set($second_font, $null, 900, italic);
			@include s() {
			font-size: 56px;
			}
			@include m() {
				font-size: 96px;
			}
			position: absolute;
			z-index: -1;
			left: 30%;

			font-size: 120px;
			opacity: .5;
		}
}
.FAQRow{
	width: 100%;
	display: flex;
	justify-content: center;
	margin-bottom: 50px; 
	// ::-webkit-scrollbar {display: none; /* Chrome Safari */}

	ul{
	position: relative;
	display: flex;
	overflow-x:scroll ;
	overscroll-behavior: auto;
	scroll-snap-type: inline mandatory;
	scroll-snap-align:end;
	&::-webkit-scrollbar {
		display: none;

    };
	

	


	// scrollbar-color: #4673fb #ffffff;
    //     &::-webkit-scrollbar {
    //         width: 14px;
    //     }
    //     &::-webkit-scrollbar-track {
    //         background:transparent;
    //     }       
    //     &::-webkit-scrollbar-thumb {
    //         background-color: #4673fb;
    //         border-radius: 10px;
    //         border: 3px solid #ffffff;
    //     }
	}
	.FAQcontainer{
	width: 300px;
	margin: 20px;
	outline: 1px solid blue;

	h3{
		font-weight: bolder;
		font-size: 30px;
		margin: 10px;
		padding-top: 10px;
		text-shadow: 5px -5px  #b6c8f3;
		border: 1px s;
	}
	p{
		margin: 10px;
		span{
			font-size: 30px;
		}
	}
	.buttonPart{
		display: flex;
		width: 100%;
		justify-content: center;
		.seeMore{
		width: 100px;
		height: 50px;
		display: flex;
		align-items: center;
	justify-content: center;
	margin-bottom:10px ;

	}
	}
	

	}

}
.aBox{
	width: 80%;
	display: flex;
	justify-content: right;
	a{
	margin-bottom: 50px;
	&:hover{
	  text-decoration: underline;
	}
	}
}



</style>
