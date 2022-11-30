<template>
    <p class="bg_tag">#{{tagName}}
    </p>
</template> 


<script>
export default {
    props: {
        tagName: String,
    }
}
</script>


<style lang="scss" scoped>
.bg_tag {
    position: absolute;
    z-index: -1;
    right: 10px;
    color: $bg_violet;
    @include font_set($second_font, $null, 900, italic);
    @include s() {
        font-size: 56px;
    }
    @include m() {
        font-size: 72px;
    }
}
</style>
