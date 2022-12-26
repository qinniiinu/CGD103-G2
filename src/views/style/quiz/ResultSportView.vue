<template>
    <QuizResult 
    result="運動風" 
    img1="./pic/sport3.png" 
    img2="./pic/sport2.png"
    desc="運動休閒風日愈成為主流趨勢，從以前因運動需求才穿上運動裝，到現在運動裝已經普遍成為了一種常見的穿搭風格，大家對於運動休閒接受度越來越高，不僅不會覺得奇怪，甚至覺得穿上運動裝，就無形的展現著一種「對生活有紀律、有熱情」的生活態度。"
     />
       <button class="btn_ns" @click="record_style">記錄我的風格</button>
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
import { BASE_URL } from '@/assets/js/common.js';
export default {
  components: {
    QuizResult,
  },
   data() {
    return {
      product:[],
      style_id: 101,
    }
  },
  methods:{
     cut(x) {
      if (x) return x.split(",")[0];
    },
      record_style() {
      const data = {
        style_id: this.style_id,
      };
      fetch(`${BASE_URL}/mem_styleUPD.php`, {
        method: "post",
        body: new URLSearchParams(data),
      })
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
     record_style() {
      const data = {
        style_id: this.style_id,
        mem_id: this.$store.state.user.mem_id,
      };
      fetch(`${BASE_URL}/mem_styleUPD.php`, {
        method: "post",
        body: new URLSearchParams(data),
      })
        .then((res) => res.json())
        .then((json) => console.log(json));
      alert("記錄成功");
    },
  },
   mounted() {
    this.getRecommend();
  }


}
</script>
<style lang="scss" scoped>
@import "@/assets/sass/quiz_result";
</style>