<script>
import { BASE_URL } from "@/assets/js/common.js";
import ProductMenu from "@/components/product/ProductMenu.vue";
import BestSeller from "@/components/product/BestSeller.vue";
import SearchBar from "@/components/product/SearchBar.vue";
import ProductCard from "@/components/product/ProductCard.vue";
import ProductSideMenu from "@/components/product/ProductSideMenu.vue";
import HashTag from "@/components/product/HashTag.vue";
import Breadcrumb from "@/components/product/Breadcrumb.vue";

export default {
    name: "Product",
    components: {
        ProductMenu,
        BestSeller,
        SearchBar,
        ProductCard,
        ProductSideMenu,
        HashTag,
        Breadcrumb,
    },
    data() {
        return {
            sortinput: "",
            searchinput: "",
            tmp: [],
            product: [],
            favorite: [],
        };
    },
    computed: {
        bread() {
            let arr = [{ name: "商品總覽", link: "/productlist" }];
            if (JSON.stringify(this.$route.query) == "{}") {
                return arr;
            }
            if (this.$route.query.G) {
                let gender = this.$route.query.G == 1 ? "男裝" : "女裝";

                arr.push({
                    name: gender,
                    link: `/productlist?G=${this.$route.query.G}`,
                });
            }
            if (this.$route.query.M) {
                arr.push({
                    name: this.$route.query.M,
                    link: `/productlist?G=${this.$route.query.G}&M=${this.$route.query.M}`,
                });
            }
            if (this.$route.query.T) {
                arr.push({
                    name: this.$route.query.T,
                    link: `/productlist?G=${this.$route.query.G}&M=${this.$route.query.M}&T=${this.$route.query.T}`,
                });
            }
            if (this.$route.query.S) {
                arr.push({
                    name: `搜尋關鍵字：` + this.$route.query.S,
                    link: `/productlist?S=${this.$route.query.S}`,
                });
            }

            return arr;
        },
    },
    watch: {
        $route: function () {
            if (JSON.stringify(this.$route.query) == "{}") {
                this.getResource();
            }
        },
    },
    methods: {
        search(val) {
            const query_current = location.search;

            if (val != "") {
                this.product = this.product.filter((e) => {
                    if (JSON.stringify(e).indexOf(val) !== -1) {
                        return e;
                    }
                });
                this.$router.push(`/productlist?S=${val}`);
            } else {
                this.$router.push(`/productlist?${query_current}`);
            }
        },
        sort(val) {
            if (val == "StoB") {
                this.product = this.product.sort(function (a, b) {
                    return a.unit_price - b.unit_price;
                });
            } else {
                this.product = this.product.sort(function (a, b) {
                    return b.unit_price - a.unit_price;
                });
            }
        },
        resultproduct() {
            if (location.search !== "") {
                this.scrollBlock();
                let result = this.tmp;
                if (this.$route.query.G) {
                    this.product = this.product.filter((e) => {
                        return e.product_gender == this.$route.query.G;
                    });
                }
                if (this.$route.query.M) {
                    this.product = this.product.filter((e) => {
                        return e.product_maintype == this.$route.query.M;
                    });
                }
                if (this.$route.query.T) {
                    this.product = this.product.filter((e) => {
                        return e.product_type == this.$route.query.T;
                    });
                }
                if (this.$route.query.S) {
                    this.product = this.product.filter((e) => {
                        if (
                            JSON.stringify(e).indexOf(this.$route.query.S) !==
                            -1
                        ) {
                            return e;
                        }
                    });
                }
            } else {
                this.product = this.tmp;
            }
        },
        scrollBlock() {
            console.log(window.innerWidth);
            const height =
                window.innerWidth >= 500 ? 650 : window.innerWidth * 0.85;
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
        getResource() {
            this.axios.get(`${BASE_URL}/list.php`).then((response) => {
                this.tmp = response.data;
                this.tmp.forEach((e) => {
                    e.coll = false;
                });
                this.tmp.forEach((item1) => {
                    this.favorite.forEach((item2) => {
                        if (item1.product_id === item2.product_id) {
                            item1.coll = true;
                        }
                    });
                });
                this.product = this.tmp;
                this.resultproduct();
            });
        },
        getFavorite() {
            this.axios.get(`${BASE_URL}/collect_prod.php`).then((response) => {
                this.favorite = response.data;
            });
        },
        cut(x) {
            if (x) return x.split(",")[0];
        },
        collchange(e) {
            e.coll = !e.coll;
        },
    },
    created() {
        this.getFavorite();
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
            <div id="list">
                <div class="leftright space_between">
                    <Breadcrumb :arr="bread"></Breadcrumb>
                    <SearchBar @update:searchVal="search" @update:sort="sort" />
                </div>

                <div class="productCard_box">
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
        .Sidebar {
            @include m() {
                width: 200px;
            }
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
        #list {
            @include m {
                width: calc(100% - 200px);
            }
        }
    }
}

.space_between {
    justify-content: space-between;
    flex-wrap: wrap;
}
.searchbar {
    align-items: flex-end;
}
</style>