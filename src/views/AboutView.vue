<template>
	<div class="landing_page_photo"><!-- 關於我們頁面 -->

		<div class="scroll_container" style="overflow-y: scroll; height: 100vh;">
			<div class="box" style="height: 5000px; position: relative;">
				<div class="intro_container" style="height: 600px; position: sticky; top: 0;">
					<div class="textBox">
						<h2>U<br>R<br>STYLE</h2>
					</div>
					<div class="introBox">
						<h2>#ABOUT</h2>
						<div class="textPart">
							<p>
								手工藝之美在於細節。 機器永遠無法創造出手工質感的海草花瓶或手織的藤製托盤。
								印度傳承了豐富的傳統手工知識。 Moradabad 地區出口印度 40% 以上的手工藝製品。	在我們全新打造的系列中，我們與 SNEH 合作。 SNEH 於 2019 年創立，為印度 Moradabad 的村莊婦女提供學習工藝的機會──這種技能使她們能夠經濟獨立，擺脫不平等。 		
								印度傳承了豐富的傳統手工知識。 Moradabad 地區出口印度 40% 以上的手工藝製品。	在我們全新打造的系列中，我們與 SNEH 合作。 SNEH 於 2019 年創立，為印度 Moradabad 的村莊婦女提供學習工藝的機會──這種技能使她們能夠經濟獨立，擺脫不平等。 		
								</p>
						</div>
				</div>
				</div>
			</div>
			<div class="box" style="height: 1500px; position: relative;">
				<div style="height: 400px; position: sticky; top: 0;">
					Hello world, from section 2!
				</div>
			</div>
		</div>
	</div>
	<div class="contactUs"> <!-- 聯絡我們 -->
		<div class="container">
			<div class="titleBox">
				<h4>歡迎來信合作</h4>
				<h1>聯絡我們</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, eaque optio! Repellat sint deleniti eligendi odit tempore, optio sed beatae. Perferendis totam quod amet aliquam molestiae sint dolore qui? Dignissimos.</p>
			</div>
			<div class="inputBox">
				<input type="text" placeholder="請輸入姓名">
				<input type="text" placeholder="請輸入公司名稱">
				<input type="email" placeholder="請輸入信箱">
				<input type="text" placeholder="請輸入連絡電話">
				<input type="textarea" placeholder="請輸入詢問內容">
				<input type="checkbox">點擊「確定送出」即表示您同意我們的隱私權條款聲明
				<button>確認送出</button>
			</div>
		</div>
	</div>
	<Footer></Footer>
</template>

<script>

import Header from "@/components/Header.vue";
import Button from "@/components/Button.vue";

export default {
	name: "About",
	components: {
		Header,
		Button,
	},
};




function textStyle(x) {
    if (x < 0) {
        return `transform: translateY(300px);`
    } else {
        return `transform: translateY(0);`
    }
}
</script>





<style lang="scss" scoped>

@import "@/assets/sass/main";


.landing_page_photo{
	background-image: url("../assets/images/about-landing-page.jpg");
	.box{
		display: grid;
		place-items: center;
		align-content: center;
     h2{
		font-size: 200px;
		font-weight: bolder;
		text-align: left;
		line-height: 250px;
	 }
	 .intro_container{
		display: flex;
	 }
	 .introBox{
		margin-left: 10%;
		h2{
			font-size: 120px;
			color: aliceblue;
		}
		.textPart{
			outline: 1px solid aliceblue;
			width: 500px;
			padding: 50px;
			height: 350px;
		
		}
		p{
			color: white;
			line-height: 2em;
		}
	 }
	}
}




</style>
