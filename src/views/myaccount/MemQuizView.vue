<template>
  <p class="title">我的風格</p>
  <div class="data">
    <!-- 有測驗紀錄 -->
    <div class="wrap" v-if="style_id != ''">
      <section class="style">
        <div class="item">
          <p>屬於:</p>
          <h2>#{{ info.style_name }}</h2>
        </div>
        <div class="item">
          <img :src="`../pic/${info.style_pic}`" :alt="info.style_name" />
        </div>
        <div class="item">
          <p>{{ info.style_descrip }}</p>
        </div>
      </section>
      <h3 class="recommend">推薦商品</h3>
      <section class="recommend_box">
        <div v-for="e in product" class="item" :key="e.product_pic">
          <router-link :to="`/productDetails/${e.product_id}`">
            <img :src="`../pic/${cut(e.product_pic)}`" />
            <h4>{{ e.product_name }}</h4>
          </router-link>
        </div>
      </section>
      <h3 class="recommend">推薦穿搭</h3>
      <section class="recommend_box">
        <div v-for="e in combo_product" class="item" :key="e.combo_pic">
          <router-link :to="`/Set/${e.combo_id}`">
            <img :src="`../look/${cut(e.combo_pic)}`" />
            <h4>{{ e.combo_name }}</h4>
          </router-link>
        </div>
      </section>
      <section class="deco">
        <div class="decoration">#STYLE</div>
        <div class="btn_box">
          <router-link to="/MyPage"
            ><button class="btn_l">返回</button></router-link
          >
          <router-link :to="{ name: 'Quiz' }"
            ><button class="btn_s">重新測驗</button></router-link
          >
        </div>
      </section>
    </div>
    <!-- 無測驗紀錄 -->
    <div class="no_style" v-else>
      <div class="item">
        <h3 class="txt_box">尚未測驗</h3>
        <div class="btn_box">
          <router-link :to="{ name: 'Quiz' }"
            ><button class="btn_s">測驗去</button></router-link
          >
          <router-link to="/MyPage"
            ><button class="btn_l">返回</button></router-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//引入BASE_URL參數
import { BASE_URL } from "@/assets/js/common.js";
export default {
  name: "MemQuiz",
  data() {
    return {
      info: [],
      product: [],
      combo_product: [],
      style_id: "",
    };
  },
  created() {},
  mounted() {
    this.getResource();
    this.getRecommend();
    this.getComboRecommend();
  },
  computed: {},
  methods: {
    cut(x) {
      if (x) return x.split(",")[0];
    },
    getResource() {
      this.axios.get(`/api_server/mem_style.php`).then((response) => {
        this.info = response.data;
        console.log(response);
        if (this.info.style_id !== null && this.info.style_id !== undefined) {
          this.style_id = this.info.style_id;
          this.getRecommend();
          this.getComboRecommend();
        }
      });
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
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/quiz_result";
.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}
.wrap {
  .txt_box {
    padding: 50px;
    color: $main_color;
    font-size: 30px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 30px;
  }
  .style {
    .item:nth-child(1) {
      //title
      padding: 20px 0;
      h2 {
        font-size: 32px;
        font-weight: 600;
        text-align: center;
      }
      p {
        display: none;
      }
    }
    .item:nth-child(2) {
      //image
      position: relative;
      img {
        width: 100%;
        vertical-align: top;
      }
    }
    // descrip
    .item:nth-child(3) {
      padding: 20px 0;
      p {
        color: $text_color;
        line-height: 27px;
        font-size: 16px;
      }
    }
  }
  .recommend {
    margin: 50px 0;
    h2 {
      font-size: 20px;
      color: $title_color;
      margin: 10px 0;
    }
    .item {
      border: 1px solid $title_color;
    }
  }
  .deco {
    .decoration {
      display: none;
    }
    .btn_box {
      display: flex;
      align-items: center;
      justify-content: space-evenly;
    }
  }
}

@media screen and (min-width: 1024px) {
  .wrap {
    background-color: #fff;
    padding: 20px;
    border: 1px solid $title_color;
    min-height: 500px;
    .style {
      display: grid;
      grid-template-columns: 60% 40%;
      grid-template-rows: auto auto;
      align-items: center;
      .item:nth-child(1) {
        //title
        padding: 20px 0;
        grid-area: 1/1/2/2;
        h2 {
          font-size: 66px;
          text-align: left;
          width: 90%;
          margin-left: auto;
        }
        p {
          display: block;
          color: $title_color;
          font-size: 32px;
        }
      }
      .item:nth-child(2) {
        //image
        grid-area: 1/2/3/3;
        position: relative;
        img {
          width: 80%;
          margin: auto;
          display: block;
        }
      }
      .item:nth-child(3) {
        grid-area: 2/1/3/2;
        padding: 20px 0;
        p {
          color: $text_color;
          line-height: 27px;
          font-size: 16px;
          width: 80%;
        }
      }
      .item:nth-child(4) {
        display: none;
      }
    }
    // === recommend ===
    .deco {
      position: relative;
      .decoration {
        display: inline-block;
        font-size: 72px;
        font-weight: bolder;
        font-style: italic;
        color: $secondary;
      }
      .btn_box {
        display: inline-block;
        position: absolute;
        right: 0;
        .btn_l {
          // 返回
          display: inline-block;
          margin-right: 10px;
        }
        .btn_s {
          //重新測驗
          display: inline-block;
          margin-right: 10px;
        }
      }
    }
  }
}

// 無測驗
.no_style {
  border: 1px $title_color solid;
  min-height: 300px;
  position: relative;
  background-color: #fff;
  .item {
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    left: 50%;
    width: 90%;
    h3 {
      margin-bottom: 30px;
      font-weight: 600;
      color: $main_color;
      font-size: 30px;
      text-align: center;
    }
    .btn_box {
      margin: 0 auto;
      width: fit-content;
      .btn_s {
        margin-right: 10px;
      }
    }
  }
}
@media screen and (min-width: 1024px) {
  .no_style {
    min-height: 500px;
  }
}
</style>
