<template>
	<div class="checkout">
		<div class="paydetails">
			<h2>結帳</h2>
			<div class="paytetails-wrap">
				<div class="delivery">
					<h4>配送資訊</h4>
					<p>配送方式</p>
					<select name="" id="">
						<option value="hDelivery">宅配</option>
						<option value="sPickup">超商取貨</option>
					</select>
				</div>
				<div class="buyer">
					<h4>購買人資訊</h4>
					<p>姓名</p>
					<input class="memName" type="text" v-model="memInfo.mem_name">
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="memInfo.phone">
					<p>電子信箱</p>
					<input class="email" type="text" v-model="memInfo.mem_mail">
					<p>聯絡地址</p>
					<input class="address" type="text" v-model="memInfo.address">
				</div>
				<div class="receiver">
					<h4>收件人資訊</h4>
					<p>姓名</p>
					<input class="mem_name" type="text" v-model="inner">
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="inner">
					<p>電子信箱</p>
					<input class="email" type="text" v-model="inner">
					<p>配送地址</p>
					<input class="receive-address" v-model="inner">
					<label class="same" for="same"><input type="checkbox" id="same" @click="check()" >同購買人資訊</label>
				</div>
				<div class="payment">
					<h4>付款方式</h4>
					<select name="" id="">
						<option value="hDelivery">信用卡線上刷卡</option>
						<option value="sPickup">貨到付款</option>
					</select>
				</div>
			</div>
			<button>完成訂購</button>
		</div>
        <div class="list">
            <h2>購物車</h2>
            <div class="sub-plan">
                <div class="subcard" v-for="detail in subscribe" :key="detail">
                    <div class="card-wrap">
                        <div class="card-content">
                            <div class="level">#{{detail.level}}</div>
                            <h2>NT$<span>{{detail.price}}</span>/月</h2>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                每月專屬搭配<span>1</span>套
                            </p>
                            <span>{{detail.set_info}}</span>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                每月諮詢造型師<span>{{detail.monthConsult}}</span>次
                            </p>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                每月免運費<span>{{detail.freeShipping}}</span>次
                            </p>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                商品<span>{{detail.specialOffer}}</span>折優惠
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail" v-for="detail in subscribe" :key="detail">
                <div>總計: ${{detail.price}}元</div>
            </div>
		</div>	
	</div>
</template>

<script>
import {subinfo} from'@/assets/config/setting.js'
import {vip_level} from'@/assets/config/setting.js'
export default {
	name: "SubCheckoutView",
	components: {
	},
	data(){
		return{
			load: false,
			source:[],
			count:[],
			min:0,
			max:0,
			inner:'',
			memId:"a001",
			mem_name:"王小明",
			phone:"0912345678",
			mem_mail:"bj4@gmail.com",
			address:"320桃園市中壢區復興路46號9樓",
			mem_name1:"",
			phone1:"",
			mem_mail1:"",
			address1:"",
			vip_level:vip_level,
            subinfo:subinfo,
            subscribe:[],
			memInfo:[]
		}
	},
	created(){
		this.getStorage();
		this.getResource();
	},
	computed:{
		
	},
	methods:{
		check(){
			this.isChecked = !this.isChecked;
			console.log(this.isChecked);
			if(this.isChecked==false){
				inner=memInfo.mem_name;
				inner=memInfo.phone;
				inner=memInfo.mem_mail;
				inner=memInfo.address;
				// console.log(this.mem_name1);
			}
			else{
				memInfo.mem_name= "1";
				memInfo.phone= "1";
				memInfo.mem_mail = "1";
				memInfo.address= "1";
			}
		},
		getStorage(){
			let data =localStorage.getItem('subscribe');
			data=JSON.parse(data)
			this.subscribe=data? data:[]
            console.log(this.subscribe);
        },
		getResource() {
            this.axios.get("/api_server/memberinfo.php").then((response) => {
                this.memInfo= response.data;
				console.log(this.memInfo);
            });
    	}
	}
}
</script>
<style lang="scss" scoped>
	h2{
		font-size: 16px;
		color: $title_color;
		margin: 20px;
		margin-bottom: 0px;
		@include m{
			font-size: 24px;
			color: $title_color;
			margin-bottom: 20px;
		}
	}
	input{
		height: 15px;
	}
	.checkout{
		flex-direction: column-reverse;
		height: 100%;
		@include m{
			margin: 20px 100px 100px 100px;
			height: 900px;
			flex-direction: row;
		}
		display: flex;
		justify-content: center;
		margin-top: 25px;
		gap: 5%;
		.paydetails{
			display: flex;
			flex-direction: column;
			min-width: 55%;
			@include l{
				min-width: 50%;
			}
			button{
				align-self: right;
				margin-top: 20px;
				background: $main_color;
				color: white;
				padding: 8px 12px;
				border: 1px solid $main_color;
				margin-bottom: 50px;
				&:hover{
					background-color: white;
					color:$main_color;
				}
			}
			.paytetails-wrap{
                height: 450px;
                overflow-y: scroll;
                scrollbar-width: auto;
                scrollbar-color: #4673fb #ffffff;
                &::-webkit-scrollbar {
                    width: 14px;
                }
                &::-webkit-scrollbar-track {
                    background: #ffffff;
                }       
                &::-webkit-scrollbar-thumb {
                    background-color: rgb(194, 194, 194);
                    border-radius: 10px;
                    border: 3px solid #ffffff;
                }
				display: flex;
				flex-direction: column;
				gap:20px;
				border: 1px solid $text_color;
				padding: 20px;
				margin: 20px;
				@include m{
					margin:0px;
				}
				p{
					font-size: 14px;
					color: $text_color;
				}
				.delivery,.payment,.buyer,.receiver{
					display: flex;
					flex-direction: column;
					gap: 8px;
				}
				.same{
					font-size: 14px;
				}
			}
		}
		// .list{
		// 	width: 100%;
		// 	display: flex;
		// 	flex-direction: column;
		// 	.detail{
		// 		display: flex;
		// 		flex-direction: column;
		// 		gap: 5px;
		// 		align-self: flex-end;
		// 		text-align: right;
		// 	}
		// 	.list-wrap{
		// 		display: flex;
		// 		flex-direction: column;
		// 		margin: 20px;
		// 		font-size: 12px;
		// 		@include m{
		// 			margin: 0px;
		// 			font-size: 16px;
		// 		}
		// 		.items{
		// 			height:450px;
		// 			overflow-y: scroll;
		// 			margin:20px 0;
		// 			display: flex;
		// 			flex-direction: column;
		// 			border-top: 1px solid $text_color;
		// 			border-bottom: 1px solid $text_color;
		// 			.item{
		// 				display: flex;
		// 				gap:5px;
		// 				justify-content: space-between;
		// 				align-items: center;
		// 				padding: 15px;
		// 				border-bottom: 1px solid $text_color;
		// 				&:last-child{
		// 					border: none;
		// 				}
		// 				.product{
		// 					display: flex;
		// 					gap: 10px;
		// 					img{
		// 						width:80px;
		// 						height:80px;
		// 						@include m{
		// 							width: 150px;
		// 							height: 150px;
		// 						}
		// 					}
		// 					.prod-detail{
		// 						display: flex;
		// 						flex-direction: column;
		// 						gap:10px;
		// 						width:150px;
		// 							@include m{

		// 							}
		// 						.spec{
		// 							display: flex;
		// 							justify-content: space-between;
		// 						}
		// 						:last-child{
		// 							text-align: right;
		// 						}
		// 					}
		// 				}
		// 			}
		// 		}
		// 	}
		// }
        .list{
			width: 100%;
			display: flex;
			flex-direction: column;
            gap: 20px;
            .sub-plan {
                display: flex;
                justify-content: center;
                position: relative;
                .subcard {
                    -webkit-transform: skew(-5deg);
                    -moz-transform: skew(-5deg);
                    -o-transform: skew(-5deg);
                    border: 1px solid black;
                    .card-wrap {
                        width: 225px;
                        background: white;
                        padding: 30px 15px;
                        color: $main_color;
                        .card-content {
                            display: flex;
                            flex-direction: column;
                            gap: 10px;
                            text-align: left;
                            position: relative;
                            z-index: 1;
                            transition: all 0.3s ease-in;
                            h2 {
                                color: $title_color;
                                font-size: 20px;
                                font-weight: bold;
                                margin: auto;
                                margin-bottom: 10px;
                            }
                            p {
                                color: $text_color;
                                font-size: 14px;
                            }
                            span {
                                font-size: 32px;
                            }
                            :first-child ~ span {
                                font-size: 14px;
                                font-weight: bold;
                            }
                            .level {
                                padding: 10px 30px;
                                background-color: $main_color;
                                color: white;
                                font-weight: bold;
                                font-size: 20px;
                                position: absolute;
                                right: -40px;
                                top: -50px;
                            }
                            a{
                                margin: auto;
                                margin-top: 20px;
                                button {
                                    cursor: pointer;
                                    background-color: $main_color;
                                    color: white;
                                    border: 1px solid $main_color;
                                    padding: 5px 20px;
                                    &:hover {
                                        background-color: $bg_blue;
                                        color: $main_color;
                                        border: 1px solid $main_color;
                                    }
                                }
                            }
                            
                        }
                    }
                }
            }
            .detail{
				display: flex;
				flex-direction: column;
                padding: 20px;
				align-self: flex-end;
				text-align: right;
			}
        }
    
}
</style>
