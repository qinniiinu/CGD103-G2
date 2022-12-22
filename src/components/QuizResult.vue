<template>
  <section v-if="count >= 0" class="loading"
    :style="{ backgroundImage: 'url(' + require('@/assets/loading_bg.png') + ')' }">
    <div class="item">
      <p>結果產生中</p>
      <p class="text-loading-width">Loading</p>
    </div>
  </section>
  <!-- 時間到出現結果 -->
  <div v-else>
    <section class="quiz_result">
      <div class="title_box">
        <p>你的測驗結果是</p>
        <h2>{{ result }}</h2>
      </div>
      <div class="wraper">
        <div class="img_box">
          <StyleCard1 :link="img1" />
          <StyleCard1 :link="img2" />
        </div>
        <div class="txt_box">
          <h3>適合您的穿搭公式</h3>
          <p>{{ desc }}</p>
          <Button content="記錄我的風格" />
        </div>
      </div>
    </section>
    <!-- 推薦 -->
    <!-- <h3 class="recommend">推薦商品</h3>
    <section class="recommend_box">
      <div v-for="e in product" class="item" :key="e.combo_pic" >
        <img :src="require(`@/assets/product/${e.combo_pic}`)" />
        <h4>{{ e.combo_name }}</h4>
      </div>
      <div v-for="e in product" class="item" :key="e.combo_pic" >
        <img :src="require(`@/assets/product/${e.combo_pic}`)" />
        <h4>{{ e.combo_name }}</h4>
      </div>
    </section> -->
    <!-- <section class="recommend_box">
      <div v-for="e in product" class="item" :key="e.combo_pic" >
        <img :src="require(`@/assets/product/${img_url}`)" />
        <h4>{{ e.combo_name }}</h4>
      </div>
      <div v-for="e in product" class="item" :key="e.combo_pic" >
        <img :src="require(`@/assets/product/${img_url}`)" />
        <h4>{{ e.combo_name }}</h4>
      </div>
    </section> -->

  </div>
</template>
<script>
import StyleCard1 from "@/components/StyleCard1.vue";
import Button from "@/components/Button.vue";
//引入BASE_URL參數
// import { BASE_URL } from '../assets/js/common.js'
export default {
  name: "QuizResult",
  components: {
    StyleCard1,
    Button,
  },
  props: {
    result: String,
    img1: String,
    img2: String,
    desc: String,

  },
  data() {
    return {
      // count: 3,
      count: -1,
      // product:[],
    }
  },
  methods: {
    // 倒數功能
    countDown() {
      // 執行一次，count減1
      this.count--
      // 每秒執行一次
      setTimeout(() => {
        this.countDown();
      }, 1000)
    },
    // getResource() {
    //   this.axios.get(`${BASE_URL}/quiz/style_recommend.php`).then((response) => {
    //             this.product = response.data;
    //             console.log(this.product);
    //         });
    // },
  },
  mounted() {
    // this.getResource();
    this.countDown();
  }


}
</script>
<style lang="scss" scoped>
* {
  box-sizing: border-box;
}

// loading
.loading {
  background-position: center;
  background-size: contain;
  width: 100%;
  min-height: 100vh;

  .item {
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    text-align: center;
    border: 1px solid $title_color;
    width: 80%;
    background-color: #fff;
    padding: 100px 30px;

    p {
      font-size: 38px;
      color: $title_color;
      font-weight: 600;
    }

    .text-loading-width {
      margin-top: 5px;
      font-family: $second_font;
    }

    .text-loading-width:after {
      content: "...";
      overflow: hidden;
      white-space: nowrap;
      display: inline-block;
      vertical-align: bottom;
      animation: text-loading-width 2s steps(2, start) infinite;
    }
  }
}

@keyframes text-loading-width {
  0% {
    width: .25em;
  }

  50% {
    width: .5em;
  }

  100% {
    width: .75em;
  }
}

@media screen and (min-width:768px) {
  .loading {
    background-size: cover;

    .item {
      width: 30%;
    }
  }
}

// 測驗結果
.quiz_result {
  .title_box {
    text-align: center;
    padding: 20px 0;

    p {
      font-size: 16px;
      margin-bottom: 5px;
      color: $title_color;
    }

    h2 {
      color: $title_color;
      font-weight: 600;
      font-size: 24px;
    }
  }
}

.wraper {
  width: 80%;
  position: relative;
  margin: 0 auto;

  .img_box {
    width: 100%;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;

    .item {
      // margin-left: -15px;
      width: 40%;
      height: fit-content;

      &:nth-child(2) {
        top: 30px;
      }
    }
  }

  .txt_box {
    padding: 40px 0;

    h3 {
      color: $title_color;
      margin-bottom: 10px;
      font-size: 16px;
      font-weight: 600;
    }

    p {
      font-size: 12px;
      color: $text_color;
      line-height: 20px;
    }
  }

  button {
    margin: 20px auto;
    display: block;
  }
}

h3 {
  margin-bottom: 20px;
}

.recommend_box {
  display: flex;
  flex-wrap: wrap;
  // flex-wrap: wrap;
  justify-content: space-between;
  padding: 10px;

  // border: 1px solid red;
  .item {
    width: 48%;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #000;

    img {
      width: 100%;
    }

    h4 {
      text-align: center;
      color: $text_color;
      padding: 10px;
    }
  }
}

// 768 - 1023
@media screen and (min-width:768px) {
  .quiz_result {
    margin-bottom: 100px;

    // margin-top: 50px;
    .title_box {
      text-align: center;
      padding: 20px 0;
      margin-bottom: 50px;

      p {
        display: inline-block;
        margin-right: 10px;
        font-size: 32px;
      }

      h2 {
        display: inline-block;
        font-size: 48px;
      }
    }

    .wraper {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;

      .img_box {
        width: 50%;

        .item {
          &:nth-child(1) {
            top: 0px;
          }

          &:nth-child(2) {
            top: 160px;
          }
        }
      }

      .txt_box {
        width: 40%;
        order: -1;

        button {
          margin-top: 30px;
        }

        h3 {
          font-size: 24px;
          font-weight: 600;
          margin-bottom: 20px;
        }

        p {
          font-size: 18px;
          line-height: 27px;
        }
      }
    }

  }

  .recommend_box {
    display: flex;
    flex-wrap: wrap;
    // flex-wrap: wrap;
    justify-content: space-evenly;
    padding: 10px;

    // border: 1px solid red;
    .item {
      width: 23%;
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #000;

      img {
        width: 100%;
      }

      h4 {
        text-align: center;
        color: $text_color;
        padding: 10px;
      }
    }
  }
}

// 1024以上
@media screen and (min-width:1024px) {
  .quiz_result {
    .wraper {
      max-width: 1200px;

      .img_box {
        .item {
          &:nth-child(1) {
            top: -20px;
          }

          &:nth-child(2) {
            top: 20px;
          }
        }
      }
    }
  }

  .recommend_box {
    max-width: 1200px;
    margin: 0 auto;
    border: 1px solid red;
  }
}

.recommend {
  color: $title_color;
  text-align: center;
  font-size: 16px;
  font-weight: 600;
}

@media screen and (min-width:768px) {
  .recommend {
    font-size: 24px;
  }
}
</style>