<template>
  <QuizResult
    result="文青風"
    img1="./pic/hipster1.png"
    img2="./pic/hipster2.png"
    desc="文青風在穿搭時，也可以嘗試看看多層次的穿搭法。選擇色系相近、長短不同的衣服，穿搭時可以營造出層次感，讓衣著看上去不會過度呆版。例如選擇長版的素色薄外套搭配條紋的T恤，或是利用襯衫當作外套，內襯一件素色T恤也是相當好的搭配。這樣的穿搭法除了可以增加視覺的豐富度，面對季節交替又或是夏天冷氣房與室外的溫差變化，都能靈活的穿脫，可說是兼具實用性與時尚性的文青風格。"
  />
  <h3 class="recommend">推薦商品</h3>
  <section class="recommend_box">
      <div v-for="e in product" class="item" :key="e.product_pic" >
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
    };
  },
  methods: {
    getResource() {
      this.axios
        .get(`${BASE_URL}/quiz/hipster_recommend.php`)
        .then((response) => {
          this.product = response.data;
          console.log(this.product);
        });
    },
    cut(x) {
      if (x) return x.split(",")[0];
    },
  },
  mounted() {
    this.getResource();
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/sass/quiz_result";
</style>