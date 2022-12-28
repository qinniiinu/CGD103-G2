<template>
	<div class="checkout">
		<form class="paydetails" action="" @submit.prevent="subOrdersubmit()">
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
					<input class="memName" type="text" v-model="subMemInfo.mem_name" disabled>
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="subMemInfo.phone" disabled>
					<!-- <p>電子信箱</p>
					<input class="email" type="text" v-model="subMemInfo.mem_mail" disabled> -->
					<p>收件地址</p>
					<input class="address" type="text" v-model="subMemInfo.address" disabled>
				</div>
				<!-- <div class="receiver">
					<h4>收件人資訊</h4>
					<p>姓名</p>
					<input class="mem_name" type="text" v-model="inner[0]">
					<p>連絡電話</p>
					<input class="phone" type="text" v-model="inner[1]">
					<p>電子信箱</p>
					<input class="email" type="text" v-model="inner[2]">
					<p>配送地址</p>
					<input class="receive-address" v-model="inner[3]">
					<label class="same" for="same"><input type="checkbox" id="same" @click="check()" >同購買人資訊</label>
				</div> -->
				<div class="payment">
					<h4>付款方式</h4>
					<select name="" id="">
						<option value="hDelivery">信用卡線上刷卡</option>
						<option value="sPickup">貨到付款</option>
					</select>
				</div>
			</div>
			<button type="submit">完成訂購</button>
		</form>
        <div class="list">
            <h2>購物車</h2>
            <div class="sub-plan">
                <div class="subcard" v-for="sub in subOrder" :key="sub.level">
                    <div class="card-wrap">
                        <div class="card-content">
                            <div class="level">#{{sub.level}}</div>
                            <h2>NT$<span>{{sub.price}}</span>/月</h2>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                每月專屬搭配<span>1</span>套
                            </p>
                            <span>{{sub.set_info}}</span>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                每月諮詢造型師<span>{{sub.monthConsult}}</span>次
                            </p>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                每月免運費<span>{{sub.freeShipping}}</span>次
                            </p>
                            <p>
                                <font-awesome-icon icon="fa-solid fa-check" />
                                商品<span>{{sub.specialOffer}}</span>折優惠
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail" v-for="sub in subOrder" :key="sub">
                <div>總計: ${{sub.price}}元</div>
            </div>
		</div>	
	</div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
export default {
	name: "SubCheckoutView",
	components: {
	},
	data(){
		return{
			load: false,
			count:[],
			min:0,
			max:0,
			// inner:[],
			vip_level:[],
            subscribe:[],
			subMemInfo:[],
			subOrder:[]
		}
	},
	created(){
		this.getStorage();
		this.getResource();
	},
	computed:{
		
	},
	methods:{
		subOrdersubmit(){
			let formData = new FormData();
			formData.append("mem_id", this.subMemInfo.mem_id);
			// const obj = {...this.subOrder};
			// console.log(obj);
			formData.append("level_id",this.subOrder[0].id);
			formData.append("sub_paid", this.subOrder[0].price);
			formData.append("action", "subOrder");

			fetch("/api_server/inserSubOrder.php", {
				method: "post",
				body: formData,
			})
			.then((response) => {
				return response.json();
			})
			.then((data) =>{
				console.log(data);
				alert("訂閱成功");
				this.$router.push({ path: "/MyPage/memSubscription"});
				// if (data.msg) {
				// 	alert("data.msg");
				// }
			})
			.catch((error) => console.log(error));
		},
		check(){
			this.isChecked = !this.isChecked;
			console.log(this.isChecked);
			if(this.isChecked==true){
				this.inner[0]=this.memInfo.mem_name;
				this.inner[1]=this.memInfo.phone;
				this.inner[2]=this.memInfo.mem_mail;
				this.inner[3]=this.memInfo.address;
			}
			else{
				this.inner=[];
			}
		},
		getStorage(){
			let data =localStorage.getItem('subOrder');
			data=JSON.parse(data)
			this.subOrder=data? data:[]
            console.log(this.subOrder);
        },
		getResource() {
            this.axios.get(`${BASE_URL}/subMemInfo.php`).then((response) => {
                this.subMemInfo= response.data;
				console.log(this.subMemInfo);
            });
			this.axios.get(`${BASE_URL}/vip_level.php`).then((response) => {
                this.vip_level= response.data;
				console.log(this.vip_level);
            });
    	}
	}
}


// let url = `${location.protocol}//${location.host}/Cart`
// location.href = url

// window.addEventListener('storage', e => {
// 	localStorage.setItem(e.key, e.oldValue)
// })

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
                height: 370px;
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
