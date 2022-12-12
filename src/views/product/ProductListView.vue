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
            this.axios.get("data/fakeproduct.json").then((response) => {
                this.fakeproduct = response.data;
                console.log(this.fakeproduct);
            });
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
        <div class="left_right bestseller_box">
            <img src="@/assets/product/bestseller_01.jpg" alt="" />
            <img src="@/assets/product/bestseller_02.jpg" alt="" />
        </div>
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
                        :id="e.product_id"
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

    .bestseller_box {
        @include s() {
            display: none;
        }
        @include m() {
            & > img {
                width: 50%;
            }
        }
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