<template>
  <div class="wrapper">
    <div class="form_wrapper sign_in">
      <form class="login_form" action="">
        <h2>登入</h2>
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
          <a href="#">忘記密碼?</a>
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
export default {
  name: "SigninIn",
  props: {},
};
</script>


<style lang="scss" scoped>
body {
  background-color: $bg_gray;
  .wrapper {
    display: flex;
    justify-content: center;
    margin: auto;
    padding: 30px 0;
    background-color: $bg_gray;
    .form_wrapper {
      max-width: fit-content;
      border: 1px solid black;
      padding: $padding;
      background-color: white;
      .login_form {
        h2 {
          font-size: 30px;
          font-weight: 700;
        }
        .input_group {
          position: relative;
          margin: 30px 0;
          border-bottom: 2px solid;
          input {
            width: 100%;
            height: 40px;
            font-size: 16px;
            color: #333;
            padding: 0 5px;
            border: none;
            outline: none;
            &:focus~label{
                color: $main_color ;
                top:-5px;
            }
            &:valid~label{
                color: $main_color;
                top:-5px;
            }
          }
          label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
            color: gray;
          }
        }
        .remember {
            display: flex;
            justify-content: space-between;
            margin: 0 0 15px 5px;
          label {
            font-size: 14px;
          }
          input {
            accent-color: $main_color ;
          }
        }
        .btn_s {
            position: relative;
            width: 100%;
            height: 40px;
            font-size: 16px;
            line-height: 5px;
        }
        // .social_plarform {
        //   p {
        //   }
        //   .social_icons {
        //     a {
        //     }
        //   }
        // }
        // .signup {
        //   .signup_link {
        //   }
        // }
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
