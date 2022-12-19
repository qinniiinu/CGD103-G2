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
            product: [],
        };
    },
    computed: {
        resultproduct() {
            if (location.search != "") {
                console.log(location.search != "");
                this.scrollBlock();
                if (!this.$route.query.M) {
                    switch (this.$route.query.G) {
                        case "0":
                            return this.product.filter((e) => {
                                return e.product_gender == 0;
                            });
                            break;
                        case "1":
                            return this.product.filter((e) => {
                                return e.product_gender == 1;
                            });
                            break;

                        default:
                            return this.product;
                    }
                } else {
                    return this.product.filter((e) => {
                        if (!this.$route.query.T)
                            return (
                                e.product_gender == this.$route.query.G &&
                                e.product_maintype == this.$route.query.M
                            );
                        else {
                            return (
                                e.product_gender == this.$route.query.G &&
                                e.product_maintype == this.$route.query.M &&
                                e.product_type == this.$route.query.T
                            );
                        }
                    });
                }
            } else {
                return this.product;
            }
        },
    },
    methods: {
        scrollBlock() {
            const box = this.$refs.sectionlist;
            window.scrollTo({
                top: box?.offsetTop,
                behavior: "smooth",
            });
        },
        getResource() {
            this.axios.get("/api_server/list.php").then((response) => {
                this.product = response.data;
            });
        },
        cut(x) {
            if (x) return x.split(",")[0];
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
        <div class="divider" ref="sectionlist"></div>
        <div class="leftright">
            <div class="Sidebar">
                <ProductSideMenu></ProductSideMenu>
                <HashTag></HashTag>
            </div>
            <div id="list">
                <SearchBar />
                <div class="productCard_box">
                    <ProductCard
                        :id="e.product_id"
                        :title="e.product_name"
                        :price="e.unit_price"
                        :imgURL="cut(e.product_pic)"
                        v-for="e in resultproduct"
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