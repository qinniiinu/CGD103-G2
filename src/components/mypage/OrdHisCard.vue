<template>
  <li class="item" v-for="order in orders"  :key="order.order_id">
    <router-link to="MyPage/OrderHistory">
      <!-- 訂單記錄列 -->
      <div class="row">
        <div class="title">訂單編號： {{ order[0].order_id }}</div>
        <!-- 訂單狀態 -->
        <p v-if="order[0].order_con == 1">訂單取消</p>
        <p v-else-if="order[0].order_con == 2">商品備貨中</p>
        <p v-else>商品已送達</p>
      </div>
      <div class="photo_money">
        <!-- 商品圖 * 2 -->
        <div class="photos">
          <div v-for="e in order" :key="e.product_id" class="photo">
            <img :src="`https://tibamef2e.com/cgd103/g2/front/pic/${cut(e.product_pic)}`" alt="訂單商品" />
          </div>
          <!-- <div class="photo">
            <img :src="order.product_pic[1]" alt="" />
          </div> -->
        </div>
        <!-- 商品數 + 金額 -->
        <div class="item_money">
          <span class="allitem">共{{ order.length }}件商品</span>
          <span class="allprice">訂單金額 ${{ order[0].order_paid }}</span>
        </div>
      </div>
    </router-link>
  </li>
</template> 

<script>
import { BASE_URL } from "@/assets/js/common.js";
export default {
  name: "OrdHisCard",
  props: {
    order_id: String,
    order_con: String,
    quantity: String,
    total: String,
  },
  components: {},
  data() {
    return {
      orders: [
        // {
        //   order_id: 1201201,
        //   order_con: {
        //     0: "取消",
        //     1: "未確認",
        //     2: "備貨中",
        //     3: "已出貨",
        //   },
        //   product_pic: ["./pic/style1.png", "./pic/style2.png"],
        //   quantity: 2,
        //   total: 888,
        // },
        // {
        //   order_id: 1201202,
        //   order_con: {
        //     0: "取消",
        //     1: "未確認",
        //     2: "備貨中",
        //     3: "已出貨",
        //   },
        //   product_pic: ["./pic/style1.png", "./pic/style2.png"],
        //   quantity: 2,
        //   total: 888,
        // },
        // {
        //   order_id: 1201203,
        //   order_con: {
        //     0: "取消",
        //     1: "未確認",
        //     2: "備貨中",
        //     3: "已出貨",
        //   },
        //   product_pic: ["./pic/style1.png", "./pic/style2.png"],
        //   quantity: 2,
        //   total: 888,
        // },
      ],
      product: [],
    };
  },
  methods: {
    cut(x) {
      if (x) return x.split(",")[0];
    },
    getResource() {
      this.axios
        .get(`${BASE_URL}/getOrder.php`, { credentials: "include" })
        .then((response) => {
          // console.log(response.data);
          this.orders = response.data;
          // this.product = response.data;
          // this.product = this.product.slice(0, 2);
          // console.log(this.product);
          // this.order_item = response.data;

        const groupBy = (array, key) =>
            array.reduce((objectsByKeyValue, obj) => {
              const value = obj[key];
              objectsByKeyValue[value] = (
                objectsByKeyValue[value] || []
              ).concat(obj);
              return objectsByKeyValue;
            }, {});

          this.orders = groupBy(this.orders, "order_id");
          // console.log(this.orders);
        });
    },
  },
  mounted() {
    this.getResource();
  },
  
};
</script>

<style lang="scss" scoped>
* {
  list-style: none;
}
.item {
  width: max-width;
  height: min-content;
  margin-block: 20px;
  padding: 20px;
  border: 1px solid gray;
  background-color: $third_color;
  .row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    h2 {
      font-weight: bold;
      font-size: 20px;
    }
  }
  .photo_money {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    .photos {
      display: flex;
      gap: 20px;
      .photo {
        max-width: 120px;
        height: 120px;
        display: flex;
        img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
      }
    }
    .item_money {
      text-align: right;
      .allitem {
        display: block;
        font-size: 14px;
      }
      .allprice {
        margin-top: 10px;
        display: block;
        font-weight: bold;
        font-size: 18px;
      }
    }
  }
}
</style>
