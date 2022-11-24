<template>
	<!-- <nav>
<router-link to="/">Home</router-link> |
		<router-link to="/about">About</router-link> 
	
  </nav> -->

	<!--nav-->
	<input type="checkbox" name="" id="menu-switch" />
	<div class="header">
		<div class="container">
			<!-- logo -->
			<div class="logo">
				<router-link to="/"
					><img src="@/assets/logo.png"
				/></router-link>
			</div>
			<!-- 選單 -->
			<nav class="main_nav">
				<ul class="main">
					<li class="main_list">
						<router-link to="/MulStyles">找風格</router-link>
						<ul class="sub">
							<li><router-link to="/Wearing">風格穿搭</router-link></li>
							<li><router-link to="/Quiz">風格測驗</router-link></li>
							<li><router-link to="/ConsultIntro">風格諮詢</router-link></li>
						</ul>
					</li>
					<li class="main_list">
						<router-link to="/product">逛商品</router-link>
						<ul class="sub">
							<li><router-link to="/ProductList">商品列表</router-link></li>
							<li>
								<router-link to="/FittingRoom">線上試衣間</router-link>
							</li>
							<li><router-link to="/WeeklyWear">一周穿搭</router-link></li>
						</ul>
					</li>
					<li class="main_list">
						<router-link to="/ootd">風格動態牆</router-link>
						<ul class="sub">
							<li><router-link to="/">OOTD</router-link></li>
							<li><router-link to="/">我的OOTD</router-link></li>
						</ul>
					</li>
					<li class="main_list">
						<router-link to="/subscription">訂閱服務</router-link>
						<ul class="sub">
							<li><router-link to="/">服務選擇</router-link></li>
							<li><router-link to="/">服務說明</router-link></li>
						</ul>
					</li>
					<li class="main_list">
						<router-link to="/about">關於我們</router-link>
						<ul class="sub">
							<li><router-link to="/">品牌精神</router-link></li>
							<li><router-link to="/">廠商洽談</router-link></li>
							<li><router-link to="/">FAQ</router-link></li>
						</ul>
					</li>
				</ul>
			</nav>
			<div class="main_nav_icon">
				<router-link to="/test">
					<font-awesome-icon icon="fa-solid fa-cart-shopping" />
				</router-link>
				<router-link to="/test">
					<font-awesome-icon icon="fa-solid fa-user"/>
				</router-link>
			</div>
			<!-- 漢堡 -->
			<label for="menu-switch" class="hb">
				<span></span>
				<span></span>
				<span></span>
			</label>
		</div>
	</div>

	<router-view />
</template>
<script>





</script>
<style lang="scss">

	@import "@/assets/sass/main";

	#menu-switch {
		display: none;

		&:checked + div.header {
			.main_nav {
				/* display: block; */
				left: 0;
				opacity: 1;
				transition: opacity 0.5s 0.5s;
			}

			.hb {
				span:nth-child(1) {
					animation: no1 0.5s 0.5s forwards;
				}

				span:nth-child(2) {
					animation: no2 0.5s 0s forwards;
				}

				span:nth-child(3) {
					animation: no3 0.5s 0.5s forwards;
				}
			}
		}
	}
	div.header {
		outline: 1px solid red;
		background-color: $bg_white;

		.container {
			max-width: $max_width;
			height: $nav_height;
			margin: auto;
			display: flex;
			justify-content: space-between;
			align-items: center;
			background-color: $bg_white;
			color: $main_color;
			position: sticky;
			top: 0;
			@include m() {

				outline: 1px solid red;
			}

			.logo {
				height: 40px;
				img {
					width: 100%;
					height: 100%;
					vertical-align: top;
				}
			}
			svg{
				width: 30px;
				@include m() {
					width: 50px;

				}
				color: $main_color;
				height: 20px;
				padding: 5px;
			}
			
			.hb {
				@include s() {
					width: 40px;
					height: 40px;
					position: relative;
				}
				@include m() {
					display: none;
				}
				span {
					width: 32px;
					height: 2px;
					background-color: $main_color;
					position: absolute;
					left: 0;
					right: 0;
					margin: auto;
					transform: rotate(0deg);
					opacity: 1;

					&:nth-child(1) {
						top: 7px;
					}
					&:nth-child(2) {
						top: 19px;
					}
					&:nth-child(3) {
						top: 31px;
					}
				}
			}

			.main_nav_icon {
				@include s() {
					text-align: right;
					outline: 1px solid red;
					flex-grow: 1;
				}
			}

			.main_nav {
				@include s() {
					position: absolute;
					width: 100%;
					left: -100%;
					top: 100%;
					opacity: 0;
					transition: opacity 0.5s 0s, left 0s 0.5s;
					background: $bg-white;
				}

				@include m() {
					display: flex;
					width: fit-content;
					flex-grow: 1;
					justify-content: flex-end;
				}

				ul.main .main_list {
					position: relative;
					@include m() {
						display: inline-block;

						&:hover > ul.sub {
							display: block;
						}

						&:hover > a {
							border: $line solid $main_color;
							font-weight: 600;
						}
					}
					a {
						font-size: $nav_fsize;
						display: block;

						@include s() {
							padding: 20px;
							color: $third_color;
							background-color: $main_color;
							text-align: center;
							margin: 5px;
						}

						@include m() {
							color: $main_color;
							width: 125px - $line * 2;
							text-align: center;
							line-height: ($nav_height - $line * 2);
							border: $line solid transparent;
						}
					}
					.sub {
						position: absolute;

						@include s() {
							display: none;
						}
						@include m() {
							display: none;
						}

						a {
							text-decoration: none;
							color: $third_color;
							background-color: $main_color;
							text-align: center;
							border: $line solid $main_color;
							&:hover {
								border: $line solid $third_color;
								font-weight: 600;
							}
						}
					}
				}
			}
		}
	}
	@keyframes no1 {
		0% {
			top: 7px;
			transform: rotate(0deg);
		}

		50% {
			top: 19px;
			transform: rotate(0deg);
		}

		100% {
			top: 19px;
			transform: rotate(405deg);
		}
	}

	@keyframes no2 {
		0% {
			opacity: 1;
		}

		100% {
			opacity: 0;
		}
	}

	@keyframes no3 {
		0% {
			top: 31px;
			transform: rotate(0deg);
		}

		50% {
			top: 19px;
			transform: rotate(0deg);
		}

		100% {
			top: 19px;
			transform: rotate(675deg);
		}
	}
</style>
