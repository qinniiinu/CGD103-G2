<template >
    <div class="outside">
        <p class="block">服飾總覽</p>
        <div class="ProductSideMenu">
            <div v-for="item in main_list" :key="item.id" class="main">
                <label :for="item.id">
                    <div class="left_right">
                        <p>{{ item.sex }}</p>
                        <p>
                            <font-awesome-icon
                                icon="fa-solid fa-plus"
                                v-show="find(item.sex) != item.sex"
                            />
                        </p>
                    </div>
                </label>
                <input
                    type="checkbox"
                    :id="item.id"
                    :value="item.sex"
                    v-model="main"
                />
                <div
                    v-show="find(item.sex) == item.sex"
                    class="sub_list"
                    v-for="(e, i) in item.list"
                    :key="e.id"
                >
                    <label :for="e.id">
                        <div class="left_right">
                            <p>{{ e.name }}</p>
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
                    >
                        <p>{{ item3.name }}</p>
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
        id: "W",
        sex: "女",
        list: [
            {
                id: "Wtop",
                name: "上身",
                sub_list: [
                    { name: "短袖" },
                    { name: "長袖" },
                    { name: "外套" },
                ],
            },
            {
                id: "Wdown",
                name: "下身",
                sub_list: [
                    { name: "短褲" },
                    { name: "長褲" },
                    { name: "裙子" },
                ],
            },
            {
                id: "Wshoes",
                name: "鞋款",
                sub_list: [
                    { name: "皮鞋" },
                    { name: "運動鞋" },
                    { name: "跟鞋" },
                ],
            },
            {
                id: "Wother",
                name: "配件",
                sub_list: [{ name: "包款" }, { name: "配件" }],
            },
        ],
    },
    {
        id: "F",
        sex: "男",
        list: [
            {
                id: "Ftop",
                name: "上身",
                sub_list: [
                    { name: "短袖" },
                    { name: "長袖" },
                    { name: "外套" },
                ],
            },
            {
                id: "Fdown",
                name: "下身",
                sub_list: [{ name: "短褲" }, { name: "長褲" }],
            },
            {
                id: "Fshoes",
                name: "鞋款",
                sub_list: [{ name: "皮鞋" }, { name: "運動鞋" }],
            },
            {
                id: "Fother",
                name: "配件",
                sub_list: [{ name: "包款" }, { name: "配件" }],
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
        openList(X) {
            let cc = false;
            console.log(X);
            console.log(this.sub);
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
        font-weight: 600;
        padding: 10px;
    }

    .ProductSideMenu {
        width: 200px;
        padding: 10px;
        input {
            display: none;
        }
        .main {
            line-height: 30px;

            .left_right {
                justify-content: space-between;
                cursor: pointer;
                p {
                    cursor: pointer;
                }
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