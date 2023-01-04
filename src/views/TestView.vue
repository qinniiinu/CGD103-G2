<template>
    <!-- 會員 container -->
    <div class="mem_container">
        <!-- 側邊攔 -->
        <!-- <SideMenu></SideMenu> -->
        <!-- 右側資料 -->
        <div class="mem_data">
            <h1>This is測試 page</h1>

            <button @click="action" class="btn_s">btn</button>
            <button @click="action" class="btn_l">btn</button>
            <button @click="action" class="btn_ms">btn</button>
            <button @click="action" class="btn_ms">btn</button>
            <button @click="action" class="btn_ml">btn</button>
            <button @click="action" class="btn_mgs">btn</button>
            <button @click="action" class="btn_mgl">btn</button>
            <div class="box"></div>
            <ProductFitting></ProductFitting>
        </div>
    </div>
</template>

<script>
import ProductFitting from "@/components/product/ProductFitting.vue";
export default {
    name: "Test",
    components: {
        // SideMenu,
        ProductFitting,
    },
    methods: {
        action() {
            console.log("測試按鈕");
        },
    },
};
</script>

<style lang="scss" scoped>
.mem_container {
    display: flex;
    width: 100%;
    margin: auto;
    .mem_data {
        flex-grow: 1;
    }
}
</style>
