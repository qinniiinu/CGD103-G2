<template>
    <form name="see">
      <section class="question_box">
        <div class="slider_box">
          <div class="wrap">
            <div class="item" v-for="item in question" :key="item.id">
              <div class="title_box">
                <h2>
                  <span class="num_box">問題 <span class="num">{{ item.id }}</span> / 11</span><span
                    class="question_name">{{ item.q_name }}</span>
                </h2>
              </div>
              <div class="option_box" @click.once="next($event)">
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
                  <span class="num_box">問題 <span class="num">11</span> /11</span><span
                    class="question_name">當你有一筆錢吃飯，你會去?</span>
                </h2>
              </div>
              <div class="option_box" @click="processForm()">
                <!-- 選項 -->
                <div class='option_item4'>
                  <input type="radio" id="buffet" name="q11" />
                  <label for="buffet">
                    <p>吃到飽餐廳</p>
                  </label>
                </div>
                <div class='option_item4'>
                  <input type="radio" id="michelin" name="q11"/>
                  <label for="michelin">
                    <p>米其林餐廳</p>
                  </label>
                </div>
                <div class='option_item4'>
                  <input type="radio" id="home" name="q11"/>
                  <label for="home">
                    <p>自己煮</p>
                  </label>
                </div>
                <div class='option_item4'>
                  <input type="radio" id="coffee_shop" name="q11"/>
                  <label for="coffee_shop">
                    <p>咖啡廳</p>
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
      x: 0,
      question: [
        {
          id: 1,
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
          id: 2,
          q_name: "穿搭你最注重的是?",
          op: [
          {
              op_name: "時尚",
              op_id: "fashion",
            },
            {
              op_name: "舒服",
              op_id: "comfortable",
            },
            {
              op_name: "都注重",
              op_id: "both",
            },
          ],
        },
        {
          id: 3,
          q_name: "你較常都穿哪種服裝?",
          op: [
            {
              op_name: "休閒",
              op_id: "casual",
            },
            {
              op_name: "正式",
              op_id: "formal",
            },
          ],
        },
        {
          id: 4,
          q_name: "當你有一筆預算能買一件單品，你會買?",
          op: [
            {
              op_name: "鞋子",
              op_id: "shoes",
            },
            {
              op_name: "下身",
              op_id: "bottom",
            },
            {
              op_name: "配件",
              op_id: "accessory ",
            },
            {
              op_name: "上身",
              op_id: "top",
            },
          ],
        },
        {
          id: 5,
          q_name: "你喜歡搭配什麼飾品?",
          op: [
            {
              op_name: "髮帶/絲巾",
              op_id: "hair_tie",
            },
            {
              op_name: "太陽眼鏡",
              op_id: "shades",
            },
            {
              op_name: "手錶",
              op_id: "watch",
            },
            {
              op_name: "帆布包",
              op_id: "bag",
            },
          ],
        },
        {
          id: 6,
          q_name: "你喜歡穿什麼樣的上身?",
          op: [
            {
              op_name: "襯衫",
              op_id: "shirts",
            },
            {
              op_name: "都喜歡",
              op_id: "both_top",
            },
            {
              op_name: "T-shirt",
              op_id: "t_shirt",
            },
            {
              op_name: "背心",
              op_id: "tanktops",
            },
          ],
        },
        {
          id: 7,
          q_name: "你喜歡穿什麼樣的下身?",
          op: [
            {
              op_name: "牛仔褲",
              op_id: "jeans",
            },
            {
              op_name: "運動褲",
              op_id: "sport_pants",
            },
            {
              op_name: "都喜歡",
              op_id: "both_bottom",
            },
            {
              op_name: "寬褲",
              op_id: "culottes",
            },
          ],
        },
        {
          id: 8,
          q_name: "你喜歡穿什麼樣的鞋子?",
          op: [
            {
              op_name: "靴子",
              op_id: "boots",
            },
            {
              op_name: "slip-ons",
              op_id: "slip_ons",
            },
            {
              op_name: "運動鞋",
              op_id: "sneakers",
            },
            {
              op_name: "帆布鞋",
              op_id: "canvas_shoes",
            },
          ],
        },
        {
          id: 9,
          q_name: "你喜歡什們麼顏色的穿搭?",
          op: [
            {
              op_name: "大地色",
              op_id: "earth_tone",
            },
            {
              op_name: "黑白色",
              op_id: "black_white",
            },
            {
              op_name: "所有顏色",
              op_id: "all_color",
            },
           
          ],
        },
        {
          id: 10,
          q_name: "休假時你喜歡?",
          op: [
            {
              op_name: "睡覺",
              op_id: "sleep",
            },
            {
              op_name: "逛街",
              op_id: "shop",
            },
            {
              op_name: "喝咖啡",
              op_id: "coffee",
            },
            {
              op_name: "爬山",
              op_id: "mountain",
            },
           
          ],
        },
        // {
        //   id: 11,
        //   q_name: "當你有一筆錢吃飯，你會去?",
        //   op: [
        //     {
        //       op_name: "吃到飽餐廳",
        //       op_id: "buffet",
        //     },
        //     {
        //       op_name: "咖啡廳",
        //       op_id: "coffee_shop",
        //     },
        //     {
        //       op_name: "自己煮",
        //       op_id: "home",
        //     },
        //     {
        //       op_name: "米其林餐廳",
        //       op_id: "michelin",
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
      this.x -= 100; 
      let y = this.x + "vw";
      e.currentTarget.parentElement.parentElement.parentElement.style.transform = `translateX(${y})`; //抓上上上層 slider_box
      console.log("y:", y);
      // console.log("count:", this.count);
    },
    processForm() {
      console.log("send");
      var sport = 0; //運動風
      var hipster = 0; //文青風
      var fashion = 0; //時尚風
      var minimalist = 0; //極簡風

      // === 1.穿衣服時你喜歡? ===
      if (document.see.q1[0].checked == 1){
        sport += 1; //寬鬆
        minimalist += 1;//寬鬆
      } 
      if (document.see.q1[1].checked == 1) hipster += 1; //剛好
      if (document.see.q1[2].checked == 1) fashion += 1; //緊身

      // === 2.穿搭你最注重的是? ===
      if (document.see.q2[0].checked == 1) fashion += 1; //很滿意
      if (document.see.q2[1].checked == 1){
        sport += 1; //舒服
        minimalist += 1;//舒服
      } 
      if (document.see.q2[2].checked == 1) hipster += 1; // 都注重
     


      // === 3.你較常都穿哪種服裝? ===
      if (document.see.q3[0].checked == 1){
        sport += 1; //休閒
        minimalist += 1; //休閒
      } 
      if (document.see.q3[1].checked == 1){
        fashion += 1; //正式
        hipster += 1; //正式
      } 

      // === 4.當你有一筆預算能買一件單品，你會買? ===
      if (document.see.q4[0].checked == 1) sport += 1; //鞋子
      if (document.see.q4[1].checked == 1) hipster += 1; //下身
      if (document.see.q4[2].checked == 1) fashion += 1; //配件
      if (document.see.q4[3].checked == 1) minimalist += 1; //上身

      // === 5.你喜歡搭配什麼飾品? ===
      if (document.see.q5[0].checked == 1) minimalist += 1;//髮帶or絲巾
      if (document.see.q5[1].checked == 1) fashion += 1; //太陽眼鏡
      if (document.see.q5[2].checked == 1) sport += 1; //手錶
      if (document.see.q5[3].checked == 1) hipster += 1; //帆布包

      // === 6.你喜歡穿什麼樣的上身? ===
      if (document.see.q6[0].checked == 1) hipster += 1; //襯衫
      if (document.see.q6[1].checked == 1) fashion += 1; //都喜歡
      if (document.see.q6[2].checked == 1) minimalist += 1; //T-shirt
      if (document.see.q6[3].checked == 1) sport += 1; //背心

      // === 7.你喜歡穿什麼樣的下身? ===
      if (document.see.q7[0].checked == 1) hipster += 1; //牛仔褲
      if (document.see.q7[1].checked == 1) sport += 1; //運動褲
      if (document.see.q7[2].checked == 1) fashion += 1; //都喜歡
      if (document.see.q7[3].checked == 1) minimalist += 1; //寬褲

      // === 8.你喜歡穿什麼樣的鞋子? ===
      if (document.see.q8[0].checked == 1) fashion += 1; //靴子
      if (document.see.q8[1].checked == 1) minimalist += 1; //slip-ons
      if (document.see.q8[2].checked == 1) sport += 1; //運動鞋
      if (document.see.q8[3].checked == 1) hipster += 1; //帆布鞋

      // === 9.你喜歡什們麼顏色的穿搭? ===
      if (document.see.q9[0].checked == 1) hipster += 1; //大地色
      if (document.see.q9[1].checked == 1){
        minimalist += 1; //黑白色
        sport += 1; //黑白色
      } 
      if (document.see.q9[2].checked == 1) fashion += 1; //所有顏色
     
      // === 10.休假時你喜歡? ===
      if (document.see.q10[0].checked == 1) minimalist += 1; //睡覺
      if (document.see.q10[1].checked == 1) fashion += 1; //逛街
      if (document.see.q10[2].checked == 1) hipster += 1; //喝咖啡
      if (document.see.q10[3].checked == 1) sport += 1; //爬山

      // === 11.當你有一筆錢吃飯，你會去? ===
      if (document.see.q11[0].checked == 1) fashion += 1; //吃到飽餐廳
      if (document.see.q11[1].checked == 1) hipster += 1; //咖啡廳
      if (document.see.q11[2].checked == 1) minimalist += 1; //自己煮
      if (document.see.q11[3].checked == 1) fashion += 1; //米其林餐廳
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
  margin: 0px auto;
  position: relative;
  width: 1100vw; //動態

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
          font-size: 18px;

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
      div[class*="option_item"] {
        //手機
        width: 100%;
        background-color: #000;
        color: #fff;
        padding: 50px 0;
        border-bottom: 1px solid #fff;
        position: relative;

        input {
          display: none;
        }
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
    .option_item2 {
      //兩個選項 手機
      height: calc((100vh - 164px) / 2);
    }

    .option_item3 {
      //三個選項 手機
      height: calc((100vh - 164px) / 3);
    }

    .option_item4 {
      //四個選項 手機
      height: calc((100vh - 164px) / 4);
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
    display: flex;
    flex-wrap: wrap;
    div[class*="option_item"] { //所有選項
      min-height: calc(100vh - 60px);
      label {
        &:hover {
          transition: 1s;
          background-color: #fff;
          color: $title_color;
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
