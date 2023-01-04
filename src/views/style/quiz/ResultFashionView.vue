<template>
  <QuizResult result="時尚風" img1="./pic/fashion1.png" img2="./pic/fashion3.png"
    desc="時尚風在穿搭時，也可以嘗試看看多層次的穿搭法。選擇色系相近、長短不同的衣服，穿搭時可以營造出層次感，讓衣著看上去不會過度呆版。例如選擇長版的素色薄外套搭配條紋的T恤，或是利用襯衫當作外套，內襯一件素色T恤也是相當好的搭配。這樣的穿搭法除了可以增加視覺的豐富度，面對季節交替又或是夏天冷氣房與室外的溫差變化，都能靈活的穿脫，可說是兼具實用性與時尚性的風格。" />
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
  <h3 class="recommend">推薦穿搭</h3>
  <section class="recommend_box">
    <div v-for="e in combo_product" class="item" :key="e.combo_pic">
      <router-link :to="`/Set/${e.combo_id}`">
        <img :src="`./look/${cut(e.combo_pic)}`" />
        <h4>{{ e.combo_name }}</h4>
      </router-link>
    </div>
  </section>
  <div class="check_complete" v-show="record">
    <h3>記錄成功</h3>
    <div class="close" @click="record = false">確認</div>
  </div>
  <div class="check_login" v-show="not_record">
    <h3>請先登入</h3>
    <div class="close" @click="not_record = false">確認</div>
  </div>
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
      combo_product: [],
      style_id: 103,
      mem_id: null,
      record: false,
      not_record: false,
    };
  },
  methods: {
    cut(x) {
      if (x) return x.split(",")[0];
    },
    //會員的資料
    getResourse() {
      this.axios.get(`${BASE_URL}/mem_style.php`).then((response) => { 
        this.mem_id = response.data[1].mem_id;
      });
    },
    // 單品推薦
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
     // 組合商品推薦
     getComboRecommend() {
      const data = {
        style_id: this.style_id,
      };
      fetch(`${BASE_URL}/quiz/combo_prod_recommend.php`, {
        method: "post",
        body: new URLSearchParams(data),
      })
        .then((res) => res.json())
        .then((json) => (this.combo_product = json));
    },
    record_style() {
      if (this.mem_id !== null && this.mem_id !== undefined) {
        const data = {
          style_id: this.style_id,
          mem_id: this.mem_id,
        };
        fetch(`${BASE_URL}/mem_styleUPD.php`, {
          method: "post",
          body: new URLSearchParams(data),
        })
          .then((res) => res.json())
        this.record = true;
      } else {
        this.not_record = true;
      }
    }
  },

  mounted() {
    this.getRecommend();
    this.getComboRecommend();
    this.getResourse();
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/sass/quiz_result";
</style>