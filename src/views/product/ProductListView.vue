<script>
import Slider from "@vueform/slider";

import { BASE_URL } from "@/assets/js/common.js";
import BestSeller from "@/components/product/BestSeller.vue";
import SearchBar from "@/components/product/SearchBar.vue";
import ProductSideMenu from "@/components/product/ProductSideMenu.vue";
import Breadcrumb from "@/components/product/Breadcrumb.vue";

export default {
    name: "Product",
    components: {
        BestSeller,
        SearchBar,
        ProductSideMenu,
        Breadcrumb,
        Slider,
    },
    data() {
        return {
            loading: null,
            haveProduct: true,
            searchVal: "",
            sortVal: "",

            tmp: null,
            product: null,
            result: [],
            favorite: [],

            value: [1, 5000],
            format: {
                prefix: "$",
                decimals: 0,
            },
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
            this.product = this.tmp;
            this.searchVal = this.sortVal = "";
            this.value = [1, 5000];
            this.resultproduct();
            this.price_filter();
        },
        value: function () {
            this.price_filter();
            this.sort(this.sortVal);
        },
    },
    methods: {
        price_filter() {
            this.result = this.product.filter((e) => {
                if (
                    e.unit_price >= this.value[0] &&
                    e.unit_price <= this.value[1]
                ) {
                    return e;
                }
            });
        },
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
                this.result = this.result.sort(function (a, b) {
                    return a.unit_price - b.unit_price;
                });
            } else if (val == "BtoS") {
                this.result = this.result.sort(function (a, b) {
                    return b.unit_price - a.unit_price;
                });
            }
        },
        resultproduct() {
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
                    if (JSON.stringify(e).indexOf(this.$route.query.S) !== -1) {
                        return e;
                    }
                });
            }
            if (this.product.length < 1) this.haveProduct = false;
            else this.haveProduct = true;
        },
        scrollBlock() {
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
                this.price_filter();

                if (this.product.length < 1) this.haveProduct = false;
                else this.haveProduct = true;
            });
        },
        getFavorite() {
            this.axios
                .get(`${BASE_URL}/collect_prod.php`, { credentials: "include" })
                .then((response) => {
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
    mounted() {
        this.loading = 1;
    },
};
</script>
<template>
    <div class="product_list">
        <ProductMenu />
        <div class="left_right bestseller_box">
            <img src="@/assets/product/bestseller_02.jpg" alt="" />
            <img src="@/assets/product/bestseller_01.jpg" alt="" />
        </div>
        <BestSeller />
        <div class="divider"></div>
        <div class="leftright">
            <div class="Sidebar">
                <ProductSideMenu @price="price_filter(val)"></ProductSideMenu>
                <Slider
                    v-model="value"
                    class="slider-blue"
                    :format="format"
                    :max="5000"
                />
            </div>
            <div id="list">
                <div class="leftright space_between .mb_30">
                    <Breadcrumb :arr="bread"></Breadcrumb>
                    <SearchBar
                        v-model:searchVal="searchVal"
                        v-model:sort="sortVal"
                        @update:searchVal="search"
                        @update:sort="sort"
                    />
                </div>

                <div
                    v-if="loading == 1 && haveProduct == false"
                    class="productCard_box"
                >
                    <p class="center">很抱歉，商品類別已售完。</p>
                </div>
                <div class="center" v-if="!product">
                    <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="spinner"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        data-v-21982b1c=""
                    >
                        <path
                            class=""
                            fill="currentColor"
                            d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z"
                        ></path>
                    </svg>
                </div>
                <div class="productCard_box" v-if="product">
                    <ProductCard
                        :id="e.product_id"
                        :title="e.product_name"
                        :price="e.unit_price"
                        :imgURL="cut(e.product_pic)"
                        :clloect="e.coll"
                        @clloectchange="collchange(e)"
                        v-for="e in result"
                        :key="e.product_id"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.productMenuOutside {
    @include m() {
        display: none;
    }
}
.slider-blue {
    --slider-connect-bg: #495bff;
    --slider-tooltip-bg: #495bff;
    --slider-handle-ring-color: #3b82f630;
    margin: 50px 20px 10px;
}
@import url(@vueform/slider/themes/default.scss);
.Sidebar {
    @include s() {
        display: none;
    }
}
.product_list {
    max-width: $max-width;
    margin: auto;
    margin-bottom: 30px;

    .bestseller_box {
        @include xs() {
            display: none;
        }
        @include ss() {
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
            .center {
                width: 100%;
                text-align: center;
            }

            & > * {
                @include s() {
                    width: 33.333333%;
                }
                @include xs() {
                    width: 50%;
                }

                @include m() {
                    width: 33.333333%;
                }
                @include xl() {
                    width: 25%;
                }
            }
        }
        .center {
            width: 100px;
            margin: auto;
            svg {
                width: 100px;
                animation: loading 1.5s infinite linear;
            }

            @keyframes loading {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
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
}
.searchbar {
    align-items: flex-end;
}
.mb_30 {
    padding-bottom: 30px;
}
</style>