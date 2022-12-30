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
import { BASE_URL } from '@/assets/js/common.js';
export default {
  components: {
    QuizResult,
  },
   data() {
    return {
      product:[],
      combo_product: [],
      style_id: 101,
      mem_id:"",
      record:false,
			not_record:false,
    }
  },
  methods:{
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
    // 記錄風格
    record_style() {
      if (this.mem_id != "") {
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
  }


}
</script>
<style lang="scss" scoped>
@import "@/assets/sass/quiz_result";
</style>