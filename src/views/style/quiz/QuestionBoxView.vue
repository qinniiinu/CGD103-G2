<template>
    <form name="see">
      <section class="question_box">
        <div class="slider_box">
          <div class="wrap">
            <div class="item" v-for="item in question" :key="item.id">
              <div class="title_box">
                <h2>
                  <span class="num_box">問題 <span class="num">0{{ item.id }}</span> / 7</span><span
                    class="question_name">{{ item.q_name }}</span>
                </h2>
              </div>
              <div class="option_box" @click="next($event)">
                <!-- 選項 -->
                <!-- item.op.length 選項數量 = option_item2 option_item3 option_item4-->
                <div :class="'option_item' + item.op.length" v-for="(i, idx) in item.op" :key="idx">
                  <!-- name = q1, q2... -->
                  <input type="radio" :id="item.op[idx].op_id" :name="'q' + item.id" />
                  <label :for="item.op[idx].op_id" :style="item.op[idx].styObj">
                    <p>{{ item.op[idx].op_name }}</p>
                  </label>
                </div>
              </div>
            </div>
            <!-- 最後一題 -->
            <div class="item">
              <div class="title_box">
                <h2>
                  <span class="num_box">問題 <span class="num">07</span> / 7</span><span
                    class="question_name">你較常穿哪種衣服</span>
                </h2>
              </div>
              <div class="option_box" @click="processForm()">
                <!-- 選項 -->
                <div class='option_item2'>
                  <!-- name = q1, q2... -->
                  <input type="radio" id="casual" name="q7" />
                  <label for="casual">
                    <p>休閒</p>
                  </label>
                </div>
                <div class='option_item2'>
                  <!-- name = q1, q2... -->
                  <input type="radio" id="formal" name="q7"/>
                  <label for="formal">
                    <p>正式</p>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
</template>

<script>
import StyleCard1 from "@/components/StyleCard1.vue";
import Button from "@/components/Button.vue";
export default {
  name: "QuestionBox",
  components: {
    StyleCard1,
    Button,
  },
  data() {
    return {
      // count: 0,
      // counts: 6,
      x: 0,
      question: [
        {
          id: 1,
          q_name: "請選擇偏好服裝。",
          op: [
            {
              op_name: "男裝",
              op_id: "man",
            },
            {
              op_name: "女裝",
              op_id: "woman",
            },
            {
              op_name: "中性",
              op_id: "neutral",
            },
          ],
        },
        {
          id: 2,
          q_name: "你目前對自己的穿搭有什麼看法?",
          op: [
            {
              op_name: "很滿意",
              op_id: "satisfied",
            },
            {
              op_name: "我想改變目前風格",
              op_id: "change_style",
            },
            {
              op_name: "我想增加其他風格",
              op_id: "add_style",
            },
            {
              op_name: "我不清楚我適合什麼風格",
              op_id: "not_sure",
            },
          ],
        },
        {
          id: 3,
          q_name: "穿搭你最注重的是?",
          op: [
            {
              op_name: "時尚",
              op_id: "fashion",
            },
            {
              op_name: "舒服",
              op_id: "relax",
            },
            {
              op_name: "都注重",
              op_id: "both",
            },
          ],
        },
        {
          id: 4,
          q_name: "休假時的你喜歡?",
          op: [
            {
              op_name: "爬山",
              op_id: "climb",
            },
            {
              op_name: "喝咖啡",
              op_id: "coffee",
            },
            {
              op_name: "逛街",
              op_id: "shop",
            },
            {
              op_name: "睡覺",
              op_id: "sleep",
            },
          ],
        },
        {
          id: 5,
          q_name: "穿衣服時你喜歡?",
          op: [
            {
              op_name: "寬鬆",
              op_id: "loose",
            },
            {
              op_name: "剛好",
              op_id: "fit",
            },
            {
              op_name: "緊身",
              op_id: "tight",
            },
          ],
        },
        {
          id: 6,
          q_name: "當你有一筆預算能買一件單品，你會買?",
          op: [
            {
              op_name: "鞋子",
              op_id: "shoes",
            },
            {
              op_name: "下身",
              op_id: "pants",
            },
            {
              op_name: "配件",
              op_id: "deco",
            },
            {
              op_name: "上身",
              op_id: "cloth",
            },
          ],
        },
        // {
        //   id: 7,
        //   q_name: "你較常穿哪種衣服?",
        //   op: [
        //     {
        //       op_name: "休閒",
        //       op_id: "casual",
        //     },
        //     {
        //       op_name: "正式",
        //       op_id: "formal",
        //     },
        //   ],
        // },
      ],
    };
  },
  methods: {
    //判斷跳轉去哪一頁
    sendSport(){
      this.$router.push('/ResultSport')
    },
    sendHipster(){
      this.$router.push('/ResultHipster')
    },
    sendFashion(){
      this.$router.push('/ResultFashion')
    },
    sendMinimalist(){
      this.$router.push('/ResultMinimalist')
    },
    next(e) {
      this.count += 1;
      this.x -= 50; //??
      let y = this.x + "vw";
      e.currentTarget.parentElement.parentElement.parentElement.style.transform = `translateX(${y})`; //抓上上上層 slider_box
      console.log("y:", y);
      console.log("count:", this.count);
    },
    processForm() {
      console.log("send");
      var sport = 0; //運動風
      var hipster = 0; //文青風
      var fashion = 0; //時尚風
      var minimalist = 0; //極簡風

      // 1.請選擇偏好服裝。
      // if (document.see.q1[0].checked == 1) sport += 1; //男裝
      // if (document.see.q1[1].checked == 1) hipster += 1; //女裝
      // if (document.see.q1[2].checked == 1) fashion += 1; //中性

      // 2.你目前對自己的穿搭有什麼看法 ?
      if (document.see.q2[0].checked == 1) fashion += 1; //很滿意
      if (document.see.q2[1].checked == 1) hipster += 2; //我想改變目前風格
      if (document.see.q2[2].checked == 1) sport += 1; // 我想增加其他風格
      if (document.see.q2[3].checked == 1) minimalist += 1; // 我不清楚我適合什麼風格


      // 3.穿搭你最注重的是?
      if (document.see.q3[0].checked == 1) fashion += 1; //時尚
      if (document.see.q3[1].checked == 1) {
        sport += 1  //舒服
        minimalist += 2; //舒服
      }
      if (document.see.q3[2].checked == 1) hipster += 1; //都注重

      // 4.休假時的你喜歡?
      if (document.see.q4[0].checked == 1) sport += 2; //爬山
      if (document.see.q4[1].checked == 1) hipster += 1; //喝咖啡
      if (document.see.q4[2].checked == 1) fashion += 1; //逛街
      if (document.see.q4[3].checked == 1) minimalist += 1; //睡覺
      // 5.穿衣服時你喜歡?
      if (document.see.q5[0].checked == 1) {
        sport += 1; //寬鬆
        minimalist += 2; //寬鬆
      }
      if (document.see.q5[1].checked == 1) hipster += 1; //剛好
      if (document.see.q5[2].checked == 1) fashion += 1; //緊身
      // 6.當你有一筆預算能買一件單品，你會買?
      if (document.see.q6[0].checked == 1) sport += 1; //鞋子
      if (document.see.q6[1].checked == 1) hipster += 1; //下身
      if (document.see.q6[2].checked == 1) fashion += 1; //配件
      if (document.see.q6[3].checked == 1) minimalist += 1; //上身
      // 7.你較常穿哪種衣服?
      if (document.see.q7[0].checked == 1) {
        sport += 1; //休閒
        minimalist += 1; //休閒
      }
      if (document.see.q7[1].checked == 1) {
        hipster += 1; //正式
        fashion += 2; //正式
      }
      // ===分數統計===
      let arr = [sport, hipster, fashion, minimalist];
      let result = Math.max(...arr);
      
      // 運動風
      if (result === arr[0]) {
        this.sendSport();
      }
      // 文青風
      if (result === arr[1]) {
        this.sendHipster();
      }
      // 時尚風
      if (result === arr[2]) {
        this.sendFashion();
      }
      // 極簡風
      if (result === arr[3]) {
        this.sendMinimalist();
      }
    },
  },
};
</script>
<style lang="scss" scoped>
* {
  box-sizing: border-box;
}

.question_box {
  width: 100%;
  overflow: hidden;
}

.slider_box {
  width: 100vw;
  transition: 1s;
  transform: translateX(0);
}

.wrap {
  margin: 30px auto;
  position: relative;
  width: 900vw; //動態

  .item {
    width: 100%;
    opacity: 1;
    transition: 6s;
    display: inline-block;
    width: 100vw;

    .title_box {
      h2 {
        text-align: center;
        color: $title_color;
        padding: 20px;

        // font-size: 14px;
        span.num_box {
          display: block;
          border: 1px $title_color solid;
          padding: 10px 20px;
          width: fit-content;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 10px;
          font-size: 16px;

          .num {
            font-weight: 600;
            color: $main_color;
          }
        }

        .question_name {
          position: relative;
          z-index: 1;
          font-size: 14px;

          &:after {
            content: "";
            background-color: $main_color;
            height: 5px;
            width: 100%;
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: -1;
          }
        }
      }
    }

    .option_box {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      min-height: calc(100vh - 186px); //*** */

      div[class*="option_item"] {
        //手機
        width: 100%;
        background-color: #000;
        color: #fff;
        padding: 50px 0;
        border-bottom: 1px solid #fff;
        position: relative;

        // input {
        //   display: none;
        // }
        label {
          position: absolute;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          text-align: center;
          cursor: pointer;

          &:hover {
            transition: 1s;
            background-color: #fff;
            color: #333;
          }

          p {
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            position: absolute;
            font-size: 20px;
          }
        }
      }
    }
  }
}

@media screen and (min-width: 768px) {
  .wrap {
    .item {
      .title_box {
        h2 {
          padding: 20px;
          span.num_box {
            display: inline-block;
            margin-right: 20px;
            font-size: 24px;
          }
          .question_name {
            font-size: 28px;
          }
        }
      }
    }
  }

  .option_box {
    div[class*="option_item"] { //所有選項
      label {
        &:hover {
          transition: 1s;
          background-color: #fff;
          color: #333;
        }

        p {
          font-size: 24px !important;
        }
      }
    }

    .option_item2 {
      //兩個選項 筆電
      width: 50% !important;
    }

    .option_item3 {
      //三個選項 筆電
      width: 33% !important;
    }

    .option_item4 {
      //四個選項 筆電
      width: 25% !important;
    }
  }
}

</style>
