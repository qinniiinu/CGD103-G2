<script>
import ProductMenu from "@/components/product/ProductMenu.vue";
import BestSeller from "@/components/product/BestSeller.vue";
import SearchBar from "@/components/product/SearchBar.vue";
import ProductCard from "@/components/product/ProductCard.vue";
import ProductSideMenu from "@/components/product/ProductSideMenu.vue";
import HashTag from "@/components/product/HashTag.vue";
export default {
    name: "Product",
    components: {
        ProductMenu,
        BestSeller,
        SearchBar,
        ProductCard,
        ProductSideMenu,
        HashTag,
    },
};
</script>
<template>
    <div class="product_list">
        <ProductMenu />
        <BestSeller />
        <div class="divider"></div>
        <SearchBar />
        <div class="leftright">
            <div class="Sidebar">
                <ProductSideMenu></ProductSideMenu>
                <HashTag></HashTag>
            </div>
            <div class="productCard_box">
                <ProductCard />
                <ProductCard />
                <ProductCard />
                <ProductCard />
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.product_list {
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
    .leftright {
        @include m() {
            display: flex;
        }
        .productCard_box {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
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
}
</style>