<template>
    <section class="my_save">
        <h3 class="title">我的收藏</h3>
        <div class="data">
            <!-- 收藏穿搭 -->
            <!-- <div class="save_card">
                <h4 class="tit">收藏穿搭</h4>
                <router-link to="/MyPage/Favorites">
                    <ul class="save_item">
                        <li
                            v-for="(
                                combo_main_pic, index
                            ) in collect_combo.combo_main_pic"
                            :key="collect_combo.combo_id[index]"
                        >
                            <img
                                :src="collect_combo.combo_main_pic[index]"
                                :alt="collect_combo.combo_id[index]"
                            />
                        </li>
                    </ul>
                </router-link>
            </div> -->
            <!-- 單品商品 -->
            <!-- <div class="save_card"> -->
            <!-- <h4 class="tit">收藏商品</h4> -->
            <!-- <router-link to="/MyPage/Favorites">
                <ul class="save_item">
                    <li
                        v-for="(
                            product_pic, index
                        ) in collect_product.product_pic"
                        :key="collect_product.product_id[index]"
                    >
                        <img
                            :src="collect_product.product_pic[index]"
                            :alt="collect_product.product_id[index]"
                        />
                    </li>
                </ul>
            </router-link> -->
            <!-- </div> -->
            <ProductCard
                :id="e.product_id"
                :title="e.product_name"
                :price="e.unit_price"
                :imgURL="e.product_pic.split(',')[0]"
                :clloect="e.coll"
                @clloectchange="collchange(e)"
                v-for="e in product"
                :key="e.product_id"
            />
        </div>
        <router-link to="/MyPage/Favorites" class="more" v-show="showMore">
            <span class="text">查看更多</span>
            <font-awesome-icon icon="fa-solid fa-angle-right" />
        </router-link>
    </section>
</template> 


<script>
import { BASE_URL } from "@/assets/js/common.js";

export default {
    name: "MySave",
    props: {},
    components: {},
    data() {
        return {
            product: [],
            showMore: false,
            // collect_combo: {
            //     combo_id: [901, 902, 903],
            //     combo_main_pic: [
            //         "look/look-1.jpg",
            //         "look/look-2.jpg",
            //         "look/look-3.jpg",
            //     ],
            // },

            // collect_product: {
            //     product_id: [101, 102, 103],
            //     product_pic: [
            //         "pic/F1_01_1.jpg",
            //         "pic/F1_02_1.jpg",
            //         "pic/F1_03_1.jpg",
            //     ],
            // },
        };
    },
    methods: {
        getResource() {
            this.axios
                .get(`${BASE_URL}/favorlist.php`, { credentials: "include" })
                .then((response) => {
                    this.product = response.data;
                    if (this.product.length >= 3) {
                        const long = window.innerWidth < 550 ? 2 : 3;
                        this.product = this.product.slice(0, long);
                        this.showMore = true;
                    }
                    this.product.forEach((e) => {
                        e.coll = true;
                    });
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
@media screen and (max-width: 549px) {
    .product_card {
        width: 50%;
    }
}
@media screen and (min-width: 550px) {
    .product_card {
        width: 33.333333%;
    }
}

.more {
    display: flex;
    position: absolute;
    align-items: center;
    right: $padding;
    bottom: $padding;
    .text {
        font-family: $main_font;
        padding-right: 5px;
    }
}
.my_save {
    background-color: #fff;
    min-height: 15;
    border: 1px solid $title_color;
    box-sizing: border-box;
    padding: 25px;
    margin-block-start: 25px;
    position: relative;
    .title {
        font-size: 24px;
        display: block;
        font-weight: 700;
        color: $title_color;

        margin-block-end: 10px;
        justify-content: space-between;
        @include s() {
            font-size: 22px;
        }
    }
    .data {
        display: flex;
        width: 100%;
        justify-content: space-between;
        margin-bottom: 10px;
        .save_card {
            border: 1px gray;

            .tit {
                font-size: 18px;
                margin-bottom: 10px;
            }
            .save_item {
                display: flex;
                justify-content: space-between;
                border: 1px solid gray;
                li {
                    max-width: 150px;
                    height: 170px;
                    margin: 15px;
                    img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        object-position: center top;
                    }
                }
            }
        }
        @include s() {
            gap: 10px;
        }
    }
}
</style>