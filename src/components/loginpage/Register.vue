<template>
  <!--註冊-->
  <div v-if="goType === false" class="signup_wrapper wrapper">
    <div class="form_wrapper sign_up">
      <form class="login_form" action="">
        <div class="title">
          <h2>註冊</h2>
          <BgTag class="bg_tag" Bgtag="SIGNUP"></BgTag>
        </div>
        <div class="input_group">
          <input type="text" v-model="mem_mail" maxlength="20" @blur="validateEmail" required />
          <label for="">電子郵件</label>
        </div>
        <div v-if="emailExists" class="emailExists">此帳號已註冊</div>
        <div v-if="emailUnForm" class="emailUnForm">Email 格式不正確</div>
        <div class="input_group">
          <input
						maxlength="10"
            type="password"
            placeholder="密碼須包含英文與數字"
            v-model="mem_pwd"
            required
          />
          <label for="" class="psw">密碼</label>
        </div>
        <div class="input_group">
          <input type="password" maxlength="10" v-model="psd_confirm" required />
          <label for="">密碼確認</label>
        </div>
        <div class="input_group">
          <input type="text" maxlength="10" v-model="mem_name" required />
          <label for="">姓名</label>
        </div>
        <div class="birth">
          <div class="input_group">
            <input type="number" min="1" max="12" v-model="bday_m" required />
            <label for="">月</label>
          </div>
          <div class="input_group">
            <input type="number" min="1" max="31" v-model="bday_d" required />
            <label for="">日</label>
          </div>
          <div class="input_group">
            <input
              type="number"
              min="1900"
              max="2022"
              v-model="bday_y"
              required
            />
            <label for="">年</label>
          </div>
        </div>
        <div class="remember">
					<input type="checkbox" id="agree" v-model="checked">
          <label for="agree">我已閱讀並同意會員約定條款說明</label>
        </div>
        <button type="submit" :disabled="notSubmit" class="btn_s" @click="gotype">下一步</button>

        <!-- 已有帳號 -->
        <div class="signup">
          <p>
            已有帳號，
            <router-link to="/login" href="#" class="signup_link"
              >前往登入</router-link
            >
          </p>
        </div>
      </form>
    </div>
  </div>

  <!-- 身形建置 -->
  <div v-else class="wrapper bodyTyping">
    <div class="form_wrapper bodyset">
      <form @submit.prevent="handleSubmit" class="bodyset_form" action="">
        <div class="title">
          <h2>註冊</h2>
          <bg-tag class="bg_tag" Bgtag="SIGNUP"></bg-tag>
        </div>

        <!-- 性別/身高體重/鞋碼 -->
        <div class="item">
          <!-- 性別 -->
          <div class="sex">
            <input type="radio" :value="1" v-model="sex" id="male" name="sex" />
            <label class="btn_nl" for="male"> 男 </label>
            <input type="radio" :value="0" v-model="sex" id="female" name="sex"/>
            <label class="btn_nl" for="female"> 女 </label>
          </div>
          <!-- 身高體重/鞋碼  -->
          <div class="my_body">
            <div class="input_group">
              <input v-model="height" type="text" required />
              <label for="">身高 cm</label>
            </div>
            <div class="input_group">
              <input v-model="weight" type="text" required />
              <label for="">體重 kg</label>
            </div>
            <div class="input_group">
              <input type="text" v-model="shoesize" required />
              <label for="">鞋碼 cm</label>
            </div>
          </div>
        </div>

        <!-- 其他數據 range bar -->
        <div class="item">
          <div class="rage_group">
            <span>肩寬</span>
            <span class="value">{{ shoulder }}</span>
            <span>cm</span>
            <input
              v-model="shoulder"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>胸圍</span>
            <span class="value">{{ chest }}</span>
            <span>cm</span>
            <input
              v-model="chest"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>腰圍</span>
            <span class="value">{{ waistline }}</span>
            <span>cm</span>
            <input
              v-model="waistline"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>臀圍</span>
            <span class="value">{{ hip }}</span>
            <span>cm</span>
            <input
              v-model="hip"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>衣長</span>
            <span class="value">{{ clothes }}</span>
            <span>cm</span>
            <input
              v-model="clothes"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>褲長</span>
            <span class="value">{{ pants }}</span>
            <span>cm</span>
            <input
              v-model="pants"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
        </div>

        <div class="remember">
          <label
            ><input
              type="checkbox"
            />我同意本網站的隱私權政策，並同意Urstyle收集及使用我的個人資料以處理訂單。</label
          >
        </div>
        <button type="submit" class="btn_s">註冊</button>
      </form>
    </div>
  </div>
</template> 

<script>
import BgTag from "@/components/mypage/BgTag.vue";
export default {
  name: "Register",
  props: {},
  components: {
    BgTag,
  },
  data() {
    return {
      // 註冊
      mem_mail: "",
      mem_pwd: "",
      psd_confirm: "",
      mem_name: "",
      bday_m: "",
      bday_d: "",
      bday_y: "",
      // 身形建置
      sex: "",
      height: "", //身高
      weight: "", //體重
      shoesize: "", //鞋碼
      shoulder: "", //肩寬
      chest: "", // 胸圍
      waistline: "", // 腰圍
      hip: "", //臀圍
      clothes: "", // 衣長
      pants: "", //褲長
      goType: false, // 切換註冊 / 身形建置
      emailExists: false, // email 是否已註冊
      emailUnForm: false, // emamil 格式
      notSubmit: false,
			checked: false,
    };
  },
  methods: {
    // 合併日期
    combineDate() {
      const year = this.bday_y;
      const month = this.bday_m;
      const day = this.bday_d;
      const bday = `${year}-${month}-${day}`;
      return bday;
    },
    // 送出登入表單
    handleSubmit() {
      let formData = new FormData();
      formData.append("mem_mail", this.mem_mail);
      formData.append("mem_pwd", this.mem_pwd);
      formData.append("mem_name", this.mem_name);
      formData.append("bday", this.combineDate());
      // 身形
      formData.append("sex", this.sex);
      formData.append("height", this.height);
      formData.append("weight", this.weight);
      formData.append("shoesize", this.shoesize);
      formData.append("shoulder", this.shoulder);
      formData.append("chest", this.chest);
      formData.append("waistline", this.waistline);
      formData.append("hip", this.hip);
      formData.append("clothes", this.clothes);
      formData.append("pants", this.pants);
      formData.append("chest", this.chest);
      formData.append("action", "register");

      fetch("/api_server/register.php", {
        method: "post",
        body: formData,
      })
        .then((response) => {
          return response.json();
        })
        .then((data) =>{
					// console.log(data)
					if (data.msg) { //註冊成功
						alert(data.msg);
            this.$router.push({path:'/MyPage'});
					}else {
            alert(data.msg);
          }
				})
        .catch((error) => console.log(error));
    },
		// email 格式不正確，出現div ，且無法送出
    IfemailUnForm(){
				this.emailUnForm = true;
				this.notSubmit = true;
		},
			// 帳號已註冊，出現 div，且無法送出
		IfemailExists() {
				this.emailExists = true; 
				this.notSubmit = true;
		},
    // 檢查 email 格式，並檢查是否已註冊
    validateEmail(){
			let EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
      // 檢查 eamil 格式
      if (EMAIL_REGEX.test(this.mem_mail)) { // 電子郵件格式正確
        this.emailUnForm = false;
        this.notSubmit = true;
        //檢查是否已註冊過
        let formData = new FormData();
        formData.append("mem_mail", this.mem_mail);
        formData.append("action", "check_email");
        fetch("/api_server/register.php",{
          method:"post",
          body:formData
        })
          .then((response) => {
            return response.json();
          })
          .then((data) =>{ 
            // console.log(data)
            if (data.errMsg) { //此帳號已註冊
              this.IfemailExists();
            }
						else{
							this.emailExists = false; 
							this.notSubmit = false;
						}
          })
          .catch((error) => console.log(error));
      } else { // 電子郵件格式不正確    
        this.IfemailUnForm();
      }
    },
    // 前往身形建置
    gotype() {
			if (!this.mem_mail || !this.mem_pwd || !this.psd_confirm || !this.mem_name || !this.bday_m ||
      !this.bday_d || !this.bday_y || !this.checked){
        alert("表單缺少必填欄位");
        return;
			}
      this.goType = true;
    },
  },
};


// let month = 1
// switch(month){
// 	case 1:
// 	case 3:
// 	case 5:
// 	case 7:
// 	case 8:
// 	case 10:
// 	case 12:
// 		days = 31
// 		break
// 	case 4:
// 	case 6:
// 	case 9:
// 	case 11:
// 		days = 30
// 	default: 
// 		days = 28 // 或 days = 29 (西元年可以被 4 整除)
// }
</script>

<style lang="scss" scoped>
// 會員註冊
body {
	.emailExists{ // 警示帳號存在
          color: red;
        }
	.emailUnForm{ // 警示帳號格是不正確
		color: red;
	}
  .signup_wrapper {
    display: flex;
    justify-content: center;
    margin: auto;
    padding: 30px 0;
    background-color: $bg_gray;
    .form_wrapper {
      background-color: white;
      height: fit-content;
      @include s() {
        width: 100%;
        padding: 30px;
      }

      @include m() {
        border: 1px solid black;
        width: 30%;
        padding: 30px;
      }
      .login_form {
        position: relative;
        .title {
          margin-bottom: 40px;
          h2 {
            font-size: 35px;
            font-weight: 700;
          }
          .bg_tag {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 45px;
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
            &:focus ~ label {
              color: $main_color;
              top: -5px;
            }
            &:valid ~ label {
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
          .psw {
            color: rgba(255, 255, 255, 0);
          }
        }
        .birth {
          display: flex;
          gap: 15px;
          .input_group {
            position: relative;
            margin-block-start: 35px;
            border-bottom: 2px solid;
            &:nth-child(1) {
              flex: 1;
            }
            &:nth-child(2) {
              flex: 1;
            }
            &:nth-child(3) {
              flex: 2;
            }
            input {
              width: 100%;
              height: 40px;
              font-size: 16px;
              color: #333;
              padding: 0 5px;
              border: none;
              outline: none;
              &:focus ~ label {
                color: $main_color;
                top: 0px;
              }
              &:valid ~ label {
                color: $main_color;
                top: 0px;
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
        }
        .remember {
          display: flex;
          align-items: center;
          margin: 10px 0 15px 0;
          font-size: 14px;
          label {
            font-size: 14px;
          }
          input {
						margin-inline-end: 5px;
            accent-color: $main_color;
          }
          .forget_psw {
            font-size: 14px;
          }
        }
        .btn_s {
          position: relative;
          width: 100%;
          height: 40px;
          font-size: 16px;
          line-height: 5px;
          margin-bottom: 20px;
          cursor: pointer;
        }
        .social_plarform {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          text-align: center;
          width: 100%;
          p {
            font-size: 12px;
            color: gray;
          }
          .social_icons {
            font-size: 16px;
            a {
              padding: 14px;
              margin-block: 20px;
              display: block;
              border: 1px solid gray;
            }
          }
        }
        .signup {
          width: 100%;
          text-align: center;
          font-size: 14px;
          color: #333;
          .signup_link {
            // display: block;
            font-size: 14px;
            color: $main_color;
          }
        }
      }
    }
  }
}

// 身形建置
.wrapper {
  display: flex;
  justify-content: center;
  margin: auto;
  padding: 30px 0;
  background-color: $bg_gray;
  .form_wrapper {
    background-color: white;
    height: fit-content;
    @include s() {
      width: 100%;
      padding: 30px;
    }

    @include m() {
      border: 1px solid black;
      width: 30%;
      padding: 30px;
    }
    .bodyset_form {
      position: relative;
      .title {
        margin-bottom: 40px;
        h2 {
          font-size: 35px;
          font-weight: 700;
        }
        .bg_tag {
          position: absolute;
          top: 0;
          right: 0;
          font-size: 45px;
        }
      }
      //  性別/身高體重/鞋碼
      .item {
        &:nth-child(2) {
          margin-top: 20px;
          .sex {
            display: flex;
            justify-content: space-between;
            input {
              display: none;
              &:checked + label {
                background-color: $main-color;
                color: white;
              }
            }
            .btn_nl {
              padding: 15px 50px;
              @include xl() {
                padding: 15px 70px;
              }
            }
          }
          .my_body {
            // input group css
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
                &:focus ~ label {
                  color: $main_color;
                  top: -5px;
                }
                &:valid ~ label {
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
          }
        }
        // 其他數據
        &:nth-child(3) {
          display: flex;
          flex-direction: column;
          margin-top: 20px;
          .rage_group {
            margin-block: 15px;
            span {
              margin-inline: 3px;
            }
            input {
              margin-top: 10px;
              width: 100%;
            }
            input[type="range"] {
              -webkit-appearance: none;
              width: 100%;
              height: 10px;
              background-color: $second_color;
              border-radius: 5px;
              outline: none;
            }
            input[type="range"]::-webkit-slider-thumb {
              -webkit-appearance: none;
              width: 30px;
              height: 15px;
              background-color: $main_color;
              border-radius: 50px;
              box-shadow: 1px 2px #25319e;
              cursor: pointer;
            }
          }
        }
      }

      .remember {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px 0 15px 0;
        font-size: 14px;
        label {
          font-size: 14px;
        }
        input {
          accent-color: $main_color;
        }
        .forget_psw {
          font-size: 14px;
        }
      }
      .btn_s {
        position: relative;
        width: 100%;
        height: 40px;
        font-size: 16px;
        line-height: 5px;
        margin-bottom: 20px;
        color: white;
      }
    }
  }
}
</style>
