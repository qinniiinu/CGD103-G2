<template >
    <div class="outside">
        <p class="block">服飾總覽</p>
        <div class="ProductSideMenu">
            <div v-for="item in main_list" :key="item.id" class="main">
                <label
                    :for="item.id"
                    @click="$router.push(`/productlist?G=${item.id}`)"
                >
                    <div class="left_right">
                        <p :class="{ blod: $route.query.G === item.id }">
                            {{ item.sex }}
                        </p>
                        <p>
                            <font-awesome-icon
                                icon="fa-solid fa-plus"
                                v-show="find(item.id) != item.id"
                            />
                        </p>
                    </div>
                </label>
                <input
                    type="checkbox"
                    :id="item.id"
                    :value="item.id"
                    v-model="main"
                />
                <div
                    v-show="find(item.id) == item.id"
                    class="sub_list"
                    v-for="e in item.list"
                    :key="e.id"
                >
                    <label
                        :for="e.id"
                        @click="
                            $router.push(
                                `/productlist?G=${item.id}&M=${e.id.slice(1)}`
                            )
                        "
                    >
                        <div class="left_right">
                            <p
                                :class="{
                                    blod:
                                        $route.query.M === e.id.slice(1) &&
                                        $route.query.G === item.id,
                                }"
                            >
                                {{ e.name }}
                            </p>
                            <p>
                                <font-awesome-icon
                                    icon="fa-solid fa-plus"
                                    v-show="!openList(e.id)"
                                />
                            </p>
                        </div>
                    </label>
                    <input
                        type="checkbox"
                        :id="e.id"
                        :value="e.id"
                        v-model="sub"
                    />
                    <div
                        class="sub_list"
                        v-for="(item3, index) in e.sub_list"
                        :key="index"
                        v-show="openList(e.id)"
                        @click="
                            $router.push(
                                `/productlist?G=${item.id}&M=${e.id.slice(
                                    1
                                )}&T=${item3.name}`
                            )
                        "
                    >
                        <p
                            :class="{
                                blod: $route.query.T === item3.name,
                            }"
                        >
                            {{ item3.name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <p class="block">尺寸</p>
        <i>XS</i>
        <i>S</i>
        <i>M</i>
        <i>L</i>
        <i>XL</i> -->
        <p class="block">價格區間</p>
        <!-- <Slider
            v-model="value"
            class="slider-blue"
            :format="format"
            :max="5000"
            @change="$emit('price', value)"
        /> -->
    </div>
</template>
<script>
import router from "@/router";

// import Slider from "@vueform/slider";
const productside = [
    {
        id: "0",
        sex: "女裝",
        list: [
            {
                id: "0上身",
                name: "上身",
                sub_list: [
                    { name: "短袖" },
                    { name: "長袖" },
                    { name: "外套" },
                ],
            },
            {
                id: "0下身",
                name: "下身",
                sub_list: [
                    { name: "短褲" },
                    { name: "長褲" },
                    { name: "裙子" },
                ],
            },
            {
                id: "0鞋款",
                name: "鞋款",
                sub_list: [
                    { name: "皮鞋" },
                    { name: "運動鞋" },
                    { name: "跟鞋" },
                ],
            },
            {
                id: "0配件",
                name: "配件",
                sub_list: [{ name: "包款" }, { name: "配件" }],
            },
        ],
    },
    {
        id: "1",
        sex: "男裝",
        list: [
            {
                id: "1上身",
                name: "上身",
                sub_list: [
                    { name: "短袖" },
                    { name: "長袖" },
                    { name: "外套" },
                ],
            },
            {
                id: "1下身",
                name: "下身",
                sub_list: [{ name: "短褲" }, { name: "長褲" }],
            },
            {
                id: "1鞋款",
                name: "鞋款",
                sub_list: [{ name: "皮鞋" }, { name: "運動鞋" }],
            },
            {
                id: "1配件",
                name: "配件",
                sub_list: [{ name: "包款" }, { name: "配件" }],
            },
        ],
    },
];
export default {
    name: "ProductMenu",
    // components: { Slider },

    data: () => ({
        // value: [20, 4000],
        // format: {
        //     prefix: "$",
        // },

        main_list: productside,
        main: [],
        sub: [],
    }),
    methods: {
        openList(X) {
            let cc = false;

            this.sub.forEach((e) => {
                if (X == e) {
                    cc = true;
                }
            });
            return cc;
        },
        find(X) {
            // console.log(X);
            return this.main.find((e) => e == X);
        },
    },
    mounted() {
        if (this.$route.query.G) {
            this.main[0] = this.$route.query.G;
            if (this.$route.query.M)
                this.sub[0] = `${this.main[0]}${this.$route.query.M}`;
        }
    },
};
</script>
<style lang="scss" scoped>
// .slider-blue {
//     --slider-connect-bg: #495bff;
//     --slider-tooltip-bg: #495bff;
//     --slider-handle-ring-color: #3b82f630;
//     margin: 50px 10px 0;
// }
// @import url(@vueform/slider/themes/default.scss);

.outside {
    @include s() {
        display: none;
    }

    padding: 10px;

    .block {
        border-bottom: 1px solid $title_color;
        font-weight: 600;
        padding: 10px;
    }

    .ProductSideMenu {
        width: 100%;
        min-width: 180px;
        padding: 10px 0;
        input {
            display: none;
        }
        .main {
            line-height: 30px;

            .left_right {
                justify-content: space-between;
                cursor: pointer;
                width: 100%;
                p {
                    cursor: pointer;
                }
            }

            .sub_list {
                padding-left: 20px;
            }
        }
        p {
            cursor: pointer;
        }
        p.blod {
            color: $text_color;
        }
    }

    i {
        display: inline-block;
        border: $line solid $title_color;
        width: 20px;
        padding: 2px 0;
        margin: 10px 10px;
        text-align: center;
        color: $title_color;
    }
}
</style>