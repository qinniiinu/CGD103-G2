<template>
    <div class="product">
        <ProductMenu />
    </div>

    <div class="coverBox">
        <div class="coverBox1">
            <img src="@/assets/product/productCover_01.jpg" alt="" />
        </div>
        <div class="coverBox2">
            <img src="@/assets/product/productCover_02.jpg" alt="" />
        </div>
        <div class="coverBox3">
            <img src="@/assets/product/productCover_03.jpg" alt="" />
        </div>
    </div>
    <div class="titleBoxOutside">
        <div class="titleBox">
            <p class="main">線上試衣自由配</p>
            <p class="sub">你的穿搭由你定義</p>
        </div>
    </div>

    <div class="block fitting">
        <div class="view">
            <div class="Box fitting">
                <div class="clothes">
                    <img src="@/assets/product/fittung_01.png" />
                </div>
                <div class="clothes">
                    <img src="@/assets/product/fittung_02.png" />
                </div>
                <div class="clothes">
                    <ProductFitting></ProductFitting>
                </div>
                <div class="clothes">
                    <img src="@/assets/product/fittung_03.png" />
                </div>
                <div class="clothes">
                    <img src="@/assets/product/fittung_04.png" />
                </div>
            </div>
        </div>
    </div>
    <div class="buttonBox">
        <router-link to="FittingRoom">
            <button class="btn_s">試衣去</button>
        </router-link>
    </div>
    <div class="titleBoxOutside">
        <div class="titleBox">
            <p class="main">一周穿搭</p>
            <p class="sub">YOUR WEEKLY LOOKBOOK</p>
        </div>
    </div>
    <div class="block weekly">
        <div class="view">
            <div class="Box weekly">
                <div class="clothes">
                    <img src="@/assets/product/weekly.png" />
                </div>
            </div>
        </div>
    </div>
    <div class="buttonBox">
        <router-link to="WeeklyWear">
            <button class="btn_s">看穿搭</button>
        </router-link>
    </div>
    <div class="titleBoxOutside">
        <div class="titleBox">
            <p class="main">本周熱銷</p>
            <p class="sub">HOT THIS WEEK</p>
        </div>
    </div>
    <div class="productlist">
        <div class="Box">
            <ProductCard
                :id="e.product_id"
                :title="e.product_name"
                :price="e.unit_price"
                :imgURL="cut(e.product_pic)"
                v-for="e in product"
                :key="e.product_id"
            />
        </div>
    </div>
    <div class="buttonBox">
        <router-link to="ProductList">
            <button class="btn_s">去逛逛</button>
        </router-link>
    </div>
</template>

<script>
import ProductMenu from "@/components/product/ProductMenu.vue";
import ProductCard from "@/components/product/ProductCard.vue";
import ProductFitting from "@/components/product/ProductFitting.vue";

export default {
    name: "Product",

    components: {
        ProductMenu,
        ProductCard,
        ProductFitting,
    },
    data() {
        return {
            product: [],
        };
    },

    methods: {
        cut(x) {
            if (x) return x.split(",")[0];
        },
        getResource() {
            this.axios.get("/api_server/mainproduct.php").then((response) => {
                console.log(response.data);
                this.product = response.data;
            });
        },
    },
    created() {
        this.getResource();
    },
};
</script>
<style lang="scss" scoped>
.product {
    max-width: $max-width;
    margin: auto;
}
.coverBox {
    @include s() {
        display: flex;
        flex-direction: column;
        position: relative;
    }
    @include m() {
        display: flex;
        position: relative;
    }
    .coverBox1 {
        width: 100%;
        @include m() {
            width: 60%;
        }
        img {
            width: 100%;
            height: 100%;
        }
    }
    .coverBox2 {
        @include s() {
            // outline: $line solid red;
            // transform: translate(0, -100%);
            // // padding-top: 100%;
            // margin-bottom: -100%;
            // width: 100%;
            // height: fit-content;
            // text-align: end;
            // img {
            //     transform: translateX(-20%);
            // }
            position: absolute;
            top: 10%;
            right: 10%;

            width: 50%;
            height: fit-content;
            img {
                width: 100%;
            }
        }
        @include m() {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 30%;
            margin: auto;
            width: 300px;
            height: fit-content;
            img {
                width: 100%;
            }
        }
    }
    .coverBox3 {
        width: 100%;
        z-index: -1;

        @include m() {
            width: 40%;
        }
        img {
            @include s() {
                width: 100%;

                height: 50%;
                object-fit: cover;
                object-position: top center;
            }
            @include m() {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }
}
.titleBoxOutside {
    margin-top: 60px;
    border-top: 1px solid $text_color;
    .titleBox {
        transform: translateY(-50%);
        margin-bottom: -20px;

        p {
            width: fit-content;
            background: white;

            @include s() {
                transform: translateX(30px);
                padding: 0 10px;
            }
            @include m() {
                margin: auto;
                padding: 5px 0;
            }
        }
        .main {
            font-weight: 600;
            color: $title_color;
            @include s() {
                font-size: 32px;
            }
            @include m() {
                font-size: 48px;
            }
        }
        .sub {
            color: $text_color;
            @include s() {
                font-size: 16px;
            }
            @include m() {
                font-size: 22px;
            }
        }
    }
}
.buttonBox {
    width: 100%;
    text-align: center;
    padding: 0 0 20px;
}
.block {
    padding: 10px 0;
    margin: 20px 0;
    text-align: center;
    .view {
        padding: 50px 0;
        width: 100%;
        max-width: $max_width;
        margin: auto;
        overflow: hidden;
        .Box {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
    }
}
.block.fitting {
    background: url("@/assets/product/bgfitting.jpg") repeat-y;
    .view {
        .Box.fitting {
            gap: 30px;
        }
    }
}
.block.weekly {
    background-color: $main_color;
}
.Box.weekly {
    background: url("@/assets/product/bgweekly.svg") no-repeat;
    .clothes {
        transform: translateY(-5%);
        margin: 0 0 -5%;
    }
}
.productlist {
    width: 100%;
    max-width: $max_width;
    margin: auto;
    .Box {
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        .product_card {
            @include s() {
                width: 50%;
            }
            width: 25%;
        }
    }
}
</style>