<template>
    <div class="box">
        <i v-for="item in array" :key="item">{{ item }}</i>
    </div>
</template>

<script>
export default {
    name: "HashTag",
    data() {
        return {
            array: ["分類", "分類一", "分類 X一", "分類sd一", "dd分類一"],
        };
    },
};
</script>

<style lang="scss" scoped>
i {
    display: inline-block;
    border: $line solid $main_color;
    width: fit-content;
    padding: 2px;
    margin: 10px;
    text-align: center;
}
</style>