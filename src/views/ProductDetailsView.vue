<script>
const testproduct = {
    product_id: "1",
    product_name: "上衣A ",
    hashtag: "",
    unit_price: "996",
    product_state: "1",
    product_maintype: "上衣",
    product_type: "",
    product_pic: "test_01_1.jpg,test_01_2.jpg",
    style_type: "typeA,typeB",
    body_type: "",
    product_gender: "F",
    product_color: "#000000",
    product_size: "XS,S,M,L,XL",
};
import ProductMenu from "@/components/product/ProductMenu.vue";
import ProductCard from "@/components/product/ProductCard.vue";
import HashTag from "@/components/product/HashTag.vue";
import Button from "@/components/Button.vue";
export default {
    name: "Product",
    components: {
        ProductMenu,
        ProductCard,
        HashTag,
        Button,
    },
    data() {
        return {
            fakeproduct: [],
            product_details: testproduct,
            picList: testproduct.product_pic.split(","),
            number: 0,
            bigPicture: testproduct.product_pic.split(",")[0],
            size: testproduct.product_size.split(","),
        };
    },
    computed: {},
    methods: {
        changeBicPicture(X) {
            console.log(X);
            this.bigPicture = X;
        },
    },
    // methods: {
    //     getResource() {
    //         fetch("data/fakeproduct.json")
    //             .then((res) => res.json())
    //             .then((json) => (this.fakeproduct = json));
    //     },
    //     cut(x) {
    //         return x.split(",")[0];
    //     },
    // },
    // created() {
    //     this.getResource();
    // },
};
</script>
<template>
    <div class="product_details">
        <ProductMenu />
        <div class="leftright">
            <div class="left">
                <div class="bigPic">
                    <img :src="require(`@/assets/product/${bigPicture}`)" />
                </div>
                <div class="leftDown">
                    <div
                        class="smallPic"
                        v-for="(e, i) in picList"
                        :key="i"
                        @click="changeBicPicture(e)"
                    >
                        <img :src="require(`@/assets/product/${picList[i]}`)" />
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="rightTop">
                    <h1 class="title">{{ product_details.product_name }}</h1>
                    <p class="price">NT${{ product_details.unit_price }}</p>
                    <div class="cellflex">
                        <div class="color_box">
                            <p class="color">顏色</p>
                            <div
                                class="circle"
                                :style="{ background: product_color }"
                            ></div>
                        </div>
                        <div class="size_box">
                            <p class="size">尺寸</p>
                            <label for=""
                                ><i
                                    v-for="(e, i) in size"
                                    :key="i"
                                    @click="sizeClick(e)"
                                >
                                    <input type="radio" :id="e" />{{ e }}</i
                                ></label
                            >
                        </div>
                    </div>
                    <div class="number_box">
                        <p class="number">數量</p>
                        <p class="number">
                            <input type="button" name="mines" value="-" />
                            <span>{{ number }}</span>
                            <input type="button" name="plus" value="+" />
                        </p>
                    </div>
                    <div class="shop_buttonBox">
                        <button>加入購物車</button>
                        <button>直接購買</button>
                    </div>
                </div>

                <HashTag></HashTag>
            </div>
        </div>
    </div>
    <div class="dressingGuide">
        <h2>穿搭指南</h2>
        <div class="leftright">
            <div class="image">
                <img src="https://fakeimg.pl/400x600/200" />
            </div>

            <div class="right">
                <p class="dressingGuideTitle">H&M 襯衫</p>
                <p class="content">
                    Lorem Ipsum has been the industry's standard dummy text ever
                    since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type specimen book.
                </p>
            </div>
        </div>
        <div class="matchingProducts">
            <h3>搭配的商品</h3>
            <div class="matchingProducts_box"></div>
        </div>
        <div class="likeAlso">
            <h3>你可能也會喜歡</h3>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.product_details {
    max-width: $max-width;
    margin: auto;
    padding-bottom: 20px;
    border-bottom: $line solid $text_color;
    .leftright {
        @include m() {
            display: flex;
        }
        .left {
            @include s() {
                width: 100%;
            }
            @include m() {
                width: 50%;
            }
            .bigPic {
                aspect-ratio: 1 /1;
                padding: 10px 0;
                img {
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                }
            }
            .leftDown {
                display: flex;
                justify-content: space-between;
                border: 1px solid red;
                width: 100%;
                .smallPic {
                    width: 20%;
                    aspect-ratio: 1/1;
                    img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                }
            }
        }
        .right {
            @include m() {
                width: 50%;
            }
            .rightTop {
            }
            color: $text_color;
            padding: 10px;
            .title {
                padding: 10px 0;
                font-weight: 600;

                @include s() {
                    font-size: 22px;
                    line-height: 24px;
                }
                @include m() {
                    font-size: 32px;
                }
            }

            .price {
                padding: 10px 0;

                @include s() {
                    font-size: 18px;
                }
                @include m() {
                    font-size: 24px;
                }
            }
            .cellflex {
                @include s() {
                    display: flex;
                    gap: 20px;
                }
                @include m() {
                    & > * {
                        padding: 15px 0;
                    }
                }
            }

            .color,
            .size,
            .number {
                @include s() {
                    font-size: 14px;
                }
                @include m() {
                    font-size: 18px;
                }
            }
            .circle {
                aspect-ratio: 1 /1;
                border-radius: 50%;
                margin: 10px;
                background-color: #003;
                display: inline-block;
                @include s() {
                    width: 20px;
                }
                @include m() {
                    width: 24px;
                }
            }
            .number_box {
                padding: 25px 0;
            }
            .size {
                @include s() {
                }
                @include m() {
                }
            }
            i {
                display: inline-block;
                border: $line solid $title_color;
                width: 20px;

                margin: 5px;
                text-align: center;
                color: $title_color;
            }
            .shop_buttonBox {
                @include s() {
                }
                @include m() {
                    padding: 2px 0;
                }
            }
            button {
                margin: 10px;
            }
        }
    }
}
.dressingGuide {
    max-width: $max-width;
    margin: auto;
    padding-bottom: 20px;
    border-bottom: $line solid $text_color;
    h2 {
        color: $title_color;
        text-align: center;
        font-weight: 600;
        @include s() {
            font-size: 24px;
            padding: 20px;
        }
        @include m() {
            font-size: 32px;
            padding: 50px;
        }
    }
    .leftright {
        @include m() {
            display: flex;
        }
        .image {
            display: flex;
            @include s() {
                justify-content: center;
            }
            @include m() {
                width: 50%;
                justify-content: flex-end;
                box-sizing: border-box;
                padding-right: 10px;
            }
            img {
                @include s() {
                    width: 50%;
                    object-fit: contain;
                }
                @include m() {
                    width: 80%;
                    object-fit: contain;
                }
            }
        }
        .right {
            @include s() {
                padding: 20px;
            }
            @include m() {
                width: 50%;
            }
            padding: 20px 0 0 0;
            box-sizing: border-box;
            .dressingGuideTitle {
                background-color: $second_color;
                color: $title_color;
                font-size: 24px;
                font-weight: 600;
                padding: 20px;
                margin: 10px 0;
                width: fit-content;
            }
            .content {
                font-size: 20px;
                line-height: 30px;
                width: 80%;
                margin: 10px 0;
                margin: auto;
            }
        }
    }
    .matchingProducts {
        h3 {
            color: $title_color;
            text-align: center;
            font-weight: 600;
            @include s() {
                font-size: 24px;
                padding: 20px;
            }
            @include m() {
                font-size: 32px;
                padding: 50px;
            }
        }
        .matchingProducts_box {
            border: 1px solid red;
        }
    }
    .likeAlso {
        h3 {
            color: $title_color;
            text-align: center;
            font-weight: 600;
            @include s() {
                font-size: 24px;
                padding: 20px;
            }
            @include m() {
                font-size: 32px;
                padding: 50px;
            }
        }
    }
}
</style>