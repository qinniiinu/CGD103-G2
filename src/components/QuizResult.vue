<template>
    <div v-if="count >= 0">
        <p>loading...</p>
        <p>該頁將在 <span>{{count}}</span> 秒後自動跳轉 </p>
    </div>
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
            <!-- <StyleCard1 link="./hipster2.png" /> -->
          </div>
          <div class="txt_box">
            <h3>適合您的穿搭公式</h3>
            <p>{{desc}}</p>
            <Button content="記錄我的風格" />
          </div>
        </div>
      </section>
      <h3 class="recommend">推薦穿搭</h3>
  <StylistLook :scardP="scardP" :stylistName="stylistName" :stylistInfo="stylistInfo"></StylistLook>

    </div>
</template>
<script>
import StyleCard1 from "@/components/StyleCard1.vue";
import Button from "@/components/Button.vue";
import StylistLook from "@/components/StylistLook.vue";
export default {
  name: "QuizResult",
  components: {
    StyleCard1,
    Button,
    StylistLook,
  },
  props: {
        result:String,
        img1:String,
        img2:String,
        desc:String,
        scardP:String,
        stylistName:String,
        stylistInfo:String,

    },
  data () {
    return {
      count: 1
    }
  },
  methods: {
    // 倒數功能
    countDown () {
      // 執行一次，count減1
      this.count--
      // 每秒執行一次
      setTimeout(() => {
        this.countDown();
      }, 1000)
    }
  },
  mounted () {
    this.countDown();
  }   


}
</script>
<style lang="scss" scoped>
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