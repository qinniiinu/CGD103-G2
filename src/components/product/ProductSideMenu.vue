 <template >
    <input type="checkbox" value="1" v-model="main" />
    <input type="checkbox" value="2" v-model="main" />
    <div class="outside">
        <p class="block">服飾總覽</p>
        <div class="ProductSideMenu">
            <div v-for="item in main_list" :key="item.id" class="main">
                <div class="left_right">
                    <p>{{ item.sex }}</p>
                    <p><font-awesome-icon icon="fa-solid fa-plus" /></p>
                    <input type="checkbox" :value="item.sex" v-model="main" />
                </div>
                <div
                    class="sub_list"
                    v-for="(item2, index) in item.list"
                    :key="index"
                    v-show="find(item.sex) == item.sex"
                >
                    <div class="left_right">
                        <p>{{ item2.name }}</p>
                        <p><font-awesome-icon icon="fa-solid fa-plus" /></p>
                        <input
                            type="checkbox"
                            :value="item2.name"
                            v-model="sub[index]"
                        />
                    </div>
                    <div
                        class="sub_list"
                        v-for="(item3, index) in item2.sub_list"
                        :key="index"
                        v-show="findSub(item2.name) == item2.name"
                    >
                        <p>{{ item3 }}</p>
                    </div>
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
        sex: "女",
        list: [
            {
                id: "top",
                name: "上身",
                sub_list: ["短袖", "長袖", "外套"],
            },
            {
                id: "down",
                name: "下身",
                sub_list: ["短褲", "長褲", "裙子"],
            },
            {
                id: "shoes",
                name: "鞋款",
                sub_list: ["皮鞋", "運動鞋", "跟鞋"],
            },
            {
                id: "others",
                name: "配件",
                sub_list: ["包款", "配件"],
            },
        ],
    },
    {
        sex: "男",
        list: [
            {
                name: "上身",
                sub_list: ["短袖", "長袖", "外套"],
            },
            {
                name: "下身",
                sub_list: ["短褲", "長褲"],
            },
            {
                name: "鞋款",
                sub_list: ["皮鞋", "運動鞋"],
            },
            {
                name: "配件",
                sub_list: ["包款", "配件"],
            },
        ],
    },
];
export default {
    name: "ProductMenu",
    data() {
        return {
            main_list: productside,
            main: [],
            sub: [],
        };
    },
    methods: {
        find(X) {
            // console.log(X);
            return this.main.find((e) => e == X);
        },
        findSub(X) {
            // console.log(this.sub);
            // return this.sub.find((e) => e == X);
        },
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