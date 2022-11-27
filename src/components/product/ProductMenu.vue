<template>
    <div>
        <div class="productMenu">
            <ul class="menOrWomen">
                <li @click="openBox(open)">全部</li>
                <li @click="openBox(open)">女裝</li>
                <li @click="openBox(open)">男裝</li>
            </ul>
            {{ open }}
            <div class="colthingList_box">
                <div class="clothingList">上身</div>
                <div class="clothingList">下身</div>
                <div class="clothingList">套裝</div>
                <div class="clothingList">鞋款</div>
                <div class="clothingList">配件</div>
            </div>
            <div :class="{ clothingList_item_boxOutside: true, show: open }">
                <ul class="clothingList_item_box" id="top">
                    <li class="clothingList_item">短袖</li>
                    <li class="clothingList_item">長袖</li>
                    <li class="clothingList_item">外套</li>
                    <li class="clothingList_item">背心</li>
                </ul>
                <ul class="clothingList_item_box" id="down">
                    <li class="clothingList_item">長褲</li>
                    <li class="clothingList_item">短褲</li>
                    <li class="clothingList_item">裙子</li>
                </ul>
                <ul class="clothingList_item_box" id="top_down">
                    <li class="clothingList_item">洋裝</li>
                    <li class="clothingList_item">連身褲裝</li>
                    <li class="clothingList_item">兩件式</li>
                </ul>
                <ul class="clothingList_item_box" id="shoes">
                    <li class="clothingList_item">休閒鞋</li>
                    <li class="clothingList_item">跟鞋</li>
                    <li class="clothingList_item">運動鞋</li>
                </ul>
                <ul class="clothingList_item_box" id="others">
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
        return {};
    },
    props: {
        name: {
            open: Boolean,
        },
    },
    methods: {
        openBox(x) {
            console.log(123);
            console.log(this.x);
            this.x = this.x == true ? false : true;
            console.log(this.x);
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
.show {
    display: block !important;
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
        display: none;
        color: $title_color;
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
        display: none;

        line-height: 25px;
        border: $line solid $title_color;
        border-top-width: 0;
        // display: flex;
        .clothingList_item_box {
            width: 100%;

            & + .clothingList_item_box {
                border-top: $line solid $title_color;
            }
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
