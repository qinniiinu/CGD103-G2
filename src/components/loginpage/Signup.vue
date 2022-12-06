<template>
  <!--註冊-->
  <div class="signup_wrapper wrapper">
    <div class="form_wrapper sign_up">
      <form class="login_form" action="">
        <div class="title">
          <h2>註冊</h2>
          <bg-tag class="bg_tag" Bgtag="SIGNUP"></bg-tag>
        </div>

        <div class="input_group">
          <input type="email" required />
          <label for="">電子郵件</label>
        </div>
        <div class="input_group">
          <input type="password" required />
          <label for="">密碼</label>
        </div>
        <div class="input_group">
          <input type="password" required />
          <label for="">密碼確認</label>
        </div>
        <div class="input_group">
          <input type="text" required />
          <label for="">姓名</label>
        </div>
        <div class="birth">
          <div class="input_group">
            <input type="number" min="1" max="12" required />
            <label for="">月</label>
          </div>
          <div class="input_group">
            <input type="number" min="1" max="31"  required />
            <label for="">日</label>
          </div>
          <div class="input_group">
            <input type="number" required />
            <label for="">年</label>
          </div>
        </div>
        <div class="remember">
          <label><input type="checkbox" />我已閱讀並同意會員約定條款說明</label>
        </div>
        <button type="submit" class="btn_s">下一步</button>
        <div class="signup">
          <p>
            已有帳號，
            <a href="#" class="signup_link" @click="ToSignin">前往登入</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</template> 



<script>
import BgTag from "@/components/mypage/BgTag.vue";
export default {
  name: "Signup",
  props: {},
  components: {
    BgTag,
  },
  data() {
    return {
      Signup:true
    };
  },
  methods: {
    ToSignin() {
      Signup = false;
    },
  },
};
</script>


<style lang="scss" scoped>
body {
  //   background-color: $bg_gray;
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
        width: 28%;
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

    @include s() {
      //  //只在手機版
    }
    @include m() {
      // 768~
    }
    @include xl() {
      // 1200~
    }
  }
}
</style>
