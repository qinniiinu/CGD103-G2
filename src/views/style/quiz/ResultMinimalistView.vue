<template>
  <QuizResult
    result="極簡風"
    img1="./pic/minimalist1.png"
    img2="./pic/minimalist2.png"
    desc="極簡風在穿搭時，也可以嘗試看看多層次的穿搭法。選擇色系相近、長短不同的衣服，穿搭時可以營造出層次感，讓衣著看上去不會過度呆版。例如選擇長版的素色薄外套搭配條紋的T恤，或是利用襯衫當作外套，內襯一件素色T恤也是相當好的搭配。這樣的穿搭法除了可以增加視覺的豐富度，面對季節交替又或是夏天冷氣房與室外的溫差變化，都能靈活的穿脫，可說是兼具實用性與時尚性的文青風格。"
  />
  <button class="btn_ns" @click="record_style">記錄我的風格</button>
  <h3 class="recommend">推薦商品</h3>
  <section class="recommend_box">
    <div v-for="e in product" class="item" :key="e.product_pic">
      <router-link :to="`/productDetails/${e.product_id}`">
        <img :src="`./pic/${cut(e.product_pic)}`" />
        <h4>{{ e.product_name }}</h4>
      </router-link>
    </div>
  </section>
</template>


<script>
import QuizResult from "@/components/QuizResult.vue";
//引入BASE_URL參數
import { BASE_URL } from "@/assets/js/common.js";
export default {
  components: {
    QuizResult,
  },
  data() {
    return {
      product: [],
      style_id: 104,
    };
  },
  methods: {
    cut(x) {
      if (x) return x.split(",")[0];
    },
    // ******待修正
    // insert() {
    //   // const data = {
    //   //   mem_style_id: this.style_id,
    //   // } 

    //   fetch(`${BASE_URL}/record_style.php`, {
    //     method: "POST",
    //     body: new URLSearchParams(`mem_style_id= 123`),
    //   });
    // },
     record_style() {
      const data = {
        style_id: this.style_id,
        mem_id:this.$store.state.user.mem_id,
      };
      fetch(`${BASE_URL}/mem_styleUPD.php`, {
        method: "post",
        body: new URLSearchParams(data),
      }) 
      // fetch(`http://localhost/cgd103_g2_frontend/phpfile/mem_styleUPD.php`, {
      //   method: "post",
      //   body: new URLSearchParams(data),
      // })
        .then((res) => res.json())
        .then((json) => console.log(json));
        alert("記錄成功");
    },
     getRecommend() {
      const data = {
        style_id: this.style_id,
      };
      fetch(`${BASE_URL}/quiz/prod_recommend.php`, {
        method: "post",
        body: new URLSearchParams(data),
      })
        .then((res) => res.json())
        .then((json) => (this.product = json));
    },
  },
  mounted() {
    this.getRecommend();
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/sass/quiz_result";
</style>