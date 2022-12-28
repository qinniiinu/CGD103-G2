<template>
	<p class="title">個人資訊</p>
	<div class="data">
		<!-- 這裡開始寫 -->
		<div class="wrap">
			<section class="maintain">
				<div class="img_box">
					<div class="mempic">
						<img src="https://picsum.photos/300/200/?random=10">
						<!-- <img :src="member.mem_pic" :alt="member.mem_name"> -->
						<button v-if="update" class="btn_s">更換頭貼</button>
					</div>
				</div>
				<div class="form_box">
					<div class="input_group">
						<input type="text" v-model="member.mem_name" required :disabled="!update"/>
						<label for="">姓名</label>
					</div>
					<div class="input_group">
						<input type="tel" v-model="member.phone" maxlength="10" required :disabled="!update"/>
						<label for="">行動電話</label>
					</div>
					<div class="birthday">
						<div class="input_group">
							<input type="number" min="1" max="12" v-model="member.bday_m" required :disabled="!update"/>
							<label for="">月</label>
						</div>
						<div class="input_group">
							<input type="number" min="1" max="31"  v-model="member.bday_d" required :disabled="!update"/>
							<label for="">日</label>
						</div>
						<div class="input_group">
							<input type="number" min="1900" max="2022" v-model="member.bday_y" required :disabled="!update"/>
							<label for="">年</label>
						</div>
					</div>
					<div class="password">
						<div class="input_group">
							<input type="password"  v-model="member.mem_pwd" required :disabled="!update"/>
							<label for="">密碼</label>
						</div>
						<button v-if="update" class="btn_s">修改密碼</button>
					</div>
					<div class="input_group">
						<input type="mail" v-model="member.mem_mail" required :disabled="!update"/>
						<label for="">電子郵件</label>
					</div>
					<div class="input_group">
						<input type="text" v-model="member.address" required :disabled="!update"/>
						<label for="">聯絡地址</label>
					</div>
				</div>
				<div class="deco">
					<div class="btn_box">
						<router-link :to="{ name:'MyPage'}"><button class="btn_nl">返回</button></router-link>
						<button v-if="update" class="btn_ns" @click="save">儲存</button>
						<button v-else class="btn_ns" @click="Ifupdate">修改</button>
					</div>
					<div class="decoration">#ACCOUNT</div>
				</div>
			</section>
		</div>
	</div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
export default {
	name: "MemMaintainView",
	components: {
	},
	data() {
		return {
			member:{
				mem_name:"",
				mem_mail:"",
				phone:"",
				address:"",
				
				bday:"",
				bday_m: "",
				bday_d: "",
				bday_y: "",

				mem_pwd:"",
				mem_pic:"",				
			},
			update:false,
		}
	},
	mounted(){
		this.getResource();
	},
	methods: {
		combineDate() {
			const year = this.member.bday_y;
			const month = this.member.bday_m;
			const day = this.member.bday_d;
			const bday = `${year}-${month}-${day}`;
			return bday;
        },
		Ifupdate(){
			this.update=!this.update;
		},
       
		save(){ //確定更改資訊
			this.update=!this.update;
            let formData = new FormData();
            formData.append("mem_name", this.member.mem_name);
			formData.append("mem_mail", this.member.mem_mail);
            formData.append("phone", this.member.phone);
            formData.append("address", this.member.address);
            formData.append("bday", this.combineDate());

			// 會員照片
            // formData.append("mem_pic", this.member.mem_pic);
			// 更改密碼
			// formData.append("mem_pwd", this.member.mem_pwd);

			this.axios.post(`${BASE_URL}/update_member.php`,formData,{credentials: 'include'})
			.then(res => {
				res.data;
				this.getResource();
			})
			.catch(error =>console.log(error));
		},
		getResource() {
			this.axios.get(`${BASE_URL}/memberInfo.php`,{credentials: 'include'})
			// this.axios.get('/api_server/memberInfo.php')
			.then(res => {
				this.member = res.data;
				let date = new Date(res.data.bday);
				this.member.bday_m = date.getMonth();
				this.member.bday_d = date.getDate();
				this.member.bday_y = date.getFullYear();
			})
			.catch(error =>console.log(error));
			console.log(this.member);
		}
	}
}
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
			width: 110px;
			height: 110px;
			background-color: $bg_gray;
			border-radius: 50%;
			overflow: visible;
			margin: 0 auto;
			position: relative;
			img{
				width: 100%;
				height: 100%;
				border-radius: 50%;
			}
			.btn_s{
				position: absolute;
				height: 35px;
				width: 100%;
				bottom: -20px;
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

			.btn_nl {
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
			// .mempic {
				
			// }
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

					// &::after {
					// 	left: 20%;
					// 	height: 20px;
					// 	width: 40%;
					// }
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
					position: relative;

					.input_group {
						width: 70%;
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
						.btn_nl {
							// 返回
							margin-left: 0;
							// display: block;
							display: inline-block;
							margin-right: 10px;
						}

						.btn_ns {
							//儲存
							display: inline-block;
						}
					}
			}
		}

	}

}
</style>
