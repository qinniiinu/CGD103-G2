<template>
	<div class="product_main">
		<div class="product-content">
			<div class="product-name">
				<h2>{{combo_name}}</h2>
				<p v-for="(tag,index) of hashtag" :key="index">
					{{tag}}
				</p>
			</div>
			<div class="look-pic">
				<div class="main-pic">
					<img :src="`../look/${bigPicture}`" alt="">
				</div>
				<div class="sub-pic">
					<div class="sub-pic-item" v-for="(pic,index) of combo_pic " :key="index" @click="this.bigPicture=pic">
						<img :src="`../look/${pic}`" alt="">
					</div>
				</div>
			</div>
			<div class="stylist">
				<img src="../../../public/pic/stylist-headPic.png" alt="">
				<div class="text">
					<h3>造型師 Ian</h3>
					<p>擁有五年資歷的Ian，擅長街頭風格......</p>
					<button class="btn_ns">more</button>
				</div>
			</div>
		</div>
		<div class="product-item-info">
				<div class="look-item">
					<router-link :to="`/productDetails/${item.product_id}`"  v-for="(item,index) of productCombo" :key="index"> 
						<div class="look-item-product"  >
							
								<div class="look-item-pic"><img :src="`../pic/${item.product_pic}`" alt=""></div>
								<div class="look-item-content">
									<h3>{{item.product_name}}</h3>
									<p>{{item.product_text}}</p>
									<p>$NT{{item.unit_price}}</p>
								</div>
							
						</div>
					</router-link> 
				</div>
				<div class="totalPrice">
					<p>整套售價:$NT{{totalPrice}}</p>
				</div>
				<button class="btn_ns" @click="add()">加入購物車</button>
				<div class="check_add" v-show="addok">
				<h3>
					加入成功
				</h3>
					<div class="close" @click="this.addok=false">
						確認
					</div>
				</div>
		</div>
	</div>

	<div class="maybeLike">
		<h2>你可能也喜歡</h2>
		<swiper
			:modules="modules"
			:space-between="0"
			navigation
			:pagination="{ clickable: true }"
			:breakpoints="swiperOptions.breakpoints"
			@swiper="onSwiper"
			@slideChange="onSlideChange"
		>
		  	<swiper-slide class="swiper" v-for="(look,index) of looks" :key="index">
                <lookCard class="swiper-item" :link="`../look/${look.combo_main_pic}`" :tag1="cut1(look.hashtag)" :tag2="cut2(look.hashtag)" :tag3="cut3(look.hashtag)" :ootdName="look.combo_name" :heartId="look.combo_id" :idlink="look.combo_id">
				</lookCard>
            </swiper-slide>

			
		
		</swiper>
	</div>

</template>
<script>
	// import Button from '@/components/Button.vue';            
	import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
	import { Swiper, SwiperSlide } from 'swiper/vue';
	import 'swiper/css';
	import 'swiper/css/navigation';
	import 'swiper/css/pagination';
	import 'swiper/css/scrollbar';
	import lookCard from "@/components/lookCard.vue";
	import { BASE_URL } from "../../assets/js/common.js";

	export default {
		name: "Set",
		components: {
		Swiper,SwiperSlide,lookCard

		},
		setup() {
			const onSwiper = (swiper) => {
				console.log(swiper);
			};
			const onSlideChange = () => {
				console.log('slide change');
			};
			return {
				onSwiper,
				onSlideChange,
				modules: [Navigation, Pagination, Scrollbar, A11y],
			};
		},


		data(){
			return{
				ggPicture:[],
				bigPicture:'',
				temp:{},
				looks:[],
				productCombo:[],
				lookImg:[],
				productItem:[],
				lookmain:'',
				cart:[],
				page:901,
				all:'',
				price1:'',
				price2:'',
				price3:'',
				price4:'',
				addok:false,
				swiperOptions: {
						breakpoints: {   
							// 390:{       
							// 	slidesPerView: 2,
							// 	spaceBetween: 10     
							// },         
							768: {       
								slidesPerView: 2,
								spaceBetween: 10     
							},          
							1024: {       
								slidesPerView: 2,       
								spaceBetween: 50     
							},   
					
							1200: {       
								slidesPerView: 3,       
								spaceBetween: 50     
							} 
						}   
				},
				// cartempty:0,
			}
		},
		computed: {
			
			setpage(){

				return this.temp;
			},
			combo_name(){
				return this.setpage?.combo_name;
			},
			combo_main_pic(){
				return this.setpage?.combo_main_pic;
			},
			hashtag(){
				return this.setpage?.hashtag.split(",");
			},
			combo_pic(){
				return this.setpage?.combo_pic.split(",");
			},
			combo_price(){
				return this.setpage?.combo_price;
			},
			totalPrice(){
				let sum=0
				this.productCombo.forEach(item=>{
					sum+=parseInt(item.unit_price);
				})
				return sum
			}
			
		},
		mounted () {
			
		
			
		},
		methods:{
			getResource() {
				this.axios.get(`${BASE_URL}/look_detail.php`).then((response) => {

					this.temp = response.data.find((e) => {
						if (e.combo_id == this.$route.params.idlink) return e;
					});
					this.bigPicture = this.temp?.combo_pic.split(",")[0];
				});
			},
			getResourceswiper() {
				this.axios.get(`${BASE_URL}/look_list.php`).then((response) => {
                this.looks = response.data;
                // this.resultproduct();
            });
			},
			getResourceproduct() {
				this.axios.get(`${BASE_URL}/look_join_product.php`, {
					params: {
						combo_id: this.$route.params.idlink,
					},
				}).then((response) => {
					this.productCombo = response.data;
				});
			},
			getStorage() {
				let data = localStorage.getItem("cart");
				if (data) data = JSON.parse(data);
				this.cart = data ? data : [];
			},
			add(){

			/* 	this.cart.push({	// id: 
                        title:this.productCombo[0].product_name,
                        image:this.productCombo[0].product_pic,
                        price:this.productCombo[0].unit_price,
                        color: this.productCombo[0].color,
                        size: this.productCombo[0].size,
                        count: 1,
                    }
					
				); */
				
				this.productCombo.forEach((item)=>{
					// 假設購物車為空時，才可以加入商品
					let getProdIndex=this.cart.findIndex((Qitem)=>{
						return Qitem.title===item.product_name 
							&& Qitem.color===item.product_color_name
							// && Qitem.id===item.product_id 
					})
					console.log(getProdIndex);
					if(getProdIndex<0){
						this.cart.push({
						id:item.product_id,
						title:item.product_name,
						image:item.product_pic,
						price:Number(item.unit_price),
						color:item.product_color_name,
						size:'M',
						count:1
						})
					}else{
						this.cart[getProdIndex].count+=1
					}
					
				})
					this.setStorage();
					this.addok=true;
				
			},
			setStorage() {
            	const data = JSON.stringify(this.cart);
            	localStorage.setItem("cart", data);
        	},
			cut1(x) {
                if (x) return x.split(",")[0];
			},
			cut2(x) {
				if (x) return x.split(",")[1];
			},
			cut3(x) {
				if (x) return x.split(",")[2];
			},
	
			
		},
		created() {
				this.getResource();
				this.getStorage();
				this.getResourceswiper();
				this.getResourceproduct();
				
			},
	};
</script>
<style lang="scss" scoped>
	.product_main{
		
		width: 90%;
		max-width: 1200px;
		margin: auto;
		@include l{
			display: flex;
			
		}
		.product-content{
			width: 90%;
			margin: auto;
			margin-top:20px ;
			@include l{
				width: 50%;
			}
			.product-name{
		
				margin-bottom: 10px;
				// vertical-align: middle;
				@include l{

					align-items: center;
					margin-bottom: 20px;
					flex-wrap: wrap;
				}
				h2{
					font-weight: 700;
					font-size: 32px;
					color: $title_color;
					margin-right: 10px;
				}
				p{
					display: inline-block;
					background-color: $main-color;
					color: $third-color;
					padding: 5px 8px;
					@include m{
						padding: 8px 10px;
						// margin-top:auto;
						margin-bottom: auto;
						font-size: 16px;
					}
					margin: 5px;
					vertical-align: middle;
					margin-top: 15px;
					font-size: 14px;
				}
				p:first-child{
					margin-left: 0px;
				}

			}
			.look-pic{
				
				.main-pic{
					position: relative;
					&::before {
						content: "";
						position: absolute;
						top: 10px;
						left: 10px;
						border: 1px solid #000;
						background-color: #EEEEEE;
						width: 95%;
						height: 100%;
						z-index: -1;
					}

					&::after {
						content: "";
						position: absolute;
						top: 20px;
						left: 20px;
						border: 1px solid #000;
						background-color: #D7D7D7;
						width: 95%;
						height: 100%;
						z-index: -2;
					}

					img{
						border: 1px solid $title_color;
						width: 95%;
						height: 100%;
						object-fit: cover;
						
					}
					
				}
 				.sub-pic{
					margin-top: 45px;
					display: flex;
					gap: 18px;
					box-sizing: border-box;
					cursor: pointer;

					img{
						border: 1px solid $title_color;
						width: 100%;
						height: 100%;
						object-fit: cover;
					}
				}

			}
			.stylist{
				border: 1px solid $title_color;
				display: flex;
				margin-top:20px;
				box-sizing: border-box;
				img{
					padding: 10px;
					width:20%;
					margin: auto;
					height: 20%;
					max-height: 150px;
					max-width: 150px;
					min-width: 120px;
					min-height: 120px;
					@include m{

					}
					object-fit: cover;
					flex-grow:1 ;
				}
				.text{
					padding: 10px;
					padding-left: 0;
					@include m{
						margin-left: 10px;
					}
					margin-left: 0px;
					flex-grow:1 ;
					h3{
						font-weight: 700;
						color: $title_color;
						font-size: 20px;
						margin-bottom: 5px;
						@include m{
							font-size:22px;
						}
					}
					p{
						
						color:$text_color ;
						line-height:21px ;
						font-size:14px;
						text-align: justify;
						@include m{
							font-size:16px;
						}
					}
					button{
						display: block;
						margin-left:auto ;
						margin-top: 20px;
						padding: 5px 10px;
						line-height: 18px;
						@include m{

							margin-top: 50px;
						}
						@include l{

							margin-top: 65px;
						}
					}
					// p:last-child{
					// 	padding: 0px 10px;
					// 	background: $main_color;
					// 	width: fit-content;
					// 	color: $third_color;
					// 	display: flex;
					// 	line-height: 28px;
					// 	
					//
					// }
				}
			}
		}
		.product-item-info{
	
			width: 90%;
			margin: auto;

			@include l{
				width: 50%;
				margin-top: 8%;
			}
			
			.look-item{
				padding-top: 20px;
				display: flex;
				flex-wrap: wrap;
				@include l{
					display:block;
					padding-top: 0px;
					.look-item-product:first-child{
						margin-top: 0 ;
					}
				}
				.look-item-product{
					margin: 20px auto ;
					border: 1px solid $title_color; 
					width:100% ;
					box-sizing: border-box;
					@include l{
						margin: 20px 30px ;
						margin-right:auto;
						display: flex;
						justify-content: center;
						align-items: flex-start;
						width:fit-content ;

					}
					
					.look-item-pic{
						padding: 12px ;
						width: 80%;
						@include m{
							margin: auto ;
						}
						@include l{
							width: 30%;
						}
						margin: auto;
						img{
							width: 100%;
							height: 100%;
							object-fit: cover;
						}
					}
					
					.look-item-content{
						width: 80%;
						padding:0px 12px;
						display: flex;
						flex-direction: column;
						margin-bottom: 15px;
						margin:auto;
						@include m{
							display: block;
							margin:auto;
						}
						// justify-content: space-between;
						// align-content: stretch;
						// margin-bottom:20px ;
						@include l{
							width: 70%;
							padding: 20px;
							text-align: start;
						}
						text-align: center;
						h3{
							font-weight: 700;
							color: $title_color;
							font-size: 18px;
							margin-bottom: 10px;
							letter-spacing: .5px;
							@include m{
								font-size: 20px;
							}
						}
						p{
							color:$text_color ;
							line-height:18px ;
							@include m{
								line-height:21px; 
								font-size: 14px;

							}
							font-size:12px;
							letter-spacing: .5px;
							text-align: center;
							@include xl{
								text-align: justify;
							}
						}
						p:last-child{
							color:$title_color;
							line-height:32px ;
							font-size:24px;
							// margin-bottom: 20px;
							// margin-top:auto;
							font-weight: 700;
							margin-top: 10px;
							text-align: center;
							margin-bottom: 10px;
							@include l{
								margin-top: 40px;
								margin-bottom: 0;
								text-align: end;
							}
							@include xl{
								margin-bottom: 0px;
							}
						}
					}
				}
			}
			.totalPrice{
				p{
					color:$title_color ;
					line-height:64px ;
					font-size:32px;
					font-weight: 700;
					text-align: center;
					margin-bottom: 20px;
					@include l{
						text-align: end;
					}
				}
			}
			button{
				display: block;
				margin: auto;
				font-size: 16px;
				line-height: 32px;
				@include l{
					margin: 0;
					margin-left: auto;
					padding: 5px 20px;
					font-size: 18px;
					line-height: 36px;
				}
				
				
				
			}
		}

	}

	.maybeLike{
		width: 90%;
		max-width: 1200px;
		margin: auto;
		margin-top:80px ;
		h2{
			margin-bottom: 50px;
			font-weight: 700;
			font-size: 32px;
			color: $title_color;
			text-align: center;
		}
		
		.swiper{
			margin-bottom: 50px;
			.swiper-item{
				width: 60%;
				margin: auto;
			}
		}
	}
	.check_add{
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
