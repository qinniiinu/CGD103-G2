<template>
<<<<<<< HEAD
	<div class="subscription">
		<div class="wrap">
			<div class="left">
			</div>
			<div class="right">
				<h2>立即升級體驗完整服務</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, totam nostrum itaque amet iste omnis eaque aperiam vel sint doloribus voluptatum commodi eum velit officiis adipisci culpa sunt atque harum tenetur officia vero, earum at ullam? Expedita quidem illum, autem voluptas repellat, ea culpa ratione minima sunt sequi cumque fuga.</p>
			</div>
		</div>
	</div>
	<div class="sub-plan">
		<div class="subcard">
			<div class="card-wrap">
				<div class="card-content">
					<div class="level">#BASIC</div>
					<h2>NT$ <span>899</span>/月</h2>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月專屬搭配一套</p>
					<span>上身* 1、下身*1、外套*1</span>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月諮詢造型師<span>1</span>次</p>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月免運費<span>1</span>次</p>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 商品<span>95</span>折優惠</p>
					<button>訂閱</button>
				</div>
			</div>
		</div>
		<div class="subcard">
			<div class="card-wrap">
				<div class="card-content">
					<div class="level">#STANDARD</div>
					<h2>NT$ <span>1,899</span>/月</h2>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月專屬搭配一套</p>
					<span>上身* 1、下身*1、外套*1</span>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月諮詢造型師<span>2</span>次</p>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月免運費<span>2</span>次</p>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 商品<span>9</span>折優惠</p>
					<button>訂閱</button>
				</div>
			</div>
		</div>
		<div class="subcard">
			<div class="card-wrap">
				<div class="card-content">
					<div class="level">#ULTRA</div>
					<h2>NT$ <span>3,999</span>/月</h2>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月專屬搭配一套</p>
					<span>上身* 1、下身*1、外套*1、鞋子*1</span>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月諮詢造型師<span>5</span>次</p>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 每月免運費</p>
					<p><font-awesome-icon icon="fa-solid fa-check" /> 商品<span>8</span>折優惠</p>
					<button>訂閱</button>
				</div>
			</div>
		</div>
	</div>
	<div class="sub-intro">
		<div class="intro-wrap">
		</div>
	</div>
=======
    <div class="subscription">
        <h1>This is 訂閱page</h1>
    </div>
    <Footer></Footer>
>>>>>>> mine
</template>

<script>

export default {
<<<<<<< HEAD
	name: "Product",
	components: {
	},
=======
    name: "Product",
    components: {
        Footer,
    },
>>>>>>> mine
};
</script>
<style lang="scss" scoped>
	.subscription{
		width: 100%;
		.wrap{
			display: flex;
			justify-content: center;
			// align-items: center;
			// background-image: url(../assets/bg_pic/test_bg.png);
			background:
				linear-gradient(350deg,rgb(255, 255, 255) 40%,transparent 40%)left bottom,
				url(../assets/sub_test_img/test_03.png) no-repeat fixed left top;
				background-color: RGB(245, 245, 245);
			// background-repeat: no-repeat;
			// background-position: left bottom;
			height: 600px;
			// margin: auto;
			.left{
			width: 700px;
			height: auto;
			}
			.right{
				width: 500px;
				margin: 10vh;
				// height: 800px;
				font-size: 32px;
				color: $title_color;
				font-weight: bold;
				p{
					font-size: 14px;
					font-weight: normal;
					margin-top: 20px;
					line-height: 20px;

				}
			}
		}
	}
	.sub-plan{
		height: 280px;
		margin: auto;
		display: flex;
		justify-content: center;
		position: relative;
		.subcard{
			-webkit-transform: skew(-5deg);
			-moz-transform: skew(-5deg);
			-o-transform: skew(-5deg);
			position: absolute;
			border: 1px solid black;
			&:nth-child(1){
				top: -200px;
				left:15vw;
			}
			&:nth-child(2){
				top: -250px;
				left:40vw;
			}
			&:nth-child(3){
				top: -300px;
				left:65vw;
			}
			.card-wrap{
				width: 225px;
				background: white;
				padding: 30px 15px;
				color: $main_color;
				.card-content{
					text-decoration: none;
					-webkit-transform:none;
					-moz-transform:none;
					-o-transform:none;
					display: flex;
					flex-direction: column;
					gap: 10px;
					text-align: left;
					position: relative;
					z-index: 1;
					transition: all .3s ease-in;
					h2{
						color: $title_color;
						font-size: 20px;
						font-weight: bold;
						margin: auto;
						margin-bottom: 10px;
					}
					p{
						color:$text_color;
						font-size: 14px;
					}
					span{
						font-size: 32px;
					}
					:first-child~span{
						font-size: 14px;
						font-weight: bold;
					}
					.level{
						padding: 10px 30px;
						background-color: $main_color;
						color: white;
						font-weight: bold;
						font-size: 20px;
						position: absolute;
						right: -40px;
						top:-50px;
					}
					button{
						margin-top: 20px;
						background-color: $main_color;
						color: white;
						border: 1px solid $main_color;
						padding: 5px 10px;
						&:hover{
							background-color: $bg_blue;
							color: $main_color;
							border: 1px solid $main_color;
						}
					}
				}
				&:after{
					content: '';
					background: $main_color;
					height: 100%;
					width: 100%;
					position: absolute;
					left: 0;
					top: 0;
					z-index: 0;
					clip-path: circle(0% at 0% 0%);
					transition: all .4s ease-in;
				}
				&:hover{
					 &:after{
						clip-path: circle(100%);
						opacity: 0.05;
					 }
					 .card-content{
						h2,p{
							color:$main_color;
						}
					 }
				}
			}
		}
	}
	.sub-intro{
		// width: 100vw;
		height: 600px;
	}
</style>
