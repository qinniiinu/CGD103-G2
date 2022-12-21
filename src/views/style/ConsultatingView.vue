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
				<label :for="qaBtn.id" :name="btncheck" >
					<input type="checkbox" :id="qaBtn.id" :value="qaBtn.text" name="btncheck" v-model="qaBtncheck" :checked="hascheck()" >
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
			<textarea class="consultqa-textarea" maxlength="1000" placeholder="輸入你想諮詢的問題" v-model="qatextarea"></textarea>
			<Button class="btn_s" @click="changeStep()">下一步</Button>
			<p :class="{prompt:isprompt,noprompt:notprompt}">{{stepPrompt}}</p>
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
				<Datepicker v-model="date" model-type="yyyy/MM/dd" :enable-time-picker="false"  inline />
			</div>
			<div class="consultqa-time">
				<h3>時段</h3>
				<div class="consultqa-time-item" v-for="(time,index) of times" :key="index">
					<h4>{{time.era}}</h4>
					<div class="time-btn">
						<input type="radio" :id="time.id" name="time" :checked="hascheck2()" @click=" qatime= time.item ;qaera =time.era">
						<label :for="time.id">
							<p>{{time.item}}</p>
						</label>
					
						<input type="radio" :id="time.id2" name="time" :checked="hascheck2()" @click="qatime = time.item2 ; qaera =time.era">
						<label :for="time.id2">
							<p>{{time.item2}}</p>
						</label>
					</div>
				</div>

			</div>
		</div>
		<div class="pickdate">
			<p>你選擇的日期:<span>{{date}}</span></p>
			<p>你選擇的時間:<span>{{qaera}}{{qatime}}</span></p>
		</div>
		<div class="btn_stp">
			<Button class="btn_l" @click="backStep1()">上一步</Button>
			<Button class="btn_s" @click="changeStep2()">下一步</Button>
			<p :class="{p_prompt:canprompt,p_noprompt:cantprompt}">{{datePrompt}}</p>
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
				<p>{{qaBtncheck[0]}}</p>
				<p v-if="this.qaBtncheck.length>1 ">{{qaBtncheck[1]}}</p>
				<p v-if="this.qaBtncheck.length>2 ">{{qaBtncheck[2]}}</p>
				<p v-if="this.qatextarea !='' ">{{qatextarea}}</p>
			</div>
			<div class="book-date consultqa-check-item">
				<h3>日期</h3>
				<p>{{date}}</p>
			</div>
			<div class="book-time consultqa-check-item">
				<h3>時段</h3>
				<p>{{qaera}}{{qatime}}{{qatime2}}</p>
			</div>
			<div class="check-btn">
				<Button class="btn_l" @click="backStep2()">上一步</Button>
				<Button class="btn_s" @click="insert()">完成</Button>
			</div>
		</div>
	</div>


</template>
<script>

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/src/VueDatePicker/style/main.scss';
import { scrollTop } from 'dom7';
import { ref } from 'vue';
// import { BASE_URL } from "@/assets/js/commom.js";


export default {
	
	name: "Consultating",
	components: {
		 Datepicker ,
	},
	setup() {
		const bookdate = ref();
        
        return {
            bookdate,
        }
    },

	data(){
		return{
			date: '',
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
			times:[
				{id:'time10',item:'10:00',era:'上午',id2:'time11',item2:'11:00'},
				{id:'time14',item:'02:00',era:'下午',id2:'time15',item2:'03:00'},
				{id:'time19',item:'07:00',era:'晚上',id2:'time20',item2:'08:00'},
				
				
				
			],
			qaBtncheck:[],
			btn:0,
			step1:true,
			step2:false,
			step3:false,
			btncheck:'qabtn-box',
			stepPrompt:'至少選一個',
			isprompt:false,
			notprompt:true,
			qatime:'',
			qaera:'',
			datePrompt:'日期、時間要選擇',
			canprompt:false,
			cantprompt:true,
			qatextarea:'',
			bookdate:'',
		}
	},
	computed:{
	
		btncheck(){
			if(this.qaBtncheck.length>3){
				this.qaBtncheck.splice(0,1)
			}
		},
		
	},
	mounted () {
	
	},
	methods:{
		changeStep(){
			
			if(this.qaBtncheck.length>0){
				this.step1=false
				this.step2=true
				this.isprompt=false
				this.notprompt=true
				window.scrollTo({
					top: 0,
					left: 0,
					behavior: 'smooth'
				})
				
				
			}else{
				this.step2=false
				this.isprompt=true
				this.notprompt=false
				console.log(isprompt)

			}
				
		},
		hascheck(){
			if(this.qaBtncheck.length>0){
				this.isprompt=false
				this.notprompt=true
				
			}
		},

		changeStep2(){
			
			// alert(this.date)
			if(this.qatime!=''&& this.date!=''){
				
				this.step3=true
				this.step2=false
				window.scrollTo({
					top: 0,
					left: 0,
					behavior: 'smooth'
				})

				
			}else{
				this.canprompt=true
				this.cantprompt=false
			}
			
		},
		hascheck2(){
			// if(this.qatime==''||this.date==''){
			// 	// this.canprompt=true
			// 	// this.cantprompt=false
			// }else{
			// 	this.canprompt=false
			// 	this.cantprompt=true
			// }
			// 	
			
		},

		backStep1(){
           
			this.step2=false
			this.step1=true
			window.scrollTo({
					top: 0,
					left: 0,
					behavior: 'smooth'
				})
        },
        backStep2(){
       
			this.step3=false
			this.step2=true
			window.scrollTo({
					top: 0,
					left: 0,
					behavior: 'smooth'
				})
        },
		insert() {
			console.log(this.qaBtncheck.toString());
			const payload={
				appointment_date:this.date,
				appointment_time:this.qatime,
				appointment_qa:this.qaBtncheck.toString(),
				appointment_qatext:this.qatextarea
			}
			fetch(`http://localhost:8887/cgd103_g2_frontend/phpfile/chat_qa.php`,{
				method:'post',
				body:new URLSearchParams(payload)
			})


			/* let xhr = new XMLHttpRequest();
			xhr.onload = function () {
				let result = JSON.parse(xhr.responseText);
				alert(result.msg);
			};
			xhr.open("post", `${BASE_URL}/chat_qa.php`, true);
			xhr.send(new FormData(document.getElementById("add_employee"))); */
			// lightbox.classList.remove("active"); // 關新增燈箱
		},

	}

};
</script>
<style lang="scss" scoped>
	label{
		cursor: pointer;
	}


	
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
				display: inline-block;
				width: 100%;
				// max-width: 312px;
				height: 300px;
				margin: auto;
				&:focus{
					// border: red;
					outline:0px;
				}
				box-sizing: border-box;
				padding:20px;
				font-size:16px ;
				letter-spacing: 1px;
				line-height: 24px;
				@include m{
					// max-width: 1200px;
					font-size:16px ;
					letter-spacing: 1.5px;
					
					
				}

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
			.prompt{
				text-align: center;
				margin: 10px  auto 50px;
				color: red;
				font-size:14px ;
			}
			.noprompt{
				text-align: center;
				margin: 10px  auto 50px;
				color:transparent;
				font-size:14px ;
			}
		}
	}
	.consultqa-step2{
		.pickdate{
			p{
				text-align: center;
				margin: 0px auto 50px;
				font-size:24px ;
				color:$title_color ;
				font-weight: 700;
				span{
					color:$main_color ;
				}
			}
		}
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
				border:2px solid $main-color ;
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
							border:0px solid $main_color;
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
			.p_prompt{
				text-align: center;
				margin: 10px  auto 50px;
				color: red;
				font-size:14px ;
			}
			.p_noprompt{
				text-align: center;
				margin: 10px  auto 50px;
				color: transparent;
				font-size:14px ;
			}
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
				margin: 20px auto;
				text-align: center;
				font-size: 24px;
				font-weight: 700;
				color: $title_color;
				line-height: 40px;
				@include m{
						font-size: 32px;
					}
			}
			.consultqa-check-item{
				width: 80%;
				margin: auto;
				margin-top: 20px;
				h3{
					font-size: 18px;
					@include m{
						font-size: 22px;
					}
					color: $title_color;
					font-weight: 700;
					margin-bottom: 15px;
				}
				p{
					@include m{
						font-size: 18px;
					}
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

