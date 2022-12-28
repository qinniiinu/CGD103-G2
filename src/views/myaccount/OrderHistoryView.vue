<template>
  <p class="title">#訂單紀錄</p>
  <div class="data">
    <div class="Ordh_container">
      <!-- 訂單紀錄容器盒 -->
      <div class="ord_condition_box">
        <!-- 右上角功能盒 -->
        <select class="ord_sel" name="" id="">
          <option>訂單狀態</option>
          <option>已出貨</option>
          <option>運送中</option>
          <option>尚未出貨</option>
        </select>
        <div class="ham">
          <!-- 以下設定頁面切換 -->
          <font-awesome-icon
            class="icon"
            @click="change(0)"
            :class="{ newStyle: 0 === number }"
            icon="fa-solid fa-list"
          />
          <font-awesome-icon
            class="icon"
            @click="change(1)"
            :class="{ newStyle: 1 === number }"
            icon="fa-solid fa-clipboard"
          />
        </div>
      </div>
      <div v-show="0 === number" class="ord_history_box">
        <!-- 訂單記錄表單盒 -->

        <ul class="ord_history_toplist">
          <!-- 最上方選單 -->
          <li class="ord_history_toplist_title">
            <p>訂購日期</p>
          </li>
          <li class="ord_history_toplist_title">
            <p>訂單編號</p>
          </li>
          <li class="ord_history_toplist_title">
            <p>金額</p>
          </li>
          <li class="ord_history_toplist_title">
            <p>訂單狀態</p>
          </li>
          <li class="ord_history_toplist_title" id="Q">
            <p>訂單問題</p>
          </li>
          <li class="ord_history_toplist_title" id="C">
            <p>物流狀態</p>
          </li>
        </ul>

        <ul class="ord_history_content">
          <!-- 選單內容加scroll bar -->
          <li
            v-for="e in orders"
            :key="e[0].order_id"
            class="ord_history_content_word"
          >
            <router-link to="/MyPage/OrderHistoryDetail">
              <ul class="content_row">
                <li scope="row" class="ord_history_content">
                  {{ e[0].order_time }}
                </li>
                <li class="ord_history_content">{{ e[0].order_id }}</li>
                <li class="ord_history_content">{{ e[0].total }}</li>
                <li class="ord_history_content">
                  <p v-if="e[0].order_con == 1">訂單取消</p>
                  <p v-else-if="e[0].order_con == 2">商品配送中</p>
                  <p v-else>商品已送達</p>
                </li>
                <!-- 訂單狀態 -->
                <li class="ord_history_content" id="Q">
                  <a class="transport_detail" href="">聯繫客服</a>
                </li>
                <li class="ord_history_content" id="C">
                  <a class="transport_detail" href="">物流詳情</a>
                </li>
              </ul>
            </router-link>
          </li>
        </ul>
      </div>

      <div v-show="1 === number" class="ord_history_box">
        <!-- 訂單記錄圖片頁 -->

        <li v-for="item in orders" :key="item.order_id" class="item_num">
          <div class="item_num_row">
            <div class="item_num_title">
              訂單編號： {{ item[0].order_item_id }}
            </div>
            <h2>
              <p v-if="item[0].order_con == 1">訂單取消</p>
              <p v-else-if="item[0].order_con == 2">商品配送中</p>
              <p v-else>商品已送達</p>
            </h2>
          </div>

          <div class="page_photo">
            <div class="page_photo_box">
              <div
                class="item_page_photo"
                v-for="e in product"
                :key="e.product_id"
              >
                <img :src="`../pic/${cut(e.product_pic)}`" />
              </div>
            </div>

            <div class="item_money">
              <p>共{{ item[0].item_product }}件商品</p>
              <h2>訂單金額 ${{ item[0].unit_price }}</h2>
            </div>
          </div>
        </li>
      </div>

      <div class="order_history_bottom">
        <div class="order_title">#ORDER</div>
        <!-- 左下角大字 -->
        <div class="order_back">
          <router-link to="/MyPage"
            ><!-- 返回鍵 -->
            <button class="btn_l">返回</button>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "@/components/Button.vue";
import { BASE_URL } from "../../assets/js/common.js";
export default {
  name: "OrderHistory",
  components: {
    Button,
  },
  data() {
    return {
      number: 0, //用來切換子頁面的值
      orders: [],
      product: [],
    };
  },
  methods: {
    change: function (index) {
      this.number = index;
    },
    cut(x) {
      if (x) return x.split(",")[0];
    },
    getResource() {
      this.axios.get(`/api_server/getOrder.php`).then((response) => {
        console.log(response.data);
        this.orders = response.data;
        this.product = response.data;
        this.product = this.product.slice(0, 3);
        console.log(this.product);
        this.order_item = response.data;

        const groupBy = (array, key) =>
          array.reduce((objectsByKeyValue, obj) => {
            const value = obj[key];
            objectsByKeyValue[value] = (objectsByKeyValue[value] || []).concat(
              obj
            );
            return objectsByKeyValue;
          }, {});

        this.orders = groupBy(this.orders, "order_id");
      });
    },
  },
  mounted() {
    this.getResource();
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/main";

* {
  list-style: none;
}

.icon {
  margin: 20px;
}

.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}

@mixin b() {
  @media screen and (max-width: 1023px) {
    @content;
  }
}

.mem_container .mem_data {
  @include b() {
    padding: 0%;
  }
}
body {
  @include b() {
    p {
      font-size: 12px;
    }
  }
}
.Ordh_container {
  width: 100%;
  outline: solid 1px black;
  background-color: white;

  .ord_condition_box {
    display: flex;
    justify-content: right;
  }
  @include b() {
    outline: none;
  }
}

.ord_sel {
  margin: 10px;
}

.ham {
  cursor: pointer;
  margin: 10px;
  margin-right: 7%;
  @include b() {
    display: none;
  }
}

.ord_history_box {
  outline: solid 1px gray;
  width: 90%;
  height: 50vh;
  margin: auto;
  padding-bottom: 10%;
  overflow: scroll;
  scrollbar-width: auto;
  scrollbar-color: #4673fb #ffffff;
  &::-webkit-scrollbar {
    width: 14px;
  }
  &::-webkit-scrollbar-track {
    background: transparent;
  }
  &::-webkit-scrollbar-thumb {
    background-color: #4673fb;
    border-radius: 10px;
    border: 3px solid #ffffff;
  }
  background-color: white;
  @include b() {
    width: 100%;
    outline: none;
  }
}
.ord_history_toplist {
  display: flex;
  justify-content: center;
  width: 80%;
  padding-left: 10%;
  @include b() {
    width: 100%;
    padding-left: 0%;
  }
}

#C {
  @include b() {
    display: none;
  }
}

#Q {
  @include b() {
    display: none;
  }
}

.ord_history_toplist_title {
  margin: 4%;
}

.content_row {
  width: 100%;
  display: flex;
  justify-content: center;
  outline: solid 1px gray;
  margin-bottom: 20px;
  @include b() {
    width: 100%;
    outline: none;
  }
  &:hover {
    background-color: $second_color;
    color: $main_color;
    cursor: pointer;
  }
}

.ord_history_content {
  margin: 3%;
  color: #444;
  justify-content: center;
  cursor: pointer;
}

.order_history_bottom {
  width: 100%;
  display: flex;
  justify-content: space-between;
  button {
    margin: 20px;
  }
}
.order_title {
  color: $secondary;
  @include font_set($second_font, $null, 900, italic);
  @include s() {
    font-size: 56px;
  }
  @include m() {
    font-size: 96px;
  }
}
.transport_detail {
  font-weight: bold;
  color: $main_color;
  text-decoration: underline;
}

.item_num {
  width: 90%;
  margin: 20px;
  background-color: $second_color;

  .page_photo {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: flex-end;

    .page_photo_box {
      display: flex;
    }
    .item_money {
      margin: 10px;
      text-align: right;
      p {
        margin: 10px;
      }
      h2 {
        margin: 10px;
        font-weight: bold;
        font-size: 18px;
      }
    }
  }
  .item_page_photo {
    width: fit-content;
    height: 200px;
    overflow: hidden;
    padding: 20px;
    display: flex;
  }
}

.item_num_row {
  display: flex;
  justify-content: space-between;
  width: 100%;
  .item_num_title {
    margin: 20px;
  }
  h2 {
    font-weight: bold;
    font-size: 20px;
    margin: 20px;
  }
}
</style>
