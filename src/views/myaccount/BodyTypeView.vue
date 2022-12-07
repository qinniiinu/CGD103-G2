<template>
  <!-- 會員 container -->
  <div class="mem_container">
    <!-- 側邊欄組件 -->
    <MemberSideMenu></MemberSideMenu>
    <!-- 右側會員資料-->
    <div class="mem_data">
      <p class="title">我的身型</p>
      <div class="data">
        <!-- 這裡開始寫 -->
        <div class="wrap">
          <section class="body_tyle">
            <div class="item">
              <p>屬於:</p>
              <h2>#沙漏型</h2>
            </div>
            <div class="item">
              <img src="bodyType_hourglass.png" alt="文青" />
            </div>
            <div class="item">
              <p>{{ body.body_descrip }}</p>
            </div>
            <!-- 性別/身高體重/鞋碼 -->
            <div class="item">
              <div class="sex">
                <button
                  class="btn_l"
                  @click="myFilter"
                  :class="{ active: isActive === false }"
                >
                  男
                </button>
                <button
                  class="btn_l"
                  @click="myFilter"
                  :class="{ active: isActive }"
                >
                  女
                </button>
              </div>
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
            <!-- 其他數據 rage bar -->
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
            <div class="item">
              <router-link to="/MyPage" class="btn_l back">返回</router-link>
              <router-link to="/MyPage" class="btn_s save">儲存</router-link>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import MemberSideMenu from "@/components/MemberSideMenu.vue";
import TypeTag from "@/components/mypage/TypeTag.vue";
export default {
  name: "BodyType",
  components: {
    MemberSideMenu,
    TypeTag,
  },
  methods: {
    myFilter: function () {
      this.isActive = !this.isActive;
    },
  },
  data() {
    return {
      member: {
        sex: { 0: "女" },
        height: 170, //身高
        weight: 60, //體重
        shoesize: 40, //鞋碼
        shoulder: 37, //肩寬
        chest: 40, // 胸圍
        waistline: 70, // 腰圍
        hip: 90, //臀圍
        clothes: 65, // 衣長
        pants: 90, //褲長
      },
      body: {
        body_id: "1",
        body_shape: "沙漏型",
        body_pic: "hipster2.png",
        body_descrip:
          "沙漏型身材是俗稱的完美身材，所以在穿搭上可以選擇可以凸顯自己凹凸有致的身材的單品。直筒寬鬆款都是雷區哦，上身後曲線全無。擁有彈性的針織背心連衣裙就是很好的選擇，完美凸顯身材",
      },

      isActive: false,
    };
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
.body_tyle {
  @include m() {
    border: 1px solid #333;
    padding: 20px 25px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: auto;
    grid-gap: 50px 50px;
    background-color: white;
  }
  .item:nth-child(1) {
    padding: 20px 0;
    h2 {
      font-size: 32px;
      font-weight: 600;
      text-align: center;
      @include m() {
        font-size: 48px;
        text-align: left;
        margin: 20px 0 0 70px;
      }
    }
    p {
      display: none;
      @include m() {
        display: block;
        font-size: 20px;
        color: #333;
      }
    }
    @include m() {
      grid-area: 1/1/3/3;
    }
  }
  .item:nth-child(2) {
    //image
    position: relative;
    margin: auto;
    width: 250px;
    height: 250px;
    img {
      width: 100%;
      height: 100%;
      vertical-align: middle;
      object-fit: cover;
    }
    @include m() {
      grid-area: 1/4/3/5;
    }
  }
  .item:nth-child(3) {
    // 身形描述
    display: none;
    @include m() {
      display: block;
    }
    p {
      color: $text_color;
      line-height: 27px;
      font-size: 16px;
    }
    @include m() {
      grid-area: 2/1/3/4;
    }
  }
  //  性別/身高體重/鞋碼
  .item:nth-child(4) {
    margin-top: 20px;
    .sex {
      display: flex;
      justify-content: space-between;
      .active {
        background-color: $main-color;
        color: white;
      }
    }
    @include m() {
      grid-area: 3/1/5/3;
    }
  }
  //  其他數據 rage bar
  .item:nth-child(5) {
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
    @include m() {
      grid-area: 3/3/5/5;
    }
  }
  .item:nth-child(6) {
    //按鈕
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    .btn_s {
      margin-inline: 20px;
      text-align: center;
      vertical-align: middle;
    }
    @include m() {
      grid-area: 5/3/6/5;
    }
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
</style>
