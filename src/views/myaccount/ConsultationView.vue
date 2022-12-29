<template class="body">
			<p class="title">風格諮詢</p>
			<div class="data">
				<!-- 這裡開始寫 -->
				<div class="truebook" v-show="reserve">
					<div class="book">
						<h3>您的預約</h3>
						<div v-if="chat.length>0">
							<p class="fristp">{{chat[0].appointment_date}}</p>
							<p class="secp">{{chat[0].appointment_time}}</p>
						</div>
						<button class="btn_l" @click="delResource()">取消預約</button><button class="btn_s">進入聊天室</button>
					</div>
					<div class="recommend-part">
						<section class="recommend">
											<h2>推薦穿搭</h2>
											<div class="item">
								<StylistLook3 class="stylistLook" scardP="../pic/stylist-1.jpg" stylistName="Kevin" stylistInfo="擅長時尚風格,用前衛的單品,搭配出衝突的美感"></StylistLook3>
											</div>
										</section>
										<section class="deco">
											<div class="decoration">
								#CASUAL
							</div>
											<div class="btn_box">
												<router-link :to="{ name:'MyPage'}"><button class="btn_l">返回</button></router-link>
											</div>
										</section>
					</div>
				</div>
				<div class="flasebook" v-show="disreserve">
					<div class="book">
						<h3>您的預約</h3>
						<p>目前沒有預約</p>
						<router-link to="/Consultating" >
							<button class="btn_s">立即預約</button>
						</router-link>	
					</div>
				</div>
				<div class="check_complete" v-show="sucess">
				<h3>
					取消成功
				</h3>
					<div class="close" @click="this.sucess=false">
						確認
					</div>
				</div>
			</div>
</template>

<script>

import StylistLook3 from "@/components/StylistLook3.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
	name: "Consultation",
	components: {
		StylistLook3,
		BASE_URL
	},
	data(){
		return{
			reserve:true,
			disreserve:false,
			chat:[],
			sucess:false,
		
		}
	},
	computed:{
		
	},
	mounted () {

		
	},
	methods:{
		getResource() {
					console.log(this.$store.state.user.mem_id)
				this.axios.get(`${BASE_URL}/qa_book.php`, {
					params: {
						mem_id: this.$store.state.user.mem_id,
					},
				}).then((response) => {
					this.chat = response.data;
					console.log(this.chat)
					if (Object.keys(this.chat).length>0){
						this.reserve=true
						this.disreserve=false
					}else{
						this.reserve=false
						this.disreserve=true
					}
				});
				
			},
			delResource() {
					console.log(this.$store.state.user.mem_id)
				this.axios.get(`${BASE_URL}/delqa_book.php`, {
					params: {
						mem_id: this.$store.state.user.mem_id,
					},
				}).then((response) => {
					this.chat = response.data;
					console.log(this.chat)
				});
				this.reserve=false
				this.disreserve=true
				this.sucess=true
			},
		
	
	},
	created() {
        this.getResource();

    },
};
</script>

<style lang="scss" scoped>
	.body{
		background-color:#f1f1f1 ;
	}
	.title {
	font-size: 24px;
	color: #292929;
	padding-bottom: $padding;
	}
	.book{
		width: 100%;
		border: 1px solid $title_color;
		margin: auto;
		text-align: center;
		h3{
			font-weight: 700;
			color: $title_color;
			font-size: 24px;
			margin: 20px;
		}

		p{
			@include m{
				font-weight: 500;
				font-size: 28px;
				margin: 20px;
			}
			font-weight: 500;
			font-size: 20px;
			margin: 20px;
			
		}
		.fristp{
			font-weight: 700;
			margin-top:30px ;
			margin-bottom:10px ;
			@include m{

				margin-top:40px ;
				margin-bottom:15px ;
			}
		}
		.secp{
				@include m{
				font-weight: 500;
				font-size: 24px;
				margin-bottom: 40px;
			}
				font-weight: 500;
				font-size: 16px;
				margin: 30px;
			}
		button{
			line-height: 50px;
			margin: 20px;
			margin-bottom:40px ;
		}
	}
	.recommend-part{
		width: 100%;
		border: 1px solid $title_color;
		margin: auto;
		margin-top:50px ;
		text-align: center;
		// margin-bottom:50px ;
		h2{
			font-weight: 700;
			color: $title_color;
			font-size: 24px;
			margin: 20px;
		}
		// .recommend{
        //   .item{
			
			
		// 	}
		// }
		.deco{
			// margin-top: 50px ;
			.decoration{
				display: none;
			}
			.btn_box{
				.btn_s{
					display: none;
				}
				.btn_l{
					margin-left: auto;
					display: block;
				}
			}
		}


	}
			
	
// 	.card-info-pic{
// 		width:100px;
// 		height:100px;
// 		
// 		@include l{
// 			width:80px;
// 			height:80px;
// 			
// 		}
// 		@include xl{
// 			width:120px;
// 			height:120px;
// 			
// 		}
// 
// 		img{
// 			border-radius: 500px;
// 			width: 100%;
// 			height: 100%;
// 			object-fit: top;
// 		}
//    }
   

			.deco{
				position: relative;
				top: 50px;
			.decoration{
				display: inline-block;
				font-size: 72px;
				font-weight: bolder;
				font-style: italic;
				color: $secondary;
			}
			.btn_box{
				display: inline-block;
				position:absolute;
				right: 0;
				bottom: -40px;
				.btn_l{// 返回
					margin-left: 0;
					// display: block;
					display: inline-block;
					margin-right: 10px;
					// margin-bottom:50px ;
				}
				.btn_s{ //重新測驗
					display: inline-block;
				}
			}
		
    	}

		.check_complete{
				position: fixed;
				width: 300px;
				height: 300px;
				border: 1px solid $main_color;
				background-color:rgb(255,255,255,.9) ;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
				display: flex;
				gap: 50px;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				z-index: 999;
				h3{
					font-weight: 700;
					font-size:32px ;
					// margin: auto;
				}
				.close{
					color:$second_color;
					font-weight:500;
					width: fit-content;
					height: fit-content;
					background-color: $main_color;
					padding: 10px 15px;
					cursor: pointer;
				}
			}

					
</style>
