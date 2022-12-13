<template>
  <!-- 會員 container -->
  <div class="mem_container">
    <!-- 側邊欄組件 -->
    <MemberSideMenu></MemberSideMenu>
    <!-- 右側會員資料-->
    <router-view/>
  </div>
</template>


<script>
import OverView from "@/views/myaccount/OverView.vue";
import MemberSideMenu from "@/components/MemberSideMenu.vue";
export default {
  name: "MyPage",
  components: {
    OverView,
    MemberSideMenu,
  }
};
</script>
<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
</style>