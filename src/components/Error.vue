<template>
    <div class="card">
        <div class="btnbox">很抱歉<br />我們找不到你要查詢的頁面。</div>
        <div class="btnbox">
            <router-link to="/">
                <button class="btn_s">返回首頁</button>
            </router-link>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
};
</script>

<style lang="scss" scoped>
.title {
    font-size: 24px;
    color: #292929;
    padding-bottom: $padding;
}
.mem_container {
    background-color: $bg_gray;
}

.card {
    padding: 100px 0;
    width: 100%;
    min-height: 50vh;
    box-sizing: border-box;
    background-color: #fff;

    .btnbox {
        text-align: center;
        line-height: 20px;
        width: 100%;
        padding: 20px 0;
    }
}
</style>
