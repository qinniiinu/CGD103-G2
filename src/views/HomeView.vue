<template>
	<section class="home_cover">
		<div class="img_marquee">
			<div class="img_marquee_item" >
				<img v-show="mainImg.boolean" v-for="(mainImg,index) of mainImgs" :key="index" :src="mainImg.src" alt="" @mouseenter="mainImg.boolean = false ; hoverImg.boolean = true" >
				<img v-show="hoverImg.boolean"  v-for="(hoverImg,index) of hoverImgs" :key="index"  :src="hoverImg.src" alt=""  @mouseout="hoverImg.boolean = false ; mainImg.boolean = true">
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

	</section>

	<section class="consult_part">

	</section>

	<section class="product_part">

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
					{src:'/img_marquee_1.png',boolean:'true'},
					{src:'/img_marquee_2.png',boolean:'true'},
					{src:'/img_marquee_3.png',boolean:'true'},
					{src:'/img_marquee_4.png',boolean:'true'},
					{src:'/img_marquee_5.png',boolean:'true'},
					{src:'/img_marquee_6.png',boolean:'true'},
				],
				hoverImgs:[
					{src:'/img_hover_1.png',boolean:'false'},
					{src:'/img_hover_2.png',boolean:'false'},
					{src:'/img_hover_3.png',boolean:'false'},
					{src:'/img_hover_4.png',boolean:'false'},
					{src:'/img_hover_5.png',boolean:'false'},
					{src:'/img_hover_6.png',boolean:'false'},
				],
				show:'',
				// mainPic:[	
				// 	{boolean:'tre'},
				// 	{boolean:'ture'},
				// 	{boolean:'ture'},
				// 	{boolean:'ture'},
				// 	{boolean:'ture'},
				// 	{boolean:'ture'},
				// ],
				// condition:[	
				// 	{boolean:'false'},
				// 	{boolean:'false'},
				// 	{boolean:'false'},
				// 	{boolean:'false'},
				// 	{boolean:'false'},
				// 	{boolean:'false'},
				// ],
			}
		},
		mounted(){
			// this.mainImg.boolean=false
		}
		,
		methods:{
		
		}
	};
</script>
<style lang="scss" scoped>
	.img_marquee_item{
		display: flex;
		overflow: hidden;
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