<template>
  <div class="wrapper">
    <div class="form_wrapper sign_in">
      <form class="login_form" action="">
        <div class="title">
          <h2>登入</h2>
          <bg-tag class="bg_tag" Bgtag="SIGNIN"></bg-tag>
        </div>

        <div class="input_group">
          <input type="text" required />
          <label for="">Username</label>
        </div>
        <div class="input_group">
          <input type="password" required />
          <label for="">Password</label>
        </div>
        <div class="remember">
          <label><input type="checkbox" />記住我</label>
          <a class="forget_psw" href="#">忘記密碼?</a>
        </div>
        <button type="submit" class="btn_s">登入</button>
        <div class="social_plarform">
          <p>or</p>
          <div class="social_icons">
            <a href="#">google 登入</a>
            <a href="#">line 登入</a>
          </div>
        </div>
        <div class="signup">
          <a href="#" class="signup_link">註冊新帳號</a>
        </div>
      </form>
    </div>
  </div>
</template> 

<script>
import BgTag from "@/components/mypage/BgTag.vue";
export default {
  name: "SigninIn",
  props: {},
  components: {
    BgTag,
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
          .signup_link {
            display: block;
            font-size: 14px;
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
