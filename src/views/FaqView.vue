<template>
  <div class="data">
    <button class="menu-toggle" @click="ToggleMenu">
      <font-awesome-icon
        class="material-icons"
        icon="fa-solid fa-arrow-right"
      />
    </button>

    <div class="asideBar" :class="`${is_expanded ? 'is-expanded' : ''}`">
      <!-- 側邊欄 -->

      <div class="menu-toggle-wrap">
        <!-- 側邊欄按鍵 -->

        <div class="titleBox">
          <h1>退換貨須知</h1>
          <h2>購物問題</h2>
          <h2>取消訂閱</h2>
          <h2>確認衣物</h2>
          <h2>合作店面</h2>
          <h2>聯絡方式</h2>
        </div>
      </div>
    </div>

    <div class="FAQ">
      <!-- 常見問題 -->
      <div class="FAQbox">
        <div class="order_title">#FAQ</div>
        <h1>常見問題</h1>

        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
          nobis sed dolorem quasi, consequuntur
        </p>
      </div>
      <div class="FAQContainer">
        <ul class="FAQRow">
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q1 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q2 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q3 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q4 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q5 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q6 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q7 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
          <li class="FAQLine">
            <div class="QA" tabindex="0">
              <div class="QABox">
                <p>Q8 如何退換商品</p>
                <font-awesome-icon class="icon" icon="fa-solid fa-plus" />
              </div>
              <div class="block">
                <p>
                  在取得商品後未經剪標、清洗過，穿著過後，即發現商品有瑕疵，GU將協助退換貨。退換貨規則如下：
                  【於網路商店購買的商品】
                  煩請您提供以下資訊寄信到客服信箱gutw_contactus@gu-global.com
                  我們將於24小時內回覆您，造成不便，敬請見諒。 1. 訂單編號： 2.
                  描述商品狀況並附檔提供圖片： 3.
                  商品編號(洗滌標籤上的一串數字，例：331-123456)： 4.
                  商品平常保管方式： 5.
                  商品是否仍全新(吊牌未剪、未下水、包裝完整)： 6.
                  希望處理的方式(退貨/換貨)：
                  　※商品非全新狀態，再請提供以下資訊。 7. 洗滌次數： 8.
                  洗衣機/手洗： 9. 有無使用洗衣袋： 10.
                  晾乾的方式(吊掛/平舖、曝曬/陰乾)： 11. 商品穿著的次數：
                </p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import logoURL from "../assets/logo.png";
const is_expanded = ref(localStorage.getItem("is_expanded") === "true");
const ToggleMenu = () => {
  is_expanded.value = !is_expanded.value;
  localStorage.setItem("is_expanded", is_expanded.value);
};
</script>


<script>
import Header from "@/components/Header.vue";
import Button from "@/components/Button.vue";

export default {
  name: "Faq",
  components: {
    Header,
    Button,
  },
  data() {
    return {
      isShow: true,
    };
  },
};
</script>


<style lang="scss" scoped>
@import "@/assets/sass/main";

@mixin b() {
  @media screen and (max-width: 1023px) {
    @content;
  }
}

button {
  border-radius: 50px;
  width: 50px;
  height: 50px;
  margin-top: 7vh;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.5 ease;
  position: fixed;
  z-index: 99;
  background-color: $main_color;
  color: $second_color;
  border: 0;
  &:hover {
    transform: rotate(-180deg);
  }
  cursor: pointer;
  transition: all 0.5 ease-in-out;
  display: none;
  @include b() {
    display: block;
  }
}
.data {
  display: flex;
  margin: auto;
  width: 100%;
  max-width: 1200px;
}

.is-expanded {
  transition: all 0.5 ease-in-out;

  .menu-toggle-wrap {
    top: -3rem;
    display: none;
    // color: $second_color;
    // background-color: $second_color;
  }
}

.asideBar {
  position: absolute;
  height: 800px;
  transition: 1s ease-out;
  overflow: hidden;
  background-color: transparent;
  @include b() {
    background-color: $second_color;
  }
}
//   @include b() {
//     display: none;
//   }
.titleBox {
  min-width: 300px;
  width: 100%;
  margin-top: 17vh;

  h1 {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-right: 60px;
  }
  h2 {
    margin-left: 4rem;
    font-size: 18px;
    margin: 30px;
    text-align: center;
  }
}

.FAQ {
  width: 70%;
  margin-left: 20%;
  margin-top: 100px;
  margin-bottom: 20vh;
  h1 {
    font-size: 60px;
    margin: 10px;
    font-weight: bold;
    @include b() {
      display: block;
      font-size: 40px;
    }
  }
  p {
    margin: 10px;
    line-height: 1.5em;
    width: 100%;
  }
  .order_title {
    color: rgb(156, 156, 167);
    @include font_set($second_font, $null, 900, italic);
    @include s() {
      font-size: 56px;
    }
    @include m() {
      font-size: 96px;
    }
    position: absolute;
    z-index: -1;
    left: 60%;

    font-size: 120px;
    opacity: 0.5;
  }
}

.FAQContainer {
  .FAQLine {
    &:focus {
      height: 500px;
      transition: all 0.5s;
    }
  }
  .QA {
    width: 100%;
    border: solid 1px rgb(155, 155, 155);
    overflow: hidden;
    height: 4rem;
    align-items: center;
    justify-content: space-between;
    &:focus {
      height: 300px;
      transition: all 0.5s;
      @include b() {
        height: 500px;
      }
    }
    &:focus .icon {
      transform: rotate(-45deg);
      transition: transform 0.5s 0s;
    }
    .QABox {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      &:hover {
        background-color: $main_color;
        color: white;
        .icon {
          color: #eceeff;
        }
      }
      &:focus {
        background-color: blue;
      }
      display: flex;

      p {
        font-size: 30px;
        font-weight: bold;
        @include b() {
          font-size: 20px;
        }
      }
      .icon {
        color: blue;
        margin-right: 5%;
      }
    }
    .block {
      width: 100%;
      margin-top: 0px;

      p {
        width: 90%;
      }
    }
  }
}
</style>