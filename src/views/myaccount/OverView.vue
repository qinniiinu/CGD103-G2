<template>
  <p class="title">{{member.mem_name}}, 歡迎回來</p>
    <div class="data">
      <!-- 這裡開始寫 -->
      <div class="box">
        <!-- 我的身型、我的風格 -->
        <MemCard></MemCard>
      <div class="other_card">
        <SmallCard title="帳號資料" Bgtag="#ACCOUNT" more="編輯" class="account"
          >內容
          <router-link to="/MemMaintain" class="more">
            <span class="text">查看更多</span>
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </router-link>
        </SmallCard>
        <SmallCard title="風格諮詢" Bgtag="#CONSULT" more="立即諮詢" class="consult"
          >內容
          <router-link to="/MyPage/Consultation" class="more">
            <span class="text">查看更多</span>
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </router-link>
        </SmallCard>
        <SmallCard title="訂閱服務" Bgtag="#PREMIUM" more="更改訂閱" class="premium"
          >內容
          <router-link to="/MyPage/memSubscription" class="more">
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
import SmallCard from "@/components/mypage/SmallCard.vue";
import OrderCard from "@/components/mypage/OrderCard.vue";
import OrdHisCard from "@/components/mypage/OrdHisCard.vue";
import MySave from "@/components/mypage/MySave.vue";
export default {
  name: "OverView",
  components: {
    MemCard,
    SmallCard,
    OrderCard,
    OrdHisCard,
    MySave,
  },
  data() {
    return {
      member:{},
    };
  },
  mounted(){
    this.axios.get('/api_server/memberInfo.php')
    .then(res => this.member = res.data)
    .catch(error =>console.log(error));
  }  
};
</script>
<style lang="scss" scoped>

.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}
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


</style>
