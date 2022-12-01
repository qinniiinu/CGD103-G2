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
        font-size: 56px;
    }
    @include m() {
        font-size: 72px;
    }
}
</style>
