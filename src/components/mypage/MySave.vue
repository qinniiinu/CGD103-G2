<template>
  <section class="my_save">
    <h3 class="title">我的收藏</h3>
    <div class="data">
      <!-- 收藏穿搭 -->
      <div class="save_card">
        <h4 class="tit">收藏穿搭</h4>
        <ul class="save_item">
          <li v-for="ootd in ootds" :key="ootd.combo_id">
            <img :src="ootd.combo_pic" alt="ootd.combo_id" />
          </li>
        </ul>
      </div>
      <!-- 單品商品 -->
      <div class="save_card">
        <h4 class="tit">單品商品</h4>
        <ul class="save_item">
          <li v-for="product in products" :key="product.product_id">
            <img :src="product.product_pic" alt="product.product_id" />
          </li>
        </ul>
      </div>
    </div>
  </section>
</template> 


<script>
export default {
  name: "MySave",
  props: {},
  components: {},
  data() {
    return {
      ootds: [
        {
          combo_id: 11111,
          combo_pic: "./ootd-look-1.jpg",
        },
        {
          combo_id: 22222,
          combo_pic: "./ootd-look-2.jpg",
        },
        {
          combo_id: 33333,
          combo_pic: "./ootd-look-3.jpg",
        },
      ],

      products: [
        {
          product_id: 11111,
          product_pic: "./stylelist-look1.webp",
        },
        {
          product_id: 22222,
          product_pic: "./stylelist-look2.webp",
        },
        {
          product_id: 33333,
          product_pic: "./stylelist-look3.webp",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.my_save {
  background-color: #fff;
  min-height: 15;
  border: 1px solid $title_color;
  box-sizing: border-box;
  padding: 25px;
  margin-block-start: 25px;
  position: relative;
  .title {
    font-size: 24px;
    display: block;
    font-weight: 700;
    color: $title_color;

    margin-block-end: 10px;
    justify-content: space-between;
  }
  .data {
    display: flex;
    width: 100%;
    justify-content: space-between;
    .save_card {
      border: 1px gray;

      .tit {
        font-size: 18px;
        margin-bottom: 10px;
      }
      .save_item {
        display: flex;
        justify-content: space-between;
        border: 1px solid gray;
        li {
          max-width: 150px;
          height: 170px;
          margin: 15px;
          img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
          }
        }
      }
    }
  }
}
</style>