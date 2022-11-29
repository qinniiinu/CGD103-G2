<template>
    <div>
        <input id="b1" type="radio" value="b1" v-model="picked" />
        <input id="b2" type="radio" value="b2" v-model="picked" />
        <input id="b3" type="radio" value="b3" v-model="picked" />
        <input id="b4" type="radio" value="b4" v-model="picked" />
        <input id="b5" type="radio" value="b5" v-model="picked" />
        <!-- {{ picked }}{{ openMain }} -->

        <div class="productMenu">
            <ul class="menOrWomen" @click="action">
                <li>全部</li>
                <li>女裝</li>
                <li>男裝</li>
            </ul>
            <div class="colthingList_box" v-show="openMain">
                <div class="clothingList"><label for="b1">上身</label></div>
                <div class="clothingList"><label for="b2">下身</label></div>
                <div class="clothingList"><label for="b3">套裝</label></div>
                <div class="clothingList"><label for="b4">鞋款</label></div>
                <div class="clothingList"><label for="b5">配件</label></div>
            </div>
            <div class="clothingList_item_boxOutside">
                <ul
                    class="clothingList_item_box"
                    id="top"
                    v-show="picked == 'b1'"
                >
                    <li class="clothingList_item">短袖</li>
                    <li class="clothingList_item">長袖</li>
                    <li class="clothingList_item">外套</li>
                    <li class="clothingList_item">背心</li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="down"
                    v-show="picked == 'b2'"
                >
                    <li class="clothingList_item">長褲</li>
                    <li class="clothingList_item">短褲</li>
                    <li class="clothingList_item">裙子</li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="top_down"
                    v-show="picked == 'b3'"
                >
                    <li class="clothingList_item">洋裝</li>
                    <li class="clothingList_item">連身褲裝</li>
                    <li class="clothingList_item">兩件式</li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="shoes"
                    v-show="picked == 'b4'"
                >
                    <li class="clothingList_item">休閒鞋</li>
                    <li class="clothingList_item">跟鞋</li>
                    <li class="clothingList_item">運動鞋</li>
                </ul>
                <ul
                    class="clothingList_item_box"
                    id="others"
                    v-show="picked == 'b5'"
                >
                    <li class="clothingList_item">包款</li>
                    <li class="clothingList_item">圍巾手套</li>
                    <li class="clothingList_item">帽子</li>
                    <li class="clothingList_item">皮帶</li>
                    <li class="clothingList_item">配件</li>
                    <li class="clothingList_item">襪子</li>
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

        div.clothingList {
            border: $line solid $title_color;
            border-top-width: 0;
            box-sizing: border-box;
            text-align: center;
            width: 20%;
        }
        div.clothingList + div.clothingList {
            border-left-width: 0;
        }
    }
    .clothingList_item_boxOutside {
        line-height: 25px;
        border-top-width: 0;
        // display: flex;
        .clothingList_item_box {
            width: 100%;
            line-height: 25px;
            border: $line solid $title_color;

            border-top-width: 0;
            box-sizing: border-box;
            .clothingList_item {
                text-align: center;
                display: inline-block;
            }
        }
        #top > .clothingList_item {
            width: 25%;
        }
        #down > .clothingList_item,
        #top_down > .clothingList_item,
        #shoes > .clothingList_item {
            width: 33.333333%;
        }
        #others > .clothingList_item {
            width: (100% / 6);
        }
    }
}
</style>
