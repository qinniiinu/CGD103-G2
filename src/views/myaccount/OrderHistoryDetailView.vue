<template>
  <p class="title">#訂單紀錄細項</p>
  <router-view />
  <div class="data">
    <div class="Ordh_container">
      <!-- 訂單紀錄容器盒 -->
      <div v-if="orders.length" class="ord_detail_container">
        <h3 class="ord_title">訂單詳情</h3>
        <div class="ord_detail">
          <div class="ord_condition">
            <p>訂單編號：</p>
            <p>{{ orders[orders.length - 1].order_id }}</p>
          </div>
          <div class="ord_condition">
            <p>訂單狀態：</p>
            <p v-if="orders[orders.length - 1].order_con == 1">訂單取消</p>
            <p v-else-if="orders[orders.length - 1].order_con == 2">
              商品備貨中
            </p>
            <p v-else>商品已送達</p>
          </div>
          <div class="ord_condition">
            <p>收件人：{{ orders[orders.length - 1].ord_mem }}</p>
            <p>電話：{{ orders[orders.length - 1].ord_phone }}</p>
          </div>
        </div>
        <div class="ord_detail_second_row">
          <div class="ord_condition">
            <p>物流狀態：</p>
            <p><a href=""> 前往物流公司查看 </a></p>
          </div>
          <div class="ord_condition">
            <p>送件地址：{{ orders[orders.length - 1].ord_addr }}</p>
          </div>
        </div>
      </div>

      <div class="ord_recipt">
        <h3 class="ord_title">訂單明細</h3>
        <div v-for="e in order_item" :key="e[0].order_id" class="prod_item_row">
          <!-- 訂單商品列 -->
          <img
            class="prod_pic"
            :src="`https://tibamef2e.com/cgd103/g2/front/pic/${cut(
              e[0].product_pic
            )}`"
            alt=""
          />
          <div class="item_word">
            <div class="item_word_row">
              <div class="item_name">商品編號：{{ e[0].product_id }}</div>
              <div class="item_name">總金額${{ e[0].unit_price }}</div>
            </div>
            <div class="item_word_row">
              <div class="item_name">尺寸：{{ e[0].size }}</div>
              <div class="item_name">數量X {{ e[0].quantity }}</div>
            </div>
          </div>
        </div>

        <div v-if="orders.length" class="sum_money">
          <div class="money_detail">
            <li class="money_word">
              共{{
                Object.values(order_item).length
              }}種商品<!--  商品金額 {{}} -->
            </li>
            <li class="money_word">
              折扣折抵-{{ orders[orders.length - 1].discount }}
            </li>
            <li class="total_money">
              訂單總額 {{ orders[orders.length - 1].order_paid }}
            </li>
          </div>
        </div>
      </div>

      <!-- <div v-if="order_qa.length" class="ord_msg"> 只跑出一個欄位的寫法-->

      <div class="ord_msg">
        <h2 class="ord_title">
          訂單留言<span style="color: brown">　（歡迎在此詢問客服問題）</span>
        </h2>
        <div v-for="q in order_qa" :key="q[0].meg_id" class="ord_msg_box">
          <div class="msg_title">
            <h4 v-if="q[0].meg_status == 1">您的留言紀錄</h4>
            <h4 v-else>客服回應說明</h4>
            <div class="msg_time">留言時間：{{ q[0].meg_time }}</div>
          </div>
          <!-- 回覆內容 -->
          <h3>
            {{ q[0].meg_cont }}
          </h3>
        </div>
        <!-- <div class="ord_msg_box">
					<div class="msg_title">
						<h4>客服回覆狀態</h4> 
						<div class="msg_time">回覆時間：{{q.meg_time}}</div>
					</div>
					<h3>
						{{q.meg_cont}}
					</h3>
				</div> -->
        <form
          class="ord_msg_box"
          id="insert_msg"
          method="post"
          enctype="multipart/form-data"
        >
          <div class="msg_title">
            <h3>您的留言</h3>
          </div>
          <input
            class="text_box"
            id="meg_cont"
            name="meg_cont"
            type="textarea"
            placeholder="親愛的客人歡迎在此留言詢問問題"
          />
          <div class="msg_button_container">
            <button type="" class="btn_ms">取消</button>
            <button type="button" class="btn_ml" @click="insert">送出</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="order_back">
    <router-link to="/MyPage/OrderHistory"
      ><!-- 返回鍵 -->
      <button class="btn_l">返回</button>
    </router-link>
  </div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
import Button from "@/components/Button.vue";
export default {
  name: "OrderHistoryDetail",
  components: {
    Button,
  },
  data() {
    return {
      orders: [],
      order_item: [], //要符合資料庫表單名稱
      order_qa: [],
    };
  },
  methods: {
    getResource() {
      this.axios
        .get(`${BASE_URL}/getOrderDetail.php`, { credentials: "include" })
        // .get(`${BASE_URL}/getOrderDetail.php`, { credentials: "include" })
        .then((response) => {
          console.log("-----------", response.data);
          this.orders = response.data;

          // this.temp = response.data.find((e) => {
          //   console.log(e);
          //   if (e.order_id == this.$route.params.id) return e;
          // });
          // this.getRandomItems(response.data, this.$route.params.id);

          //嘗試連到每筆訂單的路由

          const groupBy = (array, key) =>
            array.reduce((objectsByKeyValue, obj) => {
              const value = obj[key];
              objectsByKeyValue[value] = (
                objectsByKeyValue[value] || []
              ).concat(obj);
              return objectsByKeyValue;
            }, {});

          this.orders = this.orders.filter((e) => {
            return e.order_id == this.$route.params.id;
          });

          this.order_item = groupBy(this.orders, "product_id");
          this.order_qa = groupBy(this.orders, "meg_cont");
        });
    },
    cut(x) {
      if (x) return x.split(",")[0];
    },
    insert() {
      if (!this.meg_cont) {
        alert("輸入成功！");
        let myVue = this;
        fetch(`/api_server/msgInsert.php`, {
          method: "post",
          body: new FormData(document.getElementById("insert_msg")),
        })
          .then((res) => res.json())
          .then((json) => {
            console.log("===========");
            console.log(json);
            myVue.getResource();
          });
      }
    },
  },
  mounted() {
    this.getResource();
  },
};
</script>

<style lang="scss" scoped>
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

.Ordh_container {
  width: 100%;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.ord_detail_container {
  width: 100%;
  background-color: white;
  //   border: 1px solid rgb(162, 162, 162);
  padding: 20px;
  p {
    text-align: left;
    font-size: 16px;
  }
  @include b() {
    padding: 15px;

    display: block;
    border: 0;
    padding: 0px;
  }
}

.ord_title {
  color: #444;
  font-weight: bold;
  padding: 20px;
}

.ord_detail {
  display: flex;
  width: 100%;
  justify-content: space-around;
  @include b() {
    display: block;
  }
}

.ord_detail_second_row {
  display: flex;
  width: 100%;
  justify-content: space-around;

  @include b() {
    display: block;
  }
}

p {
  margin: 5px;
  color: #444;
  font-size: 16px;
}
.ord_condition {
  display: flex;
  margin: 10px;
}

/* 訂單明細 */
.ord_recipt {
  width: 100%;
  margin-top: 50px;
  background-color: white;
  //   border: 1px solid rgb(162, 162, 162);
  padding: 20px;
  @include b() {
    border: 0;
    padding: 0px;

    p {
      font-size: 12px;
    }
  }
}

.prod_item_row {
  display: flex;
  justify-content: center;
  .item_word {
    display: flex;
    .item_word_row {
      display: flex;
      text-align: left;
      @include b() {
        display: block;
      }
    }
  }

  // .item_block{
  // 	@include b(){
  // display:flex;
  // justify-content: space-between;
  // }
  // }
}
.prod_pic {
  width: 100px;
  height: 100px;
  margin: 20px;
}

.item_name {
  margin: 20px;
  color: #444;
  @include b() {
    margin: 0px;
  }
}

.prod_item_row {
  // display: flex;
  align-items: center;
  background-color: white;
}
.sum_money {
  width: 100%;
  display: flex;
  justify-content: right;
  list-style: none;
}

li {
  margin: 20px;
  color: #444;
}
.money_detail {
  text-align: right;
}

/* 訂單留言 */
.ord_msg {
  width: 100%;
  background-color: white;
  //   border: 1px solid rgb(162, 162, 162);
  margin-top: 50px;
  display: flex;
  justify-content: space-around;
  flex-direction: column;
  align-items: center;
  .ord_msg_box {
    margin-top: 50px;
    width: 600px;
    @include b() {
      width: 100%;
    }
  }
  @include b() {
    display: block;
    border: 0;
  }
}

.text_box {
  width: 90%;
  margin: auto;
  height: 200px;

  .text_box:last-child {
    height: 100px;
  }
}

.msg_title {
  width: 100%;
  display: flex;
}

h3 {
  color: #444;
  margin: 5px;
}

.msg_time {
  margin-left: 30px;
  color: #444;
}

.msg_button_container {
  display: flex;
  justify-content: right;
  margin: 20px;
  padding-right: 30px;
  @include b() {
    padding-right: 5px;
  }
}

.sm-b {
  margin: 20px;
  height: 50px;
  width: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 20px;
}
.order_back {
  display: flex;
  width: 100%;
  margin-top: 30px;
  justify-content: right;
  @include b() {
    margin-right: 5px;
    margin-top: 0;
  }
}
</style>
