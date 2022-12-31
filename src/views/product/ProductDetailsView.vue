<script>
import { BASE_URL } from "@/assets/js/common.js";

import Breadcrumb from "@/components/product/Breadcrumb.vue";
import HashTag from "@/components/product/HashTag.vue";
import Alert from "@/components/Alert.vue";
export default {
    name: "Product",
    components: {
        Breadcrumb,
        HashTag,
        Alert,
    },
    data() {
        return {
            temp: null,
            radom: [],
            cart: [],
            alert: false,
            msg: "",
            //
            pickedColor: "",
            pickedSize: "",
            colorClick: [],
            number: 1,
            sizeClick: [],

            cartItem: {},
            bigPicture: "test_01_1.jpg",
            colorArr: [],
        };
    },
    computed: {
        bread() {
            let gender = this.temp?.product_gender == 1 ? "男裝" : "女裝";
            return [
                {
                    name: gender,
                    link: `/productlist?G=${this.temp?.product_gender}`,
                },
                {
                    name: this.temp?.product_maintype,
                    link: `/productlist?G=${this.temp?.product_gender}&M=${this.temp?.product_maintype}`,
                },
                {
                    name: this.temp?.product_type,
                    link: `/productlist?G=${this.temp?.product_gender}&M=${this.temp?.product_maintype}&T=${this.temp?.product_type}`,
                },
            ];
        },
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
        color_name() {
            return this.product_details?.product_color_name?.split(",");
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
    watch: {
        $route: function () {
            this.getResource();

            this.pickedColor = "";
            this.pickedSize = "";
            this.colorClick = [];
            this.number = 1;
            this.sizeClick = [];
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
    },
    methods: {
        collchange(e) {
            e.coll = !e.coll;
        },
        color_arr() {
            const X = this.color;
            const Y = this.color_name;

            this.colorArr = X.map((key, index) => ({
                [key]: Y[index],
            }));
        },
        cut(x) {
            if (x) return x.split(",")[0];
        },
        getRandomItems(items, X) {
            let randomItems = [];
            while (randomItems.length < 3) {
                let randomIndex = Math.floor(Math.random() * items.length);
                let randomItem = items[randomIndex];
                randomItem.coll = false;
                if (
                    randomItem?.product_id !== X &&
                    !randomItems.includes(randomItem)
                ) {
                    randomItems.push(randomItem);
                }
            }
            this.radom = randomItems;
        },
        getResource() {
            this.axios.get(`${BASE_URL}/list.php`).then((response) => {
                this.temp = response.data.find((e) => {
                    if (e.product_id == this.$route.params.id) return e;
                });
                if (this.temp === undefined) this.$router.push("/404");
                this.getRandomItems(response.data, this.$route.params.id);
                this.bigPicture = this.temp?.product_pic.split(",")[0];
                this.color_arr();
            });
        },
        getStorage() {
            let data = localStorage.getItem("cart");
            if (data) data = JSON.parse(data);
            this.cart = data ? data : [];
        },
        addCart() {
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
                const color = this.colorArr.find(
                    (color) => Object.keys(color)[0] === this.pickedColor
                );
                const value = Object.values(color)[0];
                const prodIndex = this.cart.findIndex((cartItem) => {
                    return (
                        cartItem.id === this.product_details.product_id &&
                        cartItem.color === value &&
                        cartItem.size === this.pickedSize
                    );
                });
                if (prodIndex >= 0) {
                    if (prodIndex == 1) {
                        this.cart[prodIndex]["count"] += 1;
                        return;
                    } else {
                        this.cart[prodIndex]["count"] += this.number;
                    }
                } else {
                    this.cart.push({
                        id: this.product_details.product_id,
                        title: this.product_name,
                        image: this.temp?.product_pic.split(",")[0],
                        price: this.unit_price,
                        color: value,
                        size: this.pickedSize,
                        count: this.number,
                    });
                }
                this.setStorage();
                this.alert = true;
                this.msg = "加入成功";
            }
        },
        setStorage() {
            const data = JSON.stringify(this.cart);
            localStorage.setItem("cart", data);
        },
        goCart() {
            this.addCart();
            if (this.msg === "加入成功") {
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
        this.getStorage();
    },
    beforeCreate() {
        this.axios.get(`${BASE_URL}/list.php`).then((response) => {
            const temp = response.data.find((e) => {
                if (e.product_id == this.$route.params.id) return e;
            });
            if (temp === undefined) this.$router.push("/404");
        });
    },
};
</script>
<template>
    <div class="center" v-if="!temp">
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
    <div v-if="temp">
        <div class="product_details">
            <ProductMenu />
            <Breadcrumb :arr="bread"></Breadcrumb>
            <div class="leftright">
                <div class="left">
                    <div class="bigPic">
                        <img
                            :src="`https://tibamef2e.com/cgd103/g2/front/pic/${bigPicture}`"
                        />
                    </div>
                    <div class="leftDown">
                        <div
                            class="smallPic"
                            v-for="(e, i) in picList"
                            :key="i"
                            @click="changeBicPicture(e)"
                        >
                            <img
                                :src="`https://tibamef2e.com/cgd103/g2/front/pic/${e}`"
                            />
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
                                    <button
                                        name="plus"
                                        value="+"
                                        @click="plus()"
                                    >
                                        <font-awesome-icon
                                            icon="fa-solid fa-plus"
                                        />
                                    </button>
                                </p>
                            </div>
                            <div class="tagBox">
                                <p class="hashtag">#tag</p>
                                <i v-for="(e, i) in hashTag" :key="i"
                                    >#{{ e }}</i
                                >
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
            <h2>你可能也會喜歡</h2>
            <div class="matchingProducts_box">
                <ProductCard
                    :id="e.product_id"
                    :title="e.product_name"
                    :price="e.unit_price"
                    :imgURL="cut(e.product_pic)"
                    :clloect="e.coll"
                    @clloectchange="collchange(e)"
                    v-for="e in radom"
                    :key="e.product_id"
                />
            </div>
        </div>

        <Alert :msg="msg" @closeAlert="tab" v-show="alert"></Alert>
    </div>
</template>

<style lang="scss" scoped>
.center {
    min-height: 50vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
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
    max-width: $max_width;
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
    max-width: $max_width;
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
    }
    .matchingProducts_box {
        display: flex;
        justify-content: center;
        .product_card {
            width: 20%;
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