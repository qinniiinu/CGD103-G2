 <template >
    <div class="outside">
        <p class="block">服飾總覽</p>
        <div class="ProductSideMenu">
            <div v-for="(item, index) in main_list" :key="index" class="main">
                <div class="left_right" @click="item.isOpen = !item.isOpen">
                    <p>{{ item.name }}</p>
                    <font-awesome-icon icon="fa-solid fa-plus" />
                </div>
                <div
                    class="sub_list"
                    v-show="item.isOpen"
                    v-for="(item2, index) in item.children"
                    :key="index"
                >
                    <p>{{ item2 }}</p>
                </div>
            </div>
        </div>
        <p class="block">尺寸</p>
        <i>XS</i>
        <i>S</i>
        <i>M</i>
        <i>L</i>
        <i>XL</i>
        <p class="block">價格區間</p>
        <p class="block">#HashTag</p>
    </div>
</template>
<script>
const productside = [
    {
        name: "上衣",
        isOpen: false,
    },
    {
        name: "下身",
        isOpen: false,
    },
    {
        name: "套裝",
        isOpen: false,
    },
    {
        name: "鞋款",
        isOpen: false,
    },
    {
        name: "配件",
        isOpen: false,
    },
];
export default {
    name: "ProductMenu",
    data() {
        return {
            main_list: productside,
            isOpen: false,
        };
    },
};
</script>
<style lang="scss" scoped>
.outside {
    @include s() {
        display: none;
    }
    padding: 10px;
    .block {
        border-bottom: 1px solid $title_color;
        padding: 10px;
    }
    .ProductSideMenu {
        width: 200px;
        padding: 10px;
        .main {
            line-height: 30px;
            .left_right {
                justify-content: space-between;
            }
            .sub_list {
                padding-left: 20px;
            }
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