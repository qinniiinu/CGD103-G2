<template>
	<!-- 會員 container -->
	<p class="title">訂閱服務</p>
	<div class="data">
		<!-- 這裡開始寫 -->
		<div class="card">
			<div v-if="memsub==false" class="card-wrap">
				<div class="card-v" v-for="sub in subinfo" :key="sub.level">
					<div class="card-content">
						<h2>#{{sub.level}}</h2>
						<p>
							<font-awesome-icon icon="fa-solid fa-check" />
							每月專屬搭配<span>1</span>套
                    	</p>
						<span>{{sub.monthSet}}</span>
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
			<div v-else class="card-wrap">
				<div v-if="view===1" class="card-sub">
					<h2>您的訂閱方案</h2>
					<p class="memlevel">#{{vip_level[0].level_name}}</p>
					<button @click="view=2">更改方案</button>
				</div>
				<div class="card-wrap" v-if="view===2">
					<div class="card-v" v-for="sub in subinfo" :key="sub.level">
						<div class="card-content" :class="{activestyle:isActive(sub.level)}">
							<h2>#{{sub.level}}</h2>
							<p>
								<font-awesome-icon icon="fa-solid fa-check" />
								每月專屬搭配<span>1</span>套
							</p>
							<span>{{sub.monthSet}}</span>
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
							<p>訂閱日:{{sub_time}} </p>
							<p>下次付款日:{{sub_deadline}} </p>
							<router-link to="/SubCheckout"><button @click="setStorage(index,sub)">訂閱</button></router-link>
						</div>
					</div>
					<!-- <h2>#BASIC</h2>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月專屬搭配一套
					</p>
					<span>上身* 1、下身*1、外套*1</span>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月諮詢造型師<span>1</span>次
					</p>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月免運費<span>1</span>次
					</p>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						商品<span>95</span>折優惠
					</p>
					<h3>NT$ <span>899</span>/月</h3>
					<p>訂閱日:{{sub_time}} </p>
					<p>下次付款日:{{sub_deadline}} </p>
					<button>已訂閱</button>
					</div>
					<div class="card-content">
					<h2>#STANDARD</h2>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月專屬搭配一套
					</p>
					<span>上身* 1、下身*1、外套*1</span>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月諮詢造型師<span>2</span>次
					</p>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月免運費<span>2</span>次
					</p>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						商品<span>9</span>折優惠
					</p>
					<h3>NT$ <span>1,899</span>/月</h3>
					<button>立即訂閱</button>
					</div>
					<div class="card-content">
					<h2>#ULTRA</h2>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月專屬搭配一套
					</p>
					<span>上身* 1、下身*1、外套*1、鞋子*1</span>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月諮詢造型師<span>5</span>次
					</p>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						每月無限次免運費
					</p>
					<p>
						<font-awesome-icon icon="fa-solid fa-check" />
						商品<span>8</span>折優惠
					</p>
					<h3>NT$ <span>3,999</span>/月</h3>
					<button>立即訂閱</button>
					</div> -->
				</div>
			</div>
			<button class="cancel" v-if="view===2" @click="memsub=false,view=1">取消訂閱</button>
			<router-link to="/MyPage"><button v-if="view===1" class="back">返回</button></router-link>
			<button v-if="view===2" class="back" @click="view=1">返回</button>
		</div>
		<div class="decoration">
			#PREMIUM
		</div>
	</div>
</template>

<script>
import {subinfo} from'@/assets/config/setting.js'
import {vip_level} from'@/assets/config/setting.js'
export default {
	name: "memSubscription",
	components: {
	},
	data(){
		return{
			subinfo:subinfo,
			vip_level:vip_level,
			memsub:true,
			view:1,
			sub_time:'2022/12/02',
			sub_deadline:'2022/01/02',
			subscribe:[],
			active:true,
			mem_level:'BASIC',
			meminfo:[]
		}
	},
	created(){
		this.getResource();
	},
	computed:{
		
	},
	methods:{
		setStorage(index,sub){
            console.log(sub);
            this.subscribe.push({
                level:sub.level,
                price:sub.price,
                monthSet:sub.monthSet,
                monthConsult:sub.monthConsult,
                freeShipping:sub.freeShipping,
                specialOffer:sub.specialOffer
            })
            const data=JSON.stringify(this.subscribe);
            console.log(data);
            localStorage.setItem('subscribe',data);
        },
		isActive(e){
			return e===this.mem_level;
		},
		getResource() {
            this.axios.get("/api_server/subscription.php").then((response) => {
                this.meminfo = response.data;
            });
			console.log(this.meminfo);
        },
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
			gap: 3%;
			@include s() {
				flex-direction: column;
				margin: 5px;
			}
			.card-content{
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				gap: 2%;
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
