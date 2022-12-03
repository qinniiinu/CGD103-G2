<template>
	
	<div class="consultqa-step1" v-show="step1">
		<div class="step">
			<p :class="step-item" v-for="(step,index) of steps" :key="index">
				{{step}}
			</p>
		</div>
		<div class="consultqa-title">
			<h2>問題與方向</h2>
			<p>選擇想諮詢的問題，至多三項</p>
		</div>
		<div class="consultqa-btn">
			<div class="consultqa-btn-item" v-for="(qaBtn,index) of qaBtns" :key="index">
				<label :for="qaBtn.id">
					<input type="checkbox" :id="qaBtn.id">
					<p>{{qaBtn.text}}</p>
				</label>
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
			<Button class="btn_s" @click="changeStep()">下一步</Button>
		</div>
	</div>
	<div class="consultqa-step2" v-show="step2">
		<div class="step">
			<p :class="step-item" v-for="(step,index) of steps" :key="index">
				{{step}}
			</p>
		</div>
		<div class="consultqa-title">
			<h2>預約時間</h2>
		</div>
		<div class="consultqa-book">
			<div class="consultqa-know">
				<h3>預約須知</h3>
				<p>1.諮詢時間為一個小時</p>
				<p>2.請準時上線諮詢</p>
				<p>3.諮詢時間為一個小時</p>
			</div>
			<div class="consultqa-date">
					<Datepicker v-model="date" inline  vertical/>
			</div>
			<div class="consultqa-time">
				<h3>時段</h3>
				<div class="consultqa-time-item morning">
					<h4>上午</h4>
					<div class="time-btn">
						<input type="radio" id="time10" name="time">
						<label for="time10">
							<p>10:00</p>
						</label>

						<input type="radio" id="time11" name="time">
						<label for="time11">
							<p>11:00</p>
						</label>	
					</div>
				
				</div>
				<div class="consultqa-time-item afternoon">
					<h4>下午</h4>
					<div class="time-btn">
						<input type="radio" id="time14" name="time">
						<label for="time14">
							<p>14:00</p>
						</label>

						<input type="radio" id="time15" name="time">
						<label for="time15">
							
							<p>15:00</p>
						</label>
					</div>
				</div>
				<div class="consultqa-time-item night">
					<h4>晚上</h4>
						<div class="time-btn">
							<input type="radio" id="time19" name="time">
							<label for="time19" >
								<p>19:00</p>
							</label>

							<input type="radio" id="time20" name="time">
							<label for="time20">
								<p>20:00</p>
							</label>
						</div>
				</div>

			</div>
		</div>
		<div class="btn_stp">
			<Button class="btn_l" @click="backStep1()">上一步</Button>
			<Button class="btn_s" @click="changeStep2()">下一步</Button>
		</div>
	</div>
	<div class="consultqa-step3" v-show="step3">
		<div class="step">
			<p :class="step-item" v-for="(step,index) of steps" :key="index">
				{{step}}
			</p>
		</div>
		<div class="consultqa-check">
			<h2>預約資訊確認</h2>
			<div class="consulta-qa consultqa-check-item">
				<h3>諮詢方向</h3>
				<p>不了解自己適合什麼</p>
				<p>不想思考每天要穿什麼</p>
				<p>對自己的穿搭沒自信</p>
				<p>對自己的穿搭沒自信對自己的穿搭沒自信對自己的穿搭沒自信對自己的穿搭沒自信對自己的穿搭沒自信對自己的穿搭沒自信對自己的穿搭沒自信</p>
			</div>
			<div class="book-date consultqa-check-item">
				<h3>日期</h3>
				<p>2022年11月11日</p>
			</div>
			<div class="book-time consultqa-check-item">
				<h3>時段</h3>
				<p>下午 2:00</p>
			</div>
			<div class="check-btn">
				<Button class="btn_l" @click="backStep2()">上一步</Button>
				<Button class="btn_s">完成</Button>
			</div>
		</div>
	</div>


</template>
<script>

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/src/VueDatePicker/style/main.scss';


export default {
	
	name: "Consultating",
	components: {
		 Datepicker ,
	},
	

	data(){
		return{
			date: null,
			steps:['STEP1','→','STEP2','→','STEP3'],
			qaBtns:[
				{id:1,text:'網購衣服不清楚怎麼挑合適的尺寸'},
				{id:2,text:'想要更多靈感'},
				{id:3,text:'不了解自己適合什麼'},
				{id:4,text:'想嘗試把單品穿搭成多組合'},
				{id:5,text:'不想思考每天要穿什麼'},
				{id:6,text:'想學穿搭不知道怎麼開始'},
				{id:7,text:'對自己的穿搭沒自信'},
				{id:8,text:'不確定特定場合怎麼穿搭'},
				{id:9,text:'想嘗試更多風格'},
				
			],
			step1:true,
			step2:false,
			step3:false,
			setStep:'',
			comStep:[],
			checkBtn:'',
			checkBtns:['a','s','d','f','g','r','t','i','r'],
		}
	},
	mounted () {
		// this.setStep=this.steps[0] 
	},
	methods:{
		changeStep(){
			
			this.step1=false
			this.step2=true
		},
		changeStep2(){
		
			this.step3=true
			this.step2=false
		},
		backStep1(){
           
			this.step2=false
			this.step1=true
        },
        backStep2(){
       
			this.step3=false
			this.step2=true
        }

	}

};
</script>
<style lang="scss" scoped>



	
	.consultqa-step1{
		.step{
			width: 80%;
			max-width: 1200px;
			margin: auto;
			margin-top: 80px;
			display: flex;
			justify-content: center;
			p{
				@include m{
					padding: 20px;
					font-size: 24px;
				}
				padding: 12px;
				border-radius: 50%;
				background-color:transparent;
				color: $main_color;
				font-weight: 700;
				font-size: 18px;
				border: 2px solid $main_color;
			}
			p:nth-child(2n){
				@include m{
					font-size: 20px;
				}
				border-radius: 0%;
				background-color:transparent;
				color: $main_color;
				font-size: 16px;
				font-weight: 400;
				border: 0px;
			}
			p:first-child{
				// padding: 20px;
				// border-radius: 50%;
				background-color:$main_color;
				color: $second_color;
				// font-weight: 700;
				// font-size: 24px;
			}
			.stepCompleted{
				background-color:$second_color;
				color:$third_color;
				border: 2px solid $second_color;
			}
		}
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
				input{
					display: none;
				}
				input:checked +p{
					background-color: $main_color;
					color: $second_color;
					font-weight: 700;
							
				}
					p{
						padding:15px;
						border: 2px solid $main-color;
						color: $text_color ;
						font-weight: 400;
						text-align: center;
						display: inline-block;
						margin:10px ;
						font-size:16px ;

						@include m{

							padding: 15px;
							margin:10px;
							font-size:18px ;
						}
						// border-radius: 5px;
					}
					
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
				@include m{
						width: 120px;
						height: 50px;
						line-height: 36px;
					}
			}
		}
	}
	.consultqa-step2{
		.step{
			width: 80%;
			max-width: 1200px;
			margin: auto;
			margin-top: 80px;
			display: flex;
			justify-content: center;
			p{
				@include m{
					padding: 20px;
					font-size: 24px;
				}
				padding: 12px;
				border-radius: 50%;
				background-color:transparent;
				color: $main_color;
				font-weight: 700;
				font-size: 18px;
				border: 2px solid $main_color;
			}
			p:nth-child(2n){
				@include m{
					font-size: 20px;
				}
				border-radius: 0%;
				background-color:transparent;
				color: $main_color;
				font-size: 16px;
				font-weight: 400;
				border: 0px;
			}
			p:nth-child(3){
				// padding: 20px;
				// border-radius: 50%;
				background-color:$main_color;
				color: $second_color;
				// font-weight: 700;
				// font-size: 24px;
			}
			p:first-child{
				background-color:$second_color;
				color:$third_color;
				border: 2px solid $second_color;
			}
		}
		.consultqa-title{
			h2{
				font-size:48px ;
				color: $title_color ;
				font-weight: 700;
				margin: 50px 0 20px;
				text-align: center;
			}
		
		}
		.consultqa-book{
			display:flex;
			justify-content: center;
			width: 80%;
			max-width: 1200px;
			margin: auto;
			flex-direction: column;
			@include m{
				flex-direction: row;
				margin-bottom:50px ;
			}
			.consultqa-know{
				// flex-grow: 1;
				margin-top:50px ;
				border:2px solid $main-color ;
				border-bottom: 0px ;
				@include m{
					border-bottom: 2px solid;
					border-right: 0px ;
				}
				h3{
					text-align: center;
					font-size: 22px;
					font-weight: 700;
					color: $title_color;
					line-height: 40px;
				}
				p{
					margin: 20px;
					font-size:14px;
					color: $text_color;
					line-height: 20px;
				}

			}
			.consultqa-date{
				
				@include m{
					margin-top:50px ;
				}
				
				
				
				// margin: auto;
				// padding: auto;
				// flex-grow: 4;
				// .dp__cell_inner {
				// 	padding: 250px ;
				// }
			}
			.consultqa-time{
				@include m{
					margin-top:50px ;
					margin-left: 20px;
				}
				
				margin: 20px 0px 30px;
				h3{
					color:$title_color ;
					font-weight: 700;
					font-size: 22px;
					line-height: 40px;
				}
				.consultqa-time-item{
					h4{
						color:$title_color ;
						font-size: 16px;
						margin: 10px 0px;
					}
					.time-btn{
						display: flex;
						gap: 10px;
						input{
							display: none;
						}
						label{
							
							flex-grow: 1;
							border:2px solid $main_color;
							padding: 10px 0px;

							@include m{
								padding: 10px 30px;
							}
							color: $main_color;
							text-align: center;
						}
						input:checked +label{
							background-color:$main-color;
							color: $second_color;
							font-weight: 700;
						}

					}


				
				}
				// border:2px solid $main-color ;
				// flex-grow:2 ;

			}



		}
		.btn_stp{
			// margin: auto;
			text-align: center;
			button{
				display: inline-block;
				margin: 10px;
				@include m{
					width: 120px;
					height: 50px;
					line-height: 36px;
				}
			}
			margin-bottom:20px ;
		}
	}
	.consultqa-step3{
		.step{
			width: 80%;
			max-width: 1200px;
			margin: auto;
			margin-top: 80px;
			display: flex;
			justify-content: center;
			p{
				@include m{
					padding: 20px;
					font-size: 24px;
				}
				padding: 12px;
				border-radius: 50%;
				background-color:transparent;
				color: $main_color;
				font-weight: 700;
				font-size: 18px;
				border: 2px solid $main_color;
			}
			p:nth-child(2n){
				@include m{
					font-size: 20px;
				}
				border-radius: 0%;
				background-color:transparent;
				color: $main_color;
				font-size: 16px;
				font-weight: 400;
				border: 0px;
			}
			p:last-child{
				// padding: 20px;
				// border-radius: 50%;
				background-color:$main_color;
				color: $second_color;
				// font-weight: 700;
				// font-size: 24px;
			}
			p:first-child{
				background-color:$second_color;
				color:$third_color;
				border: 2px solid $second_color;
			}
			p:nth-child(3){
				background-color:$second_color;
				color:$third_color;
				border: 2px solid $second_color;
			}
		}

	
		.consultqa-check{
			// margin: auto;
			width: 80%;
			max-width: 1200px;
			background-color: $second_color;
			border: 2px solid $main_color;
			margin: 50px auto;
		
			h2{
				text-align: center;
				font-size: 22px;
				font-weight: 700;
				color: $title_color;
				line-height: 40px;
			}
			.consultqa-check-item{
				width: 80%;
				margin: auto;
				margin-top: 20px;
				h3{
					font-size: 18px;
					color: $title_color;
					font-weight: 700;
					margin-bottom: 15px;
				}
				p{
					font-size: 14px;
					margin: 10px 0px;
					padding: 10px;
					border: 2px solid $main_color;
					background-color: $third_color;
					color: $main_color;
					width: fit-content;
					line-height: 21px;
				}
			}
			.check-btn{
				margin:50px auto 20px;
				text-align: center;
				button{
					// display: inline-block;
					@include m{
						width: 120px;
						height: 50px;
						line-height: 36px;
					}
					margin: 10px;
				}
			}
			
		}
	}
</style>
