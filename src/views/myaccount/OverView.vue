<template>
  <p class="title">Costomer, 歡迎回來</p>
  <div class="data">
    <!-- 這裡開始寫 -->
    <div class="box">
      <MemCard title="我的身型" class="card">
        <template #pic>
          <img class="type_pic" src="body_hourglass.png" alt="body.type1" />
        </template>
        <type-tag :TypeTag="bodytypes.type1" class="type_tag"></type-tag>
        <bg-tag :Bgtag="body.type1" class="bgtag"></bg-tag>
        <router-link to="/BodyType" class="more">
          <span class="text">查看更多</span>
          <font-awesome-icon icon="fa-solid fa-angle-right" />
        </router-link>
      </MemCard>
      <MemCard title="我的風格" class="card">
        <template #pic>
          <img class="type_pic" src="hipster2.png" alt="styletypes.type1" />
        </template>
        <type-tag :TypeTag="styletypes.type1" class="type_tag"></type-tag>
        <bg-tag :Bgtag="body.type1" class="bgtag"></bg-tag>
        <router-link to="/memQuiz" class="more">
          <span class="text">查看更多</span>
          <font-awesome-icon icon="fa-solid fa-angle-right" />
        </router-link>
      </MemCard>

      <div class="other_card">
        <SmallCard title="帳號資料" Bgtag="#ACCOUNT" more="編輯" class="account"
          >內容
          <router-link to="/MemMaintain" class="more">
            <span class="text">查看更多</span>
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </router-link>
        </SmallCard>
        <SmallCard
          title="風格諮詢"
          Bgtag="#CONSULT"
          more="立即諮詢"
          class="consult"
          >內容
          <router-link to="/Consultation" class="more">
            <span class="text">查看更多</span>
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </router-link>
        </SmallCard>
        <SmallCard
          title="訂閱服務"
          Bgtag="#PREMIUM"
          more="更改訂閱"
          class="premium"
          >內容
          <router-link to="/memSubscription" class="more">
            <span class="text">查看更多</span>
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </router-link>
        </SmallCard>
        <OrderCard title="訂單紀錄" class="order">
          <OrdHisCard></OrdHisCard>
        </OrderCard>
      </div>
      <MySave></MySave>
    </div>
  </div>
</template>

<script>
import MemCard from "@/components/mypage/MemCard.vue";
import BgTag from "@/components/mypage/BgTag.vue";
import TypeTag from "@/components/mypage/TypeTag.vue";
import SmallCard from "@/components/mypage/SmallCard.vue";
import OrderCard from "@/components/mypage/OrderCard.vue";
import OrdHisCard from "@/components/mypage/OrdHisCard.vue";
import MySave from "@/components/mypage/MySave.vue";
export default {
  name: "OverView",
  components: {
    MemCard,
    BgTag,
    TypeTag,
    SmallCard,
    OrderCard,
    OrdHisCard,
    MySave,
  },
  data() {
    return {
      bodytypes: {
        type1: "沙漏型",
        type2: "222",
        type3: "333",
        type4: "444",
      },
      styletypes: {
        type1: "文青風",
        type2: "222",
        type3: "333",
        type4: "444",
      },
      body: {
        type1: "HOURGLASS",
        type2: "222",
        type3: "333",
        type4: "444",
      },
      style: {
        type1: "VINTAGE",
        type2: "222",
        type3: "333",
        type4: "444",
      },
    };
  },
};
</script>
<style lang="scss" scoped>

.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}

.box {
  .more {
    display: flex;
    position: absolute;
    align-items: center;
    right: $padding;
    bottom: $padding;
    .text {
      font-family: $main_font;
      padding-right: 5px;
    }
  }
  .card {
    margin-block: 25px;
    .type_tag {
      display: block;
      margin: auto;
      @include s() {
        font-size: 30px;
      }
    }
    .bgtag {
      display: block;
      position: absolute;
      right: $padding;
      @include s() {
        font-size: 40px;
      }
    }
    .type_pic {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
  .other_card {
    width: 100%;
    min-height: max-content;
    display: grid;
    grid-template-columns: 50% 2fr;
    grid-template-rows: 1 3fr;
    gap: 25px;
    .account {
      grid-area: 1 / 1 / 2 / 2;
      @include s() {
        grid-area: 1/1/2/3;
      }
    }
    .consult {
      grid-area: 2 / 1 / 3 / 2;
      @include s() {
        grid-area: 2/1/3/3;
      }
    }
    .premium {
      grid-area: 3 / 1 / 4 / 2;
      @include s() {
        grid-area: 3/1/4/3;
      }
    }
    .order {
      grid-area: 1 / 2 / 4 / 3;
      @include s() {
        grid-area: 4/1/5/3;
        padding: 20px;
      }
    }
    @include s() {
      grid-template-rows: 1 4fr;
    }
  }
}
</style>
