<template>
    <div class="producut">
        <h1>This is a商品 page</h1>
        <ProductMenu />
        <BestSeller />
        <div class="hashtag">hashtag</div>
        <div class="divider"></div>
        <SearchBar />
        <div class="left_right">
            <div class="Sidebar">側邊欄</div>
            <div class="productCard_box">
                <ProductCard />
                <ProductCard />
                <ProductCard />
                <ProductCard />
            </div>
        </div>
        <!-- <Footer></Footer> -->
    </div>
</template>

<script>
import Footer from "@/components/Footer.vue";
import ProductMenu from "@/components/product/ProductMenu.vue";
import BestSeller from "@/components/product/BestSeller.vue";
import SearchBar from "@/components/product/SearchBar.vue";
import ProductCard from "@/components/product/ProductCard.vue";

export default {
    name: "Product",

    components: {
        Footer,
        ProductMenu,
        BestSeller,
        SearchBar,
        ProductCard,
    },
    props: {},
};
</script>
<style lang="scss" scoped>
.producut {
    max-width: $max-width;
    margin: auto;
    .hashtag {
        border: $line solid red;
    }
    .divider {
        width: 80%;
        margin: 10px auto;
        border-top: $line solid $title_color;
    }
    .productCard_box {
        display: flex;
        flex-wrap: wrap;
        & > * {
            @include s() {
                width: 50%;
            }
            @include m() {
                width: 33.333333%;
            }
        }
    }
}
</style>