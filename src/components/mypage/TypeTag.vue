<template>
    <p class="bg_tag"># {{TypeTag}}
    </p>
</template> 


<script>
export default {
    props: {
        TypeTag:Array,String
    }
}
</script>


<style lang="scss" scoped>
.bg_tag {
    color: $title_color;
    font-weight: 700;
    @include s() {
        font-size: 40px;
    }
    @include m() {
        font-size: 48px;
    }
    @include xl() {
        font-size: 66px;
    }
}
</style>
