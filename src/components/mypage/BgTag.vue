<template>
    <p class="bg_tag">#{{Bgtag}}
    </p>
</template> 


<script>
export default {
    props: {
        Bgtag:Array,String
    }
}
</script>


<style lang="scss" scoped>
.bg_tag {
    z-index: -1;
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
