<template>
    <p class="title">我的收藏</p>
    <div class="data">
        <div class="decoration">#Favorite</div>

        <div class="card">
            <ProductCard
                :id="e.product_id"
                :title="e.product_name"
                :price="e.unit_price"
                :imgURL="cut(e.product_pic)"
                :clloect="e.coll"
                @clloectchange="collchange(e)"
                v-for="e in product"
                :key="e.product_id"
            />
            <div class="btnbox">
                <router-link to="/ProductList">
                    <button class="btn_s">去逛逛</button>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>
import { BASE_URL } from "@/assets/js/common.js";
import ProductCard from "@/components/product/ProductCard.vue";
export default {
    name: "Favorites",
    components: {
        ProductCard,
    },
    data() {
        return {
            product: [],
        };
    },
    methods: {
        collchange(e) {
            e.coll = !e.coll;
        },
        cut(x) {
            if (x) return x.split(",")[0];
        },
        getResource() {
            this.axios.get(`${BASE_URL}/favorlist.php`).then((response) => {
                this.product = response.data;
            });
            this.product.forEach((e) => {
                e.coll = false;
            });
        },

        collchange(e) {
            e.coll = !e.coll;
        },
    },
    created() {
        this.getResource();
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
        .btnbox {
            text-align: center;
            width: 100%;
            padding: 20px 0;
        }
    }
    .decoration {
        left: 20px;
        bottom: 20px;
        font-size: 72px;
        font-weight: bolder;
        font-style: italic;
        position: absolute;
        z-index: 1;
        color: $secondary;
        @include s() {
            display: none;
        }
    }
}
</style>
