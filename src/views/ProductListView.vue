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
    data() {
        return {
            fakeproduct: [],
        };
    },
    methods: {
        getResource() {
            fetch("data/fakeproduct.json")
                .then((res) => res.json())
                .then((json) => (this.fakeproduct = json));
        },
        cut(x) {
            return x.split(",")[0];
        },
    },
    created() {
        this.getResource();
    },
};
</script>
<template>
    <div class="product_list">
        <ProductMenu />
        <BestSeller />
        <div class="divider"></div>
        <div class="leftright">
            <div class="Sidebar">
                <ProductSideMenu></ProductSideMenu>
                <HashTag></HashTag>
            </div>
            <div>
                <SearchBar />
                <div class="productCard_box">
                    <ProductCard
                        :title="e.product_name"
                        :price="e.unit_price"
                        :imgURL="cut(e.product_pic)"
                        v-for="e in fakeproduct"
                        :key="e.product_id"
                    />
                </div>
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