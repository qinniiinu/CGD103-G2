<template>
    <div class="productMenuOutside">
        <div class="productMenuBack"></div>
        <input id="b1" type="radio" value="b1" v-model="picked" />
        <input id="b2" type="radio" value="b2" v-model="picked" />
        <input id="b3" type="radio" value="b3" v-model="picked" />
        <input id="b4" type="radio" value="b4" v-model="picked" />
        <input id="b5" type="radio" value="b5" v-model="picked" />

        <div class="productMenu" @mouseleave="hoverListOut()">
            <!-- {{ selected }} -->
            <ul class="menOrWomen" @click="action">
                <li
                    @click="go('0')"
                    @mouseenter="hoverList('0')"
                    :class="[
                        { blod: $route.query.G == 0 },
                        { bg: selected[0] == 0 },
                    ]"
                >
                    女裝
                </li>
                <li
                    @click="go('1')"
                    @mouseenter="hoverList('1')"
                    :class="[
                        { blod: $route.query.G == 1 },
                        { bg: selected[0] == 1 },
                    ]"
                >
                    男裝
                </li>
            </ul>
            <div class="colthingList_box" v-show="openMain">
                <label for="b1" @click="go(selected[0], '上身')"
                    ><div
                        :class="[
                            { clothingList: true },
                            { blod: selected[1] == '上身' },
                        ]"
                    >
                        上身
                    </div></label
                >
                <label for="b2" @click="go(selected[0], '下身')"
                    ><div
                        :class="[
                            { clothingList: true },
                            { blod: selected[1] == '下身' },
                        ]"
                    >
                        下身
                    </div></label
                >
                <label for="b4" @click="go(selected[0], '鞋款')"
                    ><div
                        :class="[
                            { clothingList: true },
                            { blod: selected[1] == '鞋款' },
                        ]"
                    >
                        鞋款
                    </div></label
                >
                <label for="b5" @click="go(selected[0], '配件')">
                    <div
                        :class="[
                            { clothingList: true },
                            { blod: selected[1] == '配件' },
                        ]"
                    >
                        配件
                    </div></label
                >
            </div>
            <div class="clothingList_item_boxOutside">
                <ul
                    class="clothingList_item_box"
                    id="top"
                    v-show="picked == 'b1'"
                >
                    <li
                        @click="go(selected[0], selected[1], '短袖')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '短袖' },
                        ]"
                    >
                        短袖
                    </li>
                    <li
                        @click="go(selected[0], selected[1], '長袖')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '長袖' },
                        ]"
                    >
                        長袖
                    </li>
                    <li
                        @click="go(selected[0], selected[1], '外套')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '外套' },
                        ]"
                    >
                        外套
                    </li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="down"
                    v-show="picked == 'b2'"
                >
                    <li
                        @click="go(selected[0], selected[1], '長褲')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '長褲' },
                        ]"
                    >
                        長褲
                    </li>
                    <li
                        @click="go(selected[0], selected[1], '短褲')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '短褲' },
                        ]"
                    >
                        短褲
                    </li>
                    <li
                        v-if="selected[0] != '1'"
                        @click="go(selected[0], selected[1], '裙子')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '裙子' },
                        ]"
                    >
                        裙子
                    </li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="shoes"
                    v-show="picked == 'b4'"
                >
                    <li
                        @click="go(selected[0], selected[1], '皮鞋')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '皮鞋' },
                        ]"
                    >
                        皮鞋
                    </li>
                    <li
                        @click="go(selected[0], selected[1], '跟鞋')"
                        v-if="selected[0] != '1'"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '跟鞋' },
                        ]"
                    >
                        跟鞋
                    </li>
                    <li
                        @click="go(selected[0], selected[1], '運動鞋')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '運動鞋' },
                        ]"
                    >
                        運動鞋
                    </li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="others"
                    v-show="picked == 'b5'"
                >
                    <li
                        @click="go(selected[0], selected[1], '包款')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '包款' },
                        ]"
                    >
                        包款
                    </li>
                    <li
                        @click="go(selected[0], selected[1], '配件')"
                        :class="[
                            { clothingList_item: true },
                            { blod: selected[2] == '配件' },
                        ]"
                    >
                        配件
                    </li>
                </ul>
            </div>
            <div class="AMF" v-show="openAMF" @mouseleave="openAMF = false">
                <div class="sub">
                    <p>上身</p>
                    <p>
                        <font-awesome-icon icon=" fa-solid fa-caret-down" />
                    </p>
                    <p @click="go(selected[0], '上身', '短袖')">短袖</p>
                    <p @click="go(selected[0], '上身', '長袖')">長袖</p>
                    <p @click="go(selected[0], '上身', '外套')">外套</p>
                </div>
                <div class="sub">
                    <p>下身</p>
                    <p>
                        <font-awesome-icon icon=" fa-solid fa-caret-down" />
                    </p>
                    <p @click="go(selected[0], '下身', '長褲')">長褲</p>
                    <p @click="go(selected[0], '下身', '短褲')">短褲</p>
                    <p v-if="selected[0] != '1'">裙子</p>
                </div>
                <div class="sub">
                    <p>鞋款</p>
                    <p>
                        <font-awesome-icon icon=" fa-solid fa-caret-down" />
                    </p>
                    <p @click="go(selected[0], '鞋款', '皮鞋')">皮鞋</p>
                    <p
                        @click="go(selected[0], '鞋款', '跟鞋')"
                        v-if="selected[0] != '1'"
                    >
                        跟鞋
                    </p>
                    <p @click="go(selected[0], '鞋款', '運動鞋')">運動鞋</p>
                </div>
                <div class="sub">
                    <p>配件</p>
                    <p>
                        <font-awesome-icon icon=" fa-solid fa-caret-down" />
                    </p>
                    <p @click="go(selected[0], '配件', '包款')">包款</p>
                    <p @click="go(selected[0], '配件', '配件')">配件</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            openMain: false,
            openAMF: false,
            picked: [],
            selected: [],
        };
    },
    methods: {
        go(A, B, C) {
            this.selected[0] = A;
            this.selected[1] = B;
            this.selected[2] = C;
            this.$router.push({
                path: `/productlist`,
                query: {
                    G: A,
                    M: B,
                    T: C,
                },
            });
        },
        action() {
            this.openMain = !this.openMain;
            this.picked = [];
        },
        hoverList(X) {
            if (document.body.clientWidth > 767) {
                this.selected[0] = X;
                this.openAMF = true;
            }
        },
        hoverListOut() {
            if (document.body.clientWidth > 767) {
                this.selected = [];
            }
        },
    },
    props: {},
};
</script>
<style lang="scss" scoped>
$menOrWomen_m: 60px;

input {
    display: none;
}

// .productMenuOutside{
//     // position: relative;
// }
.productMenuBack {
    height: 60px;
    width: 100%;
}
.productMenu {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    color: $title_color;
    position: fixed;
    top: 60px;
    background-color: $bg-white;
    z-index: 5;
    .menOrWomen {
        display: flex;
        height: $menOrWomen_m;
        box-sizing: border-box;
        li {
            border: $line solid $title_color;
            width: 50%;
            box-sizing: border-box;
            text-align: center;
            line-height: $menOrWomen_m - $line * 2;
            cursor: pointer;
        }
        li + li {
            border-left-width: 0;
        }
        li.blod {
            font-weight: 600;
        }
        li.bg {
            background-color: $bg_gray;
        }
    }
    .colthingList_box {
        line-height: 30px;
        color: $title_color;
        border: $line solid $title_color;
        border-width: 0 $line $line $line;
        display: flex;
        @include m() {
            display: none;
        }
        label {
            display: inline-block;
            width: 25%;
            box-sizing: border-box;

            div.clothingList {
                text-align: center;
                cursor: pointer;
            }
            div.clothingList.blod {
                text-align: center;
                font-weight: 600;
            }
        }
    }
    .clothingList_item_boxOutside {
        line-height: 25px;
        border-top-width: 0;

        // display: flex;

        .clothingList_item_box {
            width: 100%;
            line-height: 25px;
            text-align: center;
            border: $line solid $title_color;
            border-width: 0 $line $line $line;

            box-sizing: border-box;
            .clothingList_item {
                text-align: center;
                display: inline-block;
                box-sizing: border-box;
                cursor: pointer;
                width: 25%;
            }
            .blod {
                font-weight: 600;
            }
        }
    }
    .AMF {
        @include s() {
            display: none;
        }
        display: flex;
        background-color: white;
        position: absolute;
        width: 100%;
        z-index: 3;
        border: $line solid $title_color;
        border-top: 0;
        box-sizing: border-box;
        .sub {
            width: 25%;
            padding: 10px;
            text-align: center;

            & + .sub {
                border-left: $line solid $title_color;
            }
            p {
                padding: 5px;
                &:hover {
                    cursor: pointer;
                    font-weight: 600;
                }
            }
        }
    }
}
</style>
