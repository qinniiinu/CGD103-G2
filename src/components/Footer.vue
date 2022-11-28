<template>
	<div>
		<footer>
			<ul class="main">
				<div class="main_list_outside">
					<li class="main_list">
						<div class="main_list_box" tabindex="0">
							<p class="bg_tag">#STYLE</p>
							<p class="name">找風格</p>
							<div class="icon"><font-awesome-icon icon="fa-solid fa-plus" /></div>
						</div>
						<ul class="sub">
							<li><a href="#">風格穿搭</a></li>
							<li><a href="#">風格測驗</a></li>
							<li><a href="#">風格諮詢</a></li>
						</ul>
					</li>
				</div>
				<div class="main_list_outside">
					<li class="main_list">
						<div class="main_list_box" tabindex="0">
							<p class="bg_tag">#PRODUCT</p>
							<p class="name">逛商品</p>
							<div class="icon"><font-awesome-icon icon="fa-solid fa-plus" /></div>
						</div>
						<ul class="sub">
							<li><a href="#">商品列表</a></li>
							<li><a href="#">線上試衣間</a></li>
							<li><a href="#">一周穿搭</a></li>
						</ul>
					</li>
				</div>
				<div class="main_list_outside">
					<li class="main_list">
						<div class="main_list_box" tabindex="0">
							<p class="bg_tag">#OOTD</p>
							<p class="name">風格牆</p>
							<div class="icon"><font-awesome-icon icon="fa-solid fa-plus" /></div>
						</div>
						<ul class="sub">
							<li><a href="#">OOTD</a></li>
							<li><a href="#">我的OOTD</a></li>
						</ul>
					</li>
				</div>
				<div class="main_list_outside">
					<li class="main_list">
						<div class="main_list_box" tabindex="0">
							<p class="bg_tag">#PREMIUM</p>
							<p class="name">穿搭訂閱</p>
							<div class="icon"><font-awesome-icon icon="fa-solid fa-plus" /></div>
						</div>
						<ul class="sub">
							<li><a href="#">訂閱選擇</a></li>
							<li><a href="#">訂閱說明</a></li>
						</ul>
					</li>
				</div>
				<div class="main_list_outside">
					<li class="main_list">
						<div class="main_list_box last-box" tabindex="0">
							<p class="bg_tag">#ABOUT</p>
							<p class="name">關於我們</p>
							<div class="icon"><font-awesome-icon icon="fa-solid fa-plus" /></div>
						</div>
						<ul class="sub">
							<li><a href="#">品牌精神</a></li>
							<li><a href="#">廠商洽談</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</li>
				</div>
			</ul>
			<div class="copyright">
				<p>
					本網站為緯育TibaMe_前端設計工程師班第79期學員專題成果作品,本平台僅供學
					習、展示之用。若有抵觸有關著作權,或有第三人主張侵害智慧財產權等情事,均
					由學員負法律上責任,緯育公司概不負責。若有侵權疑慮,您可以私訊[緯育
					TibaMe],後續會由專人協助處理。
				</p>
			</div>
		</footer>
	</div>
</template>
<script>
	export default {
		name: "Footer",
		props: {
			// msg: String
		},
	};
</script>

<style lang="scss">
	@import "@/assets/sass/main";
	footer {
		border: $line solid $main-color;
		text-align: center;

		ul.main {

			.main_list_outside {
				width: 100%;

				border-top: $line solid $main-color;

				.main_list {
					max-width: $max_width;
					width: 100%;
					margin: auto;
					position: relative;
					@include m() {
						display: flex;
					}
					.bg_tag {
						position: absolute;
						z-index: -1;
						right: 10px;
						color: $bg_violet;
						@include font_set($second_font, $null, 900, italic);
						@include s() {
							font-size: 56px;
						}
						@include m() {
							font-size: 72px;
						}
					}

					.main_list_box {
						display: flex;
						justify-content: space-between;
						align-items: center;
						height: ($footer_box_height - $line * 2);
						padding: 10px;
						box-sizing: border-box;
						// outline: 1px solid red;

						@include m() {
							width: 25%;
						}

						&:focus + .sub > li {
							@include s() {
								height: $footer_box_height;
								transition: all 0.5s;
								
							}
						}

						&:focus .icon{

							transform: rotate(-45deg);
							transition: transform 0.3s 0s;
							
						}

						.name {
							@include font_set($main_font, $null, 600, $null);
							@include s() {
								font-size: 24px;
							}
							@include m() {
								font-size: 40px;
							}
						}
						.icon {
							transform: rotate(0deg);
							transition: transform 0.3s 0s;
						
								
							
							@include m() {
								display: none;
							}
						}

					}
					.sub {
						@include m() {
							width: 75%;
							display: flex;
							align-items: center;
						}
						li {
							@include s() {
								height: 0;
								overflow: hidden;
								transition: all 0.5s;
							}
							@include m() {
								width: 33.3333333%;
								text-align: left;
							}
							a {
								@include s() {
									display: block;
									line-height: $footer_box_height;
									color: $main_color;
									background-color:$second_color;
									text-align: center;
								}
								@include m() {
									display: inline-block;
									width: 160px;
									line-height: 60px;
									margin: auto;
									color: $main-color;
									text-align: center;
									&:hover {
										background-color: $main_color;
										color: $third_color;
										font-weight: 600;
									}
								}
							}
						}
					}
				}
			}
		}
		.copyright {
			display: flex;
			align-items: center;
			background-color: $text_color;
			height: fit-content;
			@include s() {
				
				box-sizing: border-box;
			}
			@include m() {

				box-sizing: border-box;
			}
			p {
				padding: 10px 20px;
				font-size: 12px;
				max-width: 1200px;
				margin: auto;
				text-align: center;
				font-family: $four_font;
				line-height: 16px;
				color: $third_color;
			}
		}
	}
</style>
