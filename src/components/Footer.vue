<template>
	<div>
		<footer>
			<ul class="main">
				<div class="main_list_outside">
					<li class="main_list">
						<div class="main_list_box" tabindex="0">
							<p class="bg_tag">#STYLE</p>
							<p class="name">找風格</p>
							<div class="icon">我是icon</div>
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
							<div class="icon">我是icon</div>
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
							<p class="name">風格動態牆</p>
							<div class="icon">我是icon</div>
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
							<p class="name">訂閱服務</p>
							<div class="icon">我是icon</div>
						</div>
						<ul class="sub">
							<li><a href="#">服務選擇</a></li>
							<li><a href="#">服務說明</a></li>
						</ul>
					</li>
				</div>
				<div class="main_list_outside">
					<li class="main_list">
						<div class="main_list_box" tabindex="0">
							<p class="bg_tag">#ABOUT</p>
							<p class="name">關於我們</p>
							<div class="icon">我是icon</div>
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
					Lorem ipsum dolor, sit amet consectetur adipisicing elit.
					Quae sed nemo inventore omnis, aspernatur placeat
					exercitationem voluptates ex blanditiis repellat in, totam,
					delectus tenetur. Magni dolores exercitationem placeat
					quaerat sit.
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
			border-bottom: $line solid $main-color;
			.main_list_outside {
				width: 100%;
				& + * {
					border-top: $line solid $main-color;
				}
				.main_list {
					max-width: $max_width;
					width: 100%;
					margin: auto;
					@include m() {
						display: flex;
					}
					.bg_tag {
						position: absolute;
						z-index: -1;
						color: $bg_violet;
						@include font_set($second_font, $null, 900, italic);
						@include s() {
							font-size: 56px;
						}
						@include m() {
							font-size: 96px;
						}
					}

					.main_list_box {
						display: flex;
						justify-content: space-between;
						align-items: center;
						height: ($footer_box_height - $line * 2);
						padding: 10px;
						box-sizing: border-box;
						outline: 1px solid red;

						@include m() {
							width: 25%;
						}

						&:focus + .sub > li {
							@include s() {
								height: $footer_box_height;
								transition: all 0.5s;
							}
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
									color: $third_color;
									background-color: $main_color;
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
			background-color: $main_color;

			@include s() {
				height: 110px;
				box-sizing: border-box;
			}
			@include m() {
				height: 110px;
				box-sizing: border-box;
			}
			p {
				@include s() {
					font-size: 14px;
				}
				@include s() {
					font-size: 16px;
				}

				max-width: 1200px;
				margin: auto;
				text-align: center;
				font-family: $four_font;
				line-height: 24px;
				color: $third_color;
			}
		}
	}
</style>
