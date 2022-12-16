<template>
    <span class="bg_tag">#{{Bgtag}}</span>
</template> 


<script>
export default {
    props: {
        Bgtag:String
    }
}
</script>


<style lang="scss" scoped>
.bg_tag {
    color: $bg_violet;
    @include font_set($second_font, $null, 900, italic);
    @include s() {
        font-size: 50px;
    }
    @include m() {
        font-size: 60px;
    }
    @include xl() {
        font-size: 72px;
    }
}
</style>
