<template>
	<div class="step">
		<p :class="['step-item', {stepPosition:setStep === step}]" v-for="(step,index) of steps" :key="index">
			{{step}}
		</p>
	</div>
	<div class="consultqa">
		<div class="consultqa-title">
			<h2>問題與方向</h2>
			<p>選擇想諮詢的問題，至多三項</p>
		</div>
		<div class="consultqa-btn">
			<div :class="['consultqa-btn-item',{checked:checkBtn}]" v-for="(qaBtn,index) of qaBtns" :key="index" @click="checkBtn==qaBtn">
				<p>{{qaBtn}}</p>
			</div>
		</div>
		<div class="consultqa-input">
			<div class="consultqa-input-title">
				<h3>
					其他
				</h3>
			</div>
			<textarea class="consultqa-textarea">

			</textarea>
			<Button content="下一步" @click="changeStep()"></Button>
			
		</div>
	</div>



</template>
<script>
import Button from "@/components/Button.vue"

export default {
	name: "Consultating",
	components: {
		Button,
	},
	data(){
		return{
			steps:['STEP1','→','STEP2','→','STEP3'],
			qaBtns:[
				'網購衣服不清楚怎麼挑合適的尺寸',
				'想要更多靈感',
				'不了解自己適合什麼',
				'想嘗試把單品穿搭成多組合',
				'不想思考每天要穿什麼',
				'想學穿搭不知道怎麼開始',
				'對自己的穿搭沒自信',
				'不確定特定場合怎麼穿搭',
				'想嘗試更多風格',
			],
			setStep:'',
			checkBtn:'',
		}
	},
	mounted () {
		this.setStep=this.steps[0] 
	},
	methods:{
		changeStep(){
			this.setStep=this.steps[2] 
		}
	}

};
</script>
<style lang="scss" scoped>
	.step{
		margin-top: 80px;
		display: flex;
		justify-content: center;
		p{

			padding: 20px;
			border-radius: 50%;
			background-color:transparent;
			color: $main_color;
			font-weight: 700;
			font-size: 24px;
			border: 2px solid $main_color;
		}
		p:nth-child(2n){
			border-radius: 0%;
			background-color:transparent;
			color: $main_color;
			font-size: 20px;
			font-weight: 400;
			border: 0px;
		}
		.stepPosition{
			// padding: 20px;
			// border-radius: 50%;
			background-color:$main_color;
			color: $second_color;
			// font-weight: 700;
			// font-size: 24px;
		}
	}
	.consultqa{
		.consultqa-title{
			h2{
				font-size:48px ;
				color: $title_color ;
				font-weight: 700;
				margin: 50px 0 20px;
				text-align: center;
			}
			p{
				font-size:14px ;
				color: $text_color ;
				font-weight: 400;
				text-align: center;
			}	
		}
		.consultqa-btn{
			width: 80%;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-evenly;
			margin:50px auto;
			
			.consultqa-btn-item{
				
					padding: 20px 10px;
					border: 2px solid $main-color;
					font-size:18px ;
					color: $text_color ;
					font-weight: 400;
					text-align: center;
					display: inline-block;
					margin:20px 10px;
					border-radius: 5px;
				
			}
			.checked{
				background-color: $main_color;
				color: $second_color;
			}
		}
		.consultqa-input{
			width:80%;
			max-width:1200px ;
			margin: auto;
			h3{
				color: $title_color;
				margin: 10px;
				font-weight: 700;
				font-size: 24px;
			}
			.consultqa-textarea{
				width: 100%;
				height: 300px;
			}
			Button{
				text-align: center;
				display: block;
				margin: 20px auto;
			}
		}
	}
</style>
