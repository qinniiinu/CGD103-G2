<template>
    <div>
        <input id="b1" type="radio" value="b1" v-model="picked" />
        <input id="b2" type="radio" value="b2" v-model="picked" />
        <input id="b3" type="radio" value="b3" v-model="picked" />
        <input id="b4" type="radio" value="b4" v-model="picked" />
        <input id="b5" type="radio" value="b5" v-model="picked" />
        <!-- {{ picked }}{{ openMain }} -->{{ selected }}

        <div class="productMenu">
            <ul class="menOrWomen" @click="action">
                <li @click="selected[0] = 'all'">全部</li>
                <li @click="selected[0] = 'W'">女裝</li>
                <li @click="selected[0] = 'F'">男裝</li>
            </ul>
            <div class="colthingList_box" v-show="openMain">
                <label for="b1" @click="selected[1] = 'top'"
                    ><div class="clothingList">上身</div></label
                >
                <label for="b2" @click="selected[1] = 'down'"
                    ><div class="clothingList">下身</div></label
                >
                <label for="b4" @click="selected[1] = 'shoes'"
                    ><div class="clothingList">鞋款</div></label
                >
                <label for="b5" @click="selected[1] = 'other'"
                    ><div class="clothingList">配件</div></label
                >
            </div>
            <div class="clothingList_item_boxOutside">
                <ul
                    class="clothingList_item_box"
                    id="top"
                    v-show="picked == 'b1'"
                >
                    <li @click="selected[2] = '短袖'" class="clothingList_item">
                        短袖
                    </li>
                    <li @click="selected[2] = '長袖'" class="clothingList_item">
                        長袖
                    </li>
                    <li @click="selected[2] = '外套'" class="clothingList_item">
                        外套
                    </li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="down"
                    v-show="picked == 'b2'"
                >
                    <li @click="selected[2] = '長褲'" class="clothingList_item">
                        長褲
                    </li>
                    <li @click="selected[2] = '短褲'" class="clothingList_item">
                        短褲
                    </li>
                    <li
                        v-if="selected[0] != 'F'"
                        @click="selected[2] = '裙子'"
                        class="clothingList_item"
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
                        @click="selected[2] = '休閒鞋'"
                        class="clothingList_item"
                    >
                        休閒鞋
                    </li>
                    <li
                        @click="selected[2] = '跟鞋'"
                        v-if="selected[0] != 'F'"
                        class="clothingList_item"
                    >
                        跟鞋
                    </li>
                    <li
                        @click="selected[2] = '運動鞋'"
                        class="clothingList_item"
                    >
                        運動鞋
                    </li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="others"
                    v-show="picked == 'b5'"
                >
                    <li @click="selected[2] = '包款'" class="clothingList_item">
                        包款
                    </li>
                    <li @click="selected[2] = '配件'" class="clothingList_item">
                        配件
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            openMain: false,
            picked: [],
            selected: [],
        };
    },
    computed: {
        action() {
            this.openMain = !this.openMain;
            this.picked = [];
        },
    },
    props: {
        name: {
            // : { Boolean, default:  },
        },
    },
};
</script>
<style lang="scss" scoped>
$menOrWomen_m: 60px;

@mixin check() {
    @content;
    border: $line solid red;
}
input {
    display: none;
}
.productMenu {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    color: $title_color;

    .menOrWomen {
        display: flex;
        height: $menOrWomen_m;
        box-sizing: border-box;
        li {
            border: $line solid $title_color;
            width: 33.333333%;
            box-sizing: border-box;
            text-align: center;
            line-height: $menOrWomen_m - $line * 2;
        }
        li + li {
            border-left-width: 0;
        }
    }
    .colthingList_box {
        line-height: 30px;
        color: $title_color;
        display: flex;
        label {
            display: inline-block;
            width: 25%;
            border-bottom: $line solid $title_color;
            box-sizing: border-box;

            div.clothingList {
                text-align: center;
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
            border-bottom: $line solid $title_color;
            text-align: center;

            box-sizing: border-box;
            .clothingList_item {
                text-align: center;
                display: inline-block;
                box-sizing: border-box;
                width: 25%;
            }
        }
    }
}
</style>
