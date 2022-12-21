<template>
  <QuizResult 
  result="極簡風" 
  img1="./minimalist1.png" 
  img2="./minimalist2.png"
  desc="極簡風在穿搭時，也可以嘗試看看多層次的穿搭法。選擇色系相近、長短不同的衣服，穿搭時可以營造出層次感，讓衣著看上去不會過度呆版。例如選擇長版的素色薄外套搭配條紋的T恤，或是利用襯衫當作外套，內襯一件素色T恤也是相當好的搭配。這樣的穿搭法除了可以增加視覺的豐富度，面對季節交替又或是夏天冷氣房與室外的溫差變化，都能靈活的穿脫，可說是兼具實用性與時尚性的文青風格。"
   />
   <h3 class="recommend">推薦商品</h3>
    <section class="recommend_box">
      <div v-for="e in product" class="item" :key="e.combo_pic" >
        <img :src="require(`@/assets/product/${e.combo_pic}`)" />
        <h4>{{ e.combo_name }}</h4>
      </div>
      <div v-for="e in product" class="item" :key="e.combo_pic" >
        <img :src="require(`@/assets/product/${e.combo_pic}`)" />
        <h4>{{ e.combo_name }}</h4>
      </div>
    </section>
</template>


<script>
import QuizResult from "@/components/QuizResult.vue";
//引入BASE_URL參數
import { BASE_URL } from '../../../assets/js/common.js'
export default {
  components: {
    QuizResult,
  },
  data() {
    return {
      product:[],
    }
  },
  methods:{
     getResource() {
      this.axios.get(`${BASE_URL}/quiz/style_recommend.php`).then((response) => {
                this.product = response.data;
                console.log(this.product);
            });
    },
  },
   mounted() {
    this.getResource();
  }



}
</script>
<style lang="scss" scoped>
*{
  box-sizing: border-box;
}
  .recommend_box {
  display: flex;
  flex-wrap: wrap;
  // flex-wrap: wrap;
  justify-content: space-between;
  padding: 10px;

  // border: 1px solid red;
  .item {
    width: 49%;
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
 @media screen and (min-width:768px) {
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
 @media screen and (min-width:1024px) {
   .recommend_box {
    max-width: 1200px;
    margin: 0 auto;
    // border: 1px solid red;
  }
 }
 .recommend {
  color: $title_color;
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  // padding: 10px;
  margin-bottom: 20px;
}

@media screen and (min-width:768px) {
  .recommend {
    font-size: 24px;
  }
}
</style>