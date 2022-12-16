<template>
	<p class="title">帳號資訊</p>
	<div class="data">
		<!-- 這裡開始寫 -->
		<div class="wrap">
			<section class="maintain">
				<div class="img_box">
					<div class="mempic"></div>
				</div>
				<div class="form_box">
					<div class="input_group">
						<input type="text" disabled v-model="mem_name" required/>
						<label for="">姓名</label>
					</div>
					<div class="input_group">
						<input type="tel" v-model="phone" required />
						<label for="">行動電話</label>
					</div>
					<div class="birthday">
						<div class="input_group">
							<input type="number" v-model="birthday[1].m" required />
							<label for="">月</label>
						</div>
						<div class="input_group">
							<input type="number" v-model="birthday[2].d" required />
							<label for="">日</label>
						</div>
						<div class="input_group">
							<input type="number" v-model="birthday[0].y" required />
							<label for="">年</label>
						</div>
					</div>
					<div class="password">
						<div class="input_group">
							<input type="password" v-model="mem_pwd" required />
							<label for="">密碼</label>
						</div>
						<button class="btn_s">修改密碼</button>
					</div>
					<div class="input_group">
						<input type="mail" v-model="mem_mail" required />
						<label for="">電子郵件</label>
					</div>
					<div class="input_group">
						<input type="text" v-model="address" required />
						<label for="">聯絡地址</label>
					</div>
				</div>
				<div class="deco">
					<div class="btn_box">
						<router-link :to="{ name:'MyPage'}"><button class="btn_l">返回</button></router-link>
						<button class="btn_s">儲存</button>
					</div>
					<div class="decoration">#ACCOUNT</div>
				</div>
			</section>

		</div>
	</div>
</template>

<script>
export default {
	name: "MemQuiz",
	components: {
	},
	data() {
		return {
			memId:"a001",
			mem_name:"王小明",
			phone:"0912345678",
			birthday: [
            {
              y: 1999,
            },
            {
              m: 1,
            },
            {
              d: 1,
            },
          ],
			mem_pwd:"00000000",
			mem_mail:"11111@gmail.com",
			address:"320桃園市中壢區復興路46號9樓",
		}
	},
	created() {

	},
	computed: {

	},
	methods: {
	}
};
</script>

<style lang="scss" scoped>
.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}
.wrap {
	.maintain {
		.mempic {
			width: 50px;
			height: 50px;
			background-color: $bg_gray;
			border-radius: 50%;
			margin: 0 auto;
			position: relative;

			&::after {
				content: "";
				position: absolute;
				height: 10px;
				width: 50%;
				background-color: $main_color;
				bottom: -3px;
				left: 50%;
				transform: translateX(-50%);
			}
		}

		.input_group {
			position: relative;
			margin-block-start: 35px;
			border-bottom: 2px solid;

			input {
				width: 100%;
				height: 40px;
				font-size: 16px;
				color: #333;
				padding: 0 5px;
				border: none;
				outline: none;

				&:focus~label {
					color: $main_color;
					top: -5px;
				}

				&:valid~label {
					color: $main_color;
					top: -5px;
				}
				&:disabled~label {
					color: $main_color;
					top: -5px;
				}
			}

			label {
				position: absolute;
				top: 50%;
				left: 5px;
				transform: translateY(-50%);
				font-size: 16px;
				pointer-events: none;
				transition: 0.5s;
				color: gray;
			}
		}

		.birthday {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;

			.input_group:nth-child(1) {
				//月
				width: 45%;

			}

			.input_group:nth-child(2) {
				//日
				width: 45%;
			}

			.input_group:nth-child(3) {
				//年
				width: 100%;
			}
		}

		.password {
			button {
				margin-top: 10px;
				margin-left: auto;
				display: block;
			}
		}

		.deco {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: flex-end;

			.decoration {
				display: none;
			}

			button {
				margin-top: 10px;
			}

			.btn_l {
				margin-right: 10px;
			}
		}
	}


}
@media screen and (min-width:768px) {
	.wrap{
		background-color: #fff;
		border: 1px solid $title_color;
		padding: 20px;
	}
}
@media screen and (min-width:1024px) {
	* {
		box-sizing: border-box;
	}

	.wrap {
		background-color: #fff;
		padding: 20px;
		border: 1px solid $title_color;

		.maintain {
			.mempic {
				background-color: #fff;
			}
			.input_group {
				border: 1px solid $bg_gray;
			}

			display: flex;
			flex-wrap: wrap;

			.img_box {
				padding-top: 10%;
				width: 40%;

				div {
					width: 150px;
					height: 150px;
					background-color: $bg_gray;

					&::after {
						left: 20%;
						height: 20px;
						width: 40%;
					}
				}
			}

			.form_box {
				width: 60%;
				order: -1;

				.birthday {
					.input_group:nth-child(1) {
						width: 30%; //月
					}

					.input_group:nth-child(2) {
						width: 30%; //日
					}

					.input_group:nth-child(3) {
						width: 30%; //年
					}
				}

				.password {
					display: flex;
					flex-wrap: wrap;
					justify-content: space-between;
					// align-items: center;
					// border: 1px solid red;
					position: relative;

					.input_group {
						width: 70%;
						// border: 1px solid red;
					}

					button {
						width: 25%;
						line-height: 30px;
						height: 40px;
						position: absolute;
						bottom: 0;
						right: 0;
					}
				}
			}

			.deco {
				width: 100%;
				display: flex;
				justify-content: space-between;
				.decoration {
					display: inline-block;
					font-size: 72px;
					font-weight: bolder;
					font-style: italic;
					color: $secondary;
					order: -1;
				}
				.btn_box {
						width: fit-content;
						.btn_l {
							// 返回
							margin-left: 0;
							// display: block;
							display: inline-block;
							margin-right: 10px;
						}

						.btn_s {
							//儲存
							display: inline-block;
						}
					}
			}
		}

	}

}
</style>
