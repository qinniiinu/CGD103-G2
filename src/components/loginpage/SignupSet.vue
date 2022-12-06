<template>
  <div class="wrapper">
    <div class="form_wrapper bodyset">
      <form class="bodyset_form" action="">
        <div class="title">
          <h2>註冊</h2>
          <bg-tag class="bg_tag" Bgtag="SIGNUP"></bg-tag>
        </div>

        <!-- 性別/身高體重/鞋碼 -->
        <div class="item">
          <!-- 性別 -->
          <div class="sex">
            <button
              type="button"
              class="btn_l"
              @click="myFilter"
              :class="{ active: isActive === false }"
            >
              男
            </button>
            <button
              type="button"
              class="btn_l"
              @click="myFilter"
              :class="{ active: isActive }"
            >
              女
            </button>
          </div>
          <!-- 身高體重/鞋碼  -->
          <div class="my_body">
            <div class="input_group">
              <input v-model="member.height" type="text" required />
              <label for="">身高 cm</label>
            </div>
            <div class="input_group">
              <input v-model="member.weight" type="text" required />
              <label for="">體重 kg</label>
            </div>
            <div class="input_group">
              <input type="text" v-model="member.shoesize" required />
              <label for="">鞋碼 cm</label>
            </div>
          </div>
        </div>

        <!-- 其他數據 range bar -->
        <div class="item">
          <div class="rage_group">
            <span>肩寬</span>
            <span class="value">{{ member.shoulder }}</span>
            <span>cm</span>
            <input
              v-model="member.shoulder"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>胸圍</span>
            <span class="value">{{ member.chest }}</span>
            <span>cm</span>
            <input
              v-model="member.chest"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>腰圍</span>
            <span class="value">{{ member.waistline }}</span>
            <span>cm</span>
            <input
              v-model="member.waistline"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>臀圍</span>
            <span class="value">{{ member.hip }}</span>
            <span>cm</span>
            <input
              v-model="member.hip"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>衣長</span>
            <span class="value">{{ member.clothes }}</span>
            <span>cm</span>
            <input
              v-model="member.clothes"
              type="range"
              min="1"
              max="100"
              class="slider"
            />
          </div>
          <div class="rage_group">
            <span>褲長</span>
            <span class="value">{{ member.pants }}</span>
            <span>cm</span>
            <input
              v-model="member.pants"
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
        <router-link to="/BodyType"><button type="submit" class="btn_s">註冊</button></router-link>
      </form>
    </div>
  </div>
</template> 


<script>
import BgTag from "@/components/mypage/BgTag.vue";
export default {
  name: "SignupSet",
  props: {},
  components: {
	BgTag,
  },
  data() {
    return {
      member: {
        sex: {},
        height: "", //身高
        weight: "", //體重
        shoesize: "", //鞋碼
        shoulder: "", //肩寬
        chest: "", // 胸圍
        waistline: "", // 腰圍
        hip: "", //臀圍
        clothes: "", // 衣長
        pants: "", //褲長
      },
      isActive: false,
    };
  },
  methods: {
    myFilter: function () {
      this.isActive = !this.isActive;
    },
  },
};
</script>


<style lang="scss" scoped>
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
            .active {
              background-color: $main-color;
              color: white;
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
              margin: auto;
            }
            input {
              margin-top: 5px;
              width: 100%;
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

@include s() {
  //  //只在手機版
}
@include m() {
  // 768~
}
@include xl() {
  // 1200~
}
</style>
