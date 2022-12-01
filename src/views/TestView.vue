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
            <div class="box"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Test",
    components: {
        // SideMenu,
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
