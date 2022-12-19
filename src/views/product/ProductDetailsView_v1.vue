<script>
import ProductMenu from "@/components/product/ProductMenu.vue";
import ProductCard from "@/components/product/ProductCard.vue";
import HashTag from "@/components/product/HashTag.vue";
import Alert from "@/components/Alert.vue";
export default {
    name: "Product",
    components: {
        ProductMenu,
        ProductCard,
        HashTag,
        Alert,
    },
    data() {
        return {
            temp: {},
            bigPicture: "",
            pickedColor: "",
            pickedSize: "",
            colorClick: [],
            number: 1,
            cartList: [],
            sizeClick: [],
            cartItem: {},
            alert: false,
            msg: "",
            bigPicture: "test_01_1.jpg",
        };
    },
    computed: {
        product_details() {
            return this.temp;
        },
        product_name() {
            return this.product_details?.product_name;
        },
        unit_price() {
            return this.product_details?.unit_price;
        },
        picList() {
            return this.product_details?.product_pic?.split(",") ?? [];
        },
        color() {
            return this.product_details?.product_color?.split(",");
        },
        size() {
            return this.product_details?.product_size?.split(",");
        },
        hashTag() {
            return this.product_details?.hashtag?.split(",");
        },
        pic() {
            if (this.picList[0]) {
                this.bigPicture = this.picList[0];
                return this.picList[0];
            } else {
                return "test_01_1.jpg";
            }
        },
    },
    methods: {
        getResource() {
            this.axios.get("/api_server/list.php").then((response) => {
                console.log(response.data);

                this.temp = response.data.find((e) => {
                    if (e.product_id == this.$route.params.id) return e;
                });
                this.bigPicture = this.temp?.product_pic.split(",")[0];
            });
        },
        addCart() {
            localStorage.getItem("cart");
            if (this.pickedColor == "" || this.pickedSize == "") {
                this.alert = true;
                this.msg =
                    this.pickedColor == ""
                        ? "顏色未選 "
                        : "" + this.pickedSize == ""
                        ? "尺寸未選"
                        : "";
                return;
            } else {
                this.cartItem = {
                    id: this.product_details.product_id,
                    color: this.pickedColor,
                    size: this.pickedSize,
                };
                let cartItemKey = JSON.stringify(this.cartItem);
                if (localStorage.getItem(cartItemKey)) {
                    let num =
                        parseInt(localStorage.getItem(cartItemKey)) +
                        this.number;
                    localStorage.setItem(JSON.stringify(this.cartItem), num);
                } else {
                    localStorage.setItem(cartItemKey, this.number);
                    if (localStorage.getItem("cart")) {
                        let str =
                            localStorage.getItem("cart") + "|" + cartItemKey;
                        localStorage.setItem("cart", str);
                    } else {
                        localStorage.setItem("cart", cartItemKey);
                    }
                }
                this.alert = true;
                this.msg = "加入成功";
            }
        },
        goCart() {
            this.addCart();
            if (localStorage.getItem(JSON.stringify(this.cartItem))) {
                this.$router.push({ path: "/cart" });
            }
        },
        checkColor(x) {
            this.colorClick = [];
            this.colorClick[x] = true;
        },
        checkSize(x) {
            this.sizeClick = [];
            this.sizeClick[x] = true;
        },
        changeBicPicture(X) {
            this.bigPicture = X;
        },
        reduce() {
            this.number = this.number > 1 ? this.number - 1 : 1;
        },
        plus() {
            this.number++;
        },
        tab(val) {
            this.alert = val;
        },
    },
    created() {
        this.getResource();
    },
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
                    <h1 class="title">{{ product_name }}</h1>
                    <p class="price">NT${{ unit_price }}</p>
                    <div class="cellflex">
                        <div class="color_box">
                            <p class="color">顏色</p>
                            <label
                                :for="e"
                                v-for="(e, i) in color"
                                :key="i"
                                @click="checkColor(i)"
                            >
                                <div
                                    class="circle"
                                    :style="{ background: e }"
                                    :class="{
                                        circleoutline: colorClick[i],
                                    }"
                                ></div>
                                <input
                                    type="radio"
                                    :id="e"
                                    :value="e"
                                    v-model="pickedColor"
                                />
                            </label>
                        </div>
                        <div class="size_box">
                            <p class="size">尺寸</p>
                            <label
                                :for="e"
                                v-for="(e, i) in size"
                                :key="i"
                                @click="checkSize(i)"
                            >
                                <i :class="{ pickedSize: sizeClick[i] }"
                                    >{{ e }}
                                </i>

                                <input
                                    type="radio"
                                    :id="e"
                                    :value="e"
                                    v-model="pickedSize"
                                />
                            </label>
                        </div>
                    </div>
                    <div class="cellflex">
                        <div class="number_box">
                            <p class="number">數量</p>
                            <p class="number">
                                <button
                                    name="mines"
                                    value="-"
                                    @click="reduce()"
                                >
                                    <font-awesome-icon
                                        icon="fa-solid fa-minus"
                                    />
                                </button>
                                <span>{{ number }}</span>
                                <button name="plus" value="+" @click="plus()">
                                    <font-awesome-icon
                                        icon="fa-solid fa-plus"
                                    />
                                </button>
                            </p>
                        </div>
                        <div class="tagBox">
                            <p class="hashtag">#tag</p>
                            <i v-for="(e, i) in hashTag" :key="i">#{{ e }}</i>
                        </div>
                    </div>
                    <div class="shop_buttonBox">
                        <button class="btn_s" @click="addCart()">
                            加入購物車
                        </button>
                        <button class="btn_l" @click="goCart()">
                            直接購買
                        </button>
                    </div>
                </div>
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
            <div class="matchingProducts_box">
                <product-card></product-card>
                <product-card></product-card>
                <product-card></product-card>
            </div>
        </div>
        <div class="likeAlso">
            <h3>你可能也會喜歡</h3>
        </div>
    </div>
    <Alert :msg="msg" @closeAlert="tab" v-show="alert"></Alert>
</template>

<style lang="scss" scoped>
.alert {
    width: 300px;
    height: 250px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;

    border: 5px solid $main_color;
    background-color: $bg_white;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    p {
        margin: 20px;
    }
}
.show {
    opacity: 1;
}
.hide {
    opacity: 0;
    transition: opacity 400ms;
}
.product_details {
    max-width: $max-width;
    margin: auto;
    padding-bottom: 20px;
    border-bottom: $line solid $text_color;
    .leftright {
        @include m() {
            display: flex;
            align-items: space-around;
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
                justify-content: flex-start;
                width: 100%;
                .smallPic {
                    width: 25%;
                    padding: -10px;
                    margin: 10px;
                    box-sizing: border-box;
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
            // .rightTop {
            // }
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
                input {
                    display: none;
                }
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
            .number,
            .hashtag {
                @include s() {
                    font-size: 14px;
                }
                @include m() {
                    font-size: 18px;
                }
            }
            .color_box {
                margin: 25px 0;
                @include s() {
                    border-bottom: $line solid $title_color;
                    padding-bottom: 5px;
                }
                label {
                    display: inline-block;
                    .circle {
                        aspect-ratio: 1 /1;
                        border-radius: 50%;
                        margin: 10px;
                        background-color: #003;
                        border: 3px solid $title_color;
                        cursor: pointer;
                        @include s() {
                            width: 20px;
                        }
                        @include m() {
                            width: 24px;
                        }
                    }
                    .circleoutline {
                        border: 3px solid $main_color;
                    }
                }
            }
            .size_box {
                margin: 25px 0;
                @include s() {
                    border-bottom: $line solid $title_color;
                    padding-bottom: 5px;
                }
                i {
                    display: inline-block;
                    border: $line solid $title_color;
                    width: 20px;
                    text-align: center;
                    margin: 10px;
                    color: $title_color;
                    padding: 5px;
                    cursor: pointer;
                    @include s() {
                    }
                }
                i.pickedSize {
                    background-color: $main_color;
                    color: #fff;
                }
            }
            .number_box {
                margin: 25px 0;
                width: fit-content;
                border-bottom: $line solid $title_color;
                button {
                    display: inline-block;
                    width: 30px;
                    line-height: 20px;
                    font-size: 18px;
                    color: $title_color;
                    background-color: transparent;
                    margin: 10px;
                    padding: 5px;
                    border-width: 0;
                    cursor: pointer;
                }
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
            .tagBox {
                margin: 25px 0;
                width: fit-content;
                @include s() {
                    border-bottom: $line solid $title_color;
                }
                .hashtag {
                    @include m() {
                        margin: 20px 0;
                        display: none;
                    }
                }
                i {
                    display: inline-block;
                    background-color: $main_color;
                    width: fit-content;
                    text-align: center;
                    margin: 10px;
                    color: #fff;
                    padding: 5px;
                }
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
                color: $text_color;
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
            display: flex;
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