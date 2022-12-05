<template>
	<div class="product_main">
		<div class="product-content">
			<div class="product-name">
				<h2>{{pname}}</h2>
				<p v-for="(hashtag,index) of hashtags" :key="index">
					{{hashtag}}
				</p>
			</div>
			<div class="look-pic">
				<div class="main-pic">
					<img src="../../../public/look-main-pic.png" alt="">
				</div>
				<div class="sub-pic">
					<div class="sub-pic-item" v-for="(productPic,index) of productPics " :key="index">
						<img :src="productPic.src" alt="">
					</div>
				</div>
			</div>
			<div class="stylist">
				<img src="../../../public/stylist-headPic.png" alt="">
				<div class="text">
					<h3>造型師 Ian</h3>
					<p>擁有五年資歷的Ian，擅長街頭風格......</p>
					<p>more</p>
				</div>
			</div>
		</div>
		<div class="product-item-info">
				<div class="look-item">
					<div class="look-item-product" v-for="(product,index) of products" :key="index" >
						<div class="look-item-pic"><img :src="product.src" alt=""></div>
						<div class="look-item-content">
							<h3>{{product.title}}</h3>
							<p>{{product.text}}</p>
							<!-- <p>{{}}</p> -->
							<p>$NT{{product.price}}</p>
						</div>
					</div>
				</div>
				<div class="totalPrice">
					<p>整套售價:$NT6,999</p>
				</div>
				<button class="btn_s" >加入購物車</button>
		</div>
	</div>

	<div class="maybeLike">
		<h2>你可能也喜歡</h2>
		<swiper
			:slides-per-view="3"
			:space-between="50"
			@swiper="onSwiper"
			@slideChange="onSlideChange">

			<swiper-slide>
				
			</swiper-slide>


		</swiper>
	</div>

</template>
<script>
	import Button from '@/components/Button.vue';
	import { Swiper, SwiperSlide } from 'swiper/vue';
	import 'swiper/css';


	export default {
		name: "Set",
		components: {
		Button,Swiper,SwiperSlide

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
		};
		},
		data(){
			return{
				pname:'Male  OOTD 12'
				,
				hashtags:[
					'Outdoor',
					'戶外穿搭',
					'OOTD',
					'橘色'
				]
				,
				productPics:[
					{src:'/productPic_1.webp'},
					{src:'/productPic_2.webp'},
					{src:'/productPic_3.webp'},
					{src:'/productPic_4.webp'},
				],
				products:[
					{src:'/look-item-1.png',title:'UV剪裁夾克',text:'可用於各種場合的質地，不僅適用於戶外活動和運動，還適用於日常休閒裝。UPF40+',price:'1,990'},
					{src:'/look-item-2.png',title:'超輕羽絨背心',text:'實用性和設計性得到進一步發展。輕薄又保暖，可以根據場合和造型隨意佩戴',price:'1,690'},
					{src:'/look-item-3.png',title:'寬條紋襯衫',text:'減少洗滌後的頑固皺紋，您可以享受適度的休閒和粗獷',price:'1,290'},
					{src:'/look-item-4.png',title:'斜紋棉布褲',text:'由 100% 棉製成的傳統斜紋棉布褲',price:'1,290'},
				],
			}
		}
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
			@include l{
				width: 50%;
			}
			.product-name{
			
		
				margin-bottom: 10px;
				@include l{
					display: flex;
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
					padding: 10px;
					margin: 5px;
					margin-top: 10px;
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
				img{
					padding: 10px;
					width:20%;
					object-fit: cover;
					flex-grow:1 ;
				}
				.text{
					padding: 10px;
					padding-left: 0;
					margin-left: 10px;
					flex-grow:10 ;
					h3{
						font-weight: 700;
						color: $title_color;
						font-size: 20px;
						margin-bottom: 5px;
					}
					p{
						
						color:$text_color ;
						line-height:21px ;
						font-size:14px;
					}
					p:last-child{
						padding: 0px 10px;
						background: $main_color;
						width: fit-content;
						color: $third_color;
						display: flex;
						line-height: 28px;
						margin-top: 50px;
						margin-left:auto ;
					}
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
					@include l{
						margin: 20px 30px ;
						margin-right:auto;
						display: flex;
						justify-content: center;
						align-items: flex-start;
						width:fit-content ;

					}
					
					.look-item-pic{
						padding: 20px ;
						width: 80%;
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
						padding:0px 20px;
						@include l{
							width: 70%;
							padding: 20px;
							text-align: start;
						}
						text-align: center;
						h3{
							font-weight: 700;
							color: $title_color;
							font-size: 20px;
							margin-bottom: 10px;
						}
						p{
							color:$text_color ;
							line-height:21px ;
							font-size:14px;
						}
						p:last-child{
							color:$title_color;
							line-height:32px ;
							font-size:24px;
							margin-bottom: 20px;
							margin-top: 5px;
							font-weight: 700;
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
		h2{
			margin: 50px 0px 20px;
			font-weight: 700;
			font-size: 32px;
			color: $title_color;
			margin-right: 10px;
			text-align: center;
		}
	}
</style>
