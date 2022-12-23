<template>
	<div class="product_main">
		<div class="product-content">
			<div class="product-name">
				<h2>{{ootd.pname}}</h2>
				<p v-for="(hashtag,index) of ootd.hashtags" :key="index">
					{{hashtag}}
				</p>
			</div>
			<div class="look-pic">
				<div class="main-pic">
					<img :src="String(lookmain)" alt="">
				</div>
				<div class="sub-pic">
					<div class="sub-pic-item" v-for="(productPic,index) of productPics " :key="index" @click="lookmain=productPic.src">
						<img :src="productPic.src" alt="">
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
					<div class="look-item-product" v-for="(product,index) of productItem" :key="index" >
						<div class="look-item-pic"><img :src="product.product_pic" alt=""></div>
						<div class="look-item-content">
							<h3>{{product.product_name}}</h3>
							<p>{{product.product_text}}</p>
							<p>$NT{{product.unit_price}}</p>
						</div>
					</div>
				</div>
				<div class="totalPrice">
					<p>整套售價:$NT{{total}}</p>
				</div>
				<button class="btn_ns" @click="add()">加入購物車</button>
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
			<swiper-slide class="swiper" v-for="(col,index) of cols" :key="index">
				<lookCard class="swiper-item" :link="col.src" :tag="col.tag" :ootdName="col.ootdName" :heartId="col.id"></lookCard>
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
				ootd:{
					id:666,pname:'都會簡約時尚穿搭',hashtags:['Outdoor','戶外穿搭','OOTD','橘色']
				},
				lookImg:[],
				productItem:[],

				productPics:[
					{src:'look/look-info-pic1.png'},
					{src:'look/look-info-pic2.png'},
					{src:'look/look-info-pic3.png'},
					{src:'look/look-info-pic4.png'},
					{src:'look/look-info-pic5.png'},
				],
				products:[
					{id:501,color:'brown',size:'s',src:'/product/look-item-1.png',title:'合身剪裁長版大衣',text:'一件剪裁考究的外套，可以根據您的著裝和溫度，將衣領向上或向下穿著',price:5590},
					{id:502,color:'beige',size:'s',src:'/product/look-item-2.png',title:'簡約條紋襯衫',text:'舒適的棉質襯衫。設計點是清新的條紋圖案',price:1990},
					{id:503,color:'beige',size:'s',src:'/product/look-item-3.png',title:'平紋針織高喬褲',text:'通過排列環，您可以享受直線和曲線的輪廓',price:1290},
					{id:504,color:'black',size:'s',src:'/product/look-item-4.png',title:'時尚短靴',text:'從材料到細節，我們都非常注重細節，以實現舒適性和高設計性',price:3990},
				],
				cols:[
					{src:'/look/look-1.jpg',ootdName:'OOTD-001',tag:['#上班穿搭','＃沙漏形'],id:'01'},
					{src:'/look/look-2.jpg',ootdName:'OOTD-002',tag:['#約會穿搭','＃蘋果形'],id:'02'},
					{src:'/look/look-3.jpg',ootdName:'OOTD-003',tag:['#上課穿搭','＃蘋果形'],id:'03'},
					{src:'/look/look-4.jpg',ootdName:'OOTD-004',tag:['#上課穿搭','＃蘋果形'],id:'04'},
					{src:'/look/look-5.jpg',ootdName:'OOTD-005',tag:['#開會穿搭','＃蘋果形'],id:'05'},
					{src:'/look/look-6.jpg',ootdName:'OOTD-006',tag:['#旅行穿搭','＃蘋果形'],id:'06'},
					{src:'/look/look-7.jpg',ootdName:'OOTD-007',tag:['#趴踢穿搭','＃蘋果形'],id:'07'},
					{src:'/look/look-8.jpg',ootdName:'OOTD-008',tag:['#宴會穿搭','＃蘋果形'],id:'08'},
					{src:'/look/look-9.jpg',ootdName:'OOTD-009',tag:['#運動穿搭','＃蘋果形'],id:'09'},
						
				],
				lookmain:'',
				cart:[],
				page:909,
				total:'',
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
			
		
			
		},
		mounted () {
			console.log(this.productItem)
			this.getLookResource()
			this.getProductResource()
			this.lookmain=this.productPics[0].src 
			this.total=this.products[0].price + this.products[1].price + this.products[2].price + this.products[3].price
		},
		methods:{
			getStorage() {
				let data = localStorage.getItem("cart");
				if (data) data = JSON.parse(data);
				this.cart = data ? data : [];
			},
			add(){

				this.cart.push({	// id: 
                        title:this.products[0].title,
                        image:this.products[0].src,
                        price:this.products[0].price,
                        color: this.products[0].color,
                        size: this.products[0].size,
                        count: 1,
                    },{	// id: 
                        title:this.products[1].title,
                        image:this.products[1].src,
                        price:this.products[1].price,
                        color: this.products[1].color,
                        size: this.products[1].size,
                        count: 1,
                    },
					{	// id: 
                        title:this.products[2].title,
                        image:this.products[2].src,
                        price:this.products[2].price,
                        color: this.products[2].color,
                        size: this.products[2].size,
                        count: 1,
                    },
					{	// id: 
                        title:this.products[3].title,
                        image:this.products[3].src,
                        price:this.products[3].price,
                        color: this.products[3].color,
                        size: this.products[3].size,
                        count: 1,
                    },
					
				);
					this.setStorage();
					

				// 	if(this.cartempty<1){
				// 
				// }
				// this.cartempty+=1

				
			},
			setStorage() {
            	const data = JSON.stringify(this.cart);
            	localStorage.setItem("cart", data);
        	},
			getProductResource() {
			//取得員工資料
				this.axios.get(`${BASE_URL}/setproduct.php`).then((response) => {
					console.log(response.data);
					this.productItem = response.data;
					console.log(this.page);
                    if (productItem.combo_id == this.page){
						
					}
                });
			},
			getLookResource() {
			//取得員工資料
				this.axios.get(`${BASE_URL}/setlook.php`).then((response) => {
					console.log(response.data);
					this.lookImg = response.data;
				});
			},
			
			
		},
		created() {
				// this.getResource();
				this.getStorage();
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
					width:45% ;
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
							margin: auto 0;
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
						
						@include m{
							display: block;
							margin:0px;
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
							text-align: justify;
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
							@include l{
								margin-top: 40px;
								margin-bottom: 0;
								text-align: end;
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
			margin-bottom: 80px;
			.swiper-item{
				width: 60%;
				margin: auto;
				
			}
		}
	}
</style>
