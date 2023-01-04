<template>
    <!-- 側邊欄組件 -->
    <MemberSideMenu>
    <!-- 右側會員資料-->
    <router-view/>
    </MemberSideMenu>
</template>


<script>
import MemberSideMenu from "@/components/MemberSideMenu.vue";

export default {
  name: "MyPage",
  components: {
    MemberSideMenu,
  }
};
</script>
<style lang="scss" scoped>

</style>