<template>
    <p class="title">我的收藏</p>
    <div class="data">
        <!-- 這裡開始寫 -->
        <div class="card">
            <productCard></productCard>
            <productCard></productCard>
            <productCard></productCard>
            <productCard></productCard>
            <productCard></productCard>
            <productCard></productCard>
            <productCard></productCard>
            <productCard></productCard>
        </div>
        <div class="decoration">#Favorite</div>
    </div>
</template>
<script>
import productCard from "@/components/product/ProductCard.vue";
export default {
    name: "Favorites",
    components: {
        productCard,
    },
};
</script>

<style lang="scss" scoped>
.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
}
.mem_container {
    background-color: $bg_gray;
}
.data {
    display: flex;
    justify-content: center;
    position: relative;
    .card {
        width: 100%;
        min-height: 600px;
        background-color: #fff;
        border: 1px solid $text_color;
        display: flex;
        flex-wrap: wrap;
        .product_card {
            @include s() {
                width: 50%;
            }
            @include m() {
                width: 33.333333%;
            }
        }
    }
    .decoration {
        left: 20px;
        bottom: 20px;
        font-size: 72px;
        font-weight: bolder;
        font-style: italic;
        position: absolute;
        z-index: -1;
        color: $secondary;
        @include s() {
            display: none;
        }
    }
}
</style>
