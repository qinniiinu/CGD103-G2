<template>
	<template v-if="load">loading...</template>
	<template v-else>
		<!-- 會員 container -->
		<p class="title">訂閱服務</p>
		<div class="data">
			<!-- 這裡開始寫 -->
			<div class="lightbox1" v-show="lightbox1">
				<span @click="lightbox1=false">x</span>
				<p>{{mess}}</p>
				<p>{{remind}}</p>
				<button @click='cancelSub()'>確認取消</button>
			</div>
			<div class="lightbox2" v-show="lightbox2">
				<span @click="lightbox2=false">x</span>
				<p>{{mess}}</p>
				<p>{{remind}}</p>
			</div>
			<div class="card">
				<!-- 沒訂閱 -->
				<div v-if="showPanel==false" class="card-wrap">
					<div class="card-v" v-for="sub in vip_level" :key="sub.level">
						<div class="card-content">
							<h2>#{{sub.level_name}}</h2>
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
							<h3>NT$<span>{{sub.price}}</span>/月</h3>
							<router-link to="/SubCheckout"><button @click="setStorage(index,sub)">訂閱</button></router-link>
						</div>
					</div>
				</div>
				<!-- 有訂閱 -->
				<div v-else class="card-wrap">
					<div v-if="view==1" class="card-sub">
						<h2>您的訂閱方案</h2>
						<p class="memlevel">#{{subscribe.level_name}}</p>
						<button @click="view=2">更改方案</button>
					</div>
					<div class="card-wrap" v-if="view==2">
						<div class="card-v" v-for="sub in vip_level" :key="sub.level">
							<div class="card-content" :class="{activestyle:isActive(sub.level_name)}">
								<h2>#{{sub.level_name}}</h2>
								<p>
									<font-awesome-icon icon="fa-solid fa-check" />
									每月專屬搭配<span>{{sub.monthSet}}</span>套
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
								<h3>NT$<span>{{sub.price}}</span>/月</h3>
								<p v-if="subscribe.level_id==sub.level_id">訂閱日:{{subscribe.sub_time}} </p>
								<p class="bold" v-if="subscribe.level_id==sub.level_id">下個付款日期:{{subscribe.sub_deadline}} </p>
								<button v-show="subscribe.level_id!=sub.level_id" @click="setStorage(index,sub)">訂閱</button>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="cancel" v-if="view===2" @click="checkCancel()">取消訂閱</button> <!-- showPanel=false,cancelSub() -->
				<router-link to="/MyPage"><button v-if="view===1" class="back">返回</button></router-link>
				<button v-if="view===2" class="back" @click="view=1">返回</button>
			</div>
			<div class="decoration">
				<bg-tag :Bgtag="'PREMIUM'"></bg-tag>
			</div>
		</div>
	</template>
</template>
<script>
import BgTag from "@/components/mypage/BgTag.vue";
import { BASE_URL } from "@/assets/js/common.js";

export default {
	name: "memSubscription",
	components: {
		BgTag,
	},
	data(){
		return{
			load: false,
			subOrder:[],
			vip_level:[],
			subscribe:[],
			submemInfo:[],
			showPanel:'',
			view:1,
			active:true,
			lightbox1:false,
			lightbox2:false,
			mess:'',
			remind:'',
		}
	},
	created(){
		this.load=true;
		this.getResource();
	},
	computed:{
		
	},
	methods:{
		setStorage(index,sub){
            console.log(sub);
			if(this.subscribe!=''){
				this.lightbox2=true;
				this.mess='您已訂閱'
				this.remind='如需更改請先取消訂閱'
			}else{
				this.subOrder.push({
					id:sub.level_id,
					level:sub.level_name,
					price:sub.price,
					monthSet:sub.monthSet,
					set_info:sub.set_info,
					monthConsult:sub.monthConsult,
					freeShipping:sub.freeShipping,
					specialOffer:sub.specialOffer,
				})
				const data=JSON.stringify(this.subOrder);
				console.log(data);
				localStorage.setItem('subOrder',data);
				this.$router.push({ path: "/SubCheckout"});
			}
        },
		isActive(e){
			return e===this.subscribe.level_name;
		},
		getResource() {
			this.axios.get(`${BASE_URL}/subMemInfo.php`).then((response) => { // 會員資料
				console.log(response.data);
				this.submemInfo= response.data;
				console.log(this.submemInfo);
				if(this.submemInfo.msg!='none'){ //有登入
					this.axios.get(`${BASE_URL}/subscription.php`).then((response) => { //訂閱等級
						this.subscribe= response.data;
						console.log(this.subscribe);
						//判斷有沒有訂閱
						if(this.subscribe==false){ //沒訂閱
							this.showPanel=false;
							console.log(this.showPanel);
							this.load=false;
						}else{ //有訂閱
							this.showPanel=true;
							console.log(this.showPanel);
							this.load=false;
						}
					});
				}
            });
			// 訂閱的資訊
            this.axios.get(`${BASE_URL}/vip_level.php`).then((response) => {
                this.vip_level= response.data;
				console.log(this.vip_level);
            });
        },
		checkCancel(){
			this.lightbox1=true;
			this.mess=`您的訂閱項目#${this.subscribe.level_name}`
			this.remind='即將取消，請再次確認'
		},
		cancelSub(){
			let xhr= new XMLHttpRequest();
			xhr.onload=function(){
				console.log(xhr.responseText);
				let result=JSON.parse(xhr.responseText);
				location.reload();
				this.showPanel=false;
			};
			xhr.open("post",`${BASE_URL}/cancelSubOrder.php`,true);
			xhr.send(null);
			
		}
	}
};
</script>

<style lang="scss" scoped>
.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}
.mem_container{
	background-color: $bg_gray;
}
.data{
	display: flex;
	justify-content: center;
	position: relative;
	.lightbox1,.lightbox2 {
        position: absolute;
        display:flex;
        flex-direction: column;
        gap: 20px;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        font-weight: 700;
        z-index: 10;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        width: 300px;
        height: 300px;
        background-color: #ffffffe8;
        border: 1px solid $main_color;
        text-align: center;
        @include s{
            font-size: 16px;
        }
        span{
            cursor: pointer;
            position: absolute;
            top: 3px;
            right: 7px;
        }
        button{
            cursor: pointer;
            color: white;
            width: 70px;
            height: 35px;
            background-color: $main_color;
            border: none;
            &:hover{
                border: 1px solid $main_color;
                color: $main_color;
                background-color: white;
            }
        }
    }
	.card{
		width: 100%;
		min-height: 600px;
		background-color: #fff;
		border: 1px solid $text_color;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		@include s() {
			width:100%;
			button{
				margin: auto;
				margin-block: 10px;
			}
		}
		.back{
			cursor: pointer;
			right: 20px;
			bottom: 20px;
			align-self: flex-end;
			background: #fff;
			color: $main_color;
			padding: 8px 30px;
			border: 1px solid $main_color;
			&:hover{
				background-color: $bg_violet;
				color:$main_color;
			}
			@include s() {
				width: 100px;
				display: unset;
				margin-bottom: 20px;
			}
			@include m(){
				position:absolute;
			}
		}
		.cancel{
			cursor: pointer;
			right: 120px;
			bottom: 20px;
			align-self: flex-end;
			background: #fff;
			color: $main_color;
			padding: 8px 30px;
			border: 1px solid $main_color;
			&:hover{
				background-color: $bg_violet;
				color:$main_color;
			}
			@include m(){
				position: absolute;
			}
			@include s(){
				position: unset;
			}
		}
		.card-wrap{
			display: flex;
			justify-content: center;
			gap: 1%;
			@include s() {
				flex-direction: column;
				margin: 5px;
			}
			.card-content{
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				gap: 1%;
				width: 250px;
				height: 320px;
				border: 1px solid rgb(194, 194, 194);
				padding: 10px;
				@include s() {
					margin:5px;
				}
				h2{
					color: $main_color;
					font-size: 32px;
					font-weight: bolder;
					margin: 15px;
				}
				h3{
					color:$title_color;
					font-size: 18px;
					font-weight: bold;
					margin: 20px;
				}
				.bold{
						font-weight: bold;
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
				button{
					cursor: pointer;
					background: $main_color;
					color: white;
					padding: 8px 12px;
					border: 1px solid $main_color;
					&:hover{
						background-color: white;
						color:$main_color;
					}
				}
			}
			.activestyle{
				background-color: $bg_violet;
				border-color:$main_color;
				button{
					cursor: pointer;
					background-color: #fff;
					color: $main_color;
					&:hover{
						background-color: $bg_violet;
						color:$main_color;
					}
				}
				@include s(){
					:last-child{
						margin-top: 20px;
					}
				}
			}
			.card-sub{
				display:flex;
				flex-direction: column;
				align-items: center;
				justify-content: space-around;
				gap: 10%;
				width: 500px;
				height: 250px;
				padding: 10px;
				border:1px solid rgb(194, 194, 194);
				text-align: center;
				@include s() {
					width:250px
				}
				h2{
					color:$title_color;
					font-size: 28px;
					font-weight: bolder;
				}
				p{
					color: $main_color;
					font-size: 32px;
					font-weight: bolder;
				}
				button{
					width:100px;
					cursor: pointer;
					justify-self: flex-end;
					background: white;
					color: $main_color;
					padding: 8px 12px;
					border: 1px solid $main_color;
					&:hover{
						background-color: $bg_violet;
						color:$main_color;
					}
				}
			}
		}
		
	}
	.decoration{
		left: 20px;
		bottom: 20px;
		font-size: 72px;
		font-weight: bolder;
		font-style: italic;
		position: absolute;
		color: $secondary;
		@include s() {
			display: none;
		}
	}
	
}

</style>
