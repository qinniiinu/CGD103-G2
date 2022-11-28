<script>
const productside = [
    {
        name: "上衣",
        children: [
            { name: "短袖" },
            { name: "長袖" },
            { name: "外套" },
            { name: "背心" },
        ],
    },
    {
        name: "下身",
        children: [{ name: "長褲" }, { name: "短褲" }, { name: "裙子" }],
    },
    {
        name: "套裝",
        children: [{ name: "洋裝" }, { name: "連身褲裝" }, { name: "兩件式" }],
    },
    {
        name: "鞋款",
        children: [{ name: "休閒鞋" }, { name: "跟鞋" }, { name: "運動鞋" }],
    },
    {
        name: "配件",
        children: [
            { name: "包包" },
            { name: "圍巾手套" },
            { name: "帽子" },
            { name: "皮帶" },
            { name: "配件" },
            { name: "襪子" },
        ],
    },
];
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