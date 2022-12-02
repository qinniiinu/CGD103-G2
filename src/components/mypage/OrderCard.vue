<template>
    <section class="order_card">
        <div class="title">
            <h3 class="tit">{{ title }}</h3>
        </div>
        <ul class="data">
            <slot></slot>
        </ul>
    </section>
</template> 

<script>

export default {
	name: "OrderCard",
    props: {
        title: String,
    },
    components: {
	},
    data() {
        return {
        }
    },
}        
</script>

<style lang="scss" scoped>
.order_card{
        background-color: #fff;
        min-height: 15;
        border: 1px solid $title_color;
        padding: 25px;
        position: relative;
    .title{
        display: flex;
        justify-content: space-between;
        .tit{
            font-size: 26px;
            color: $title_color;
        }
    }
    .data{
        height: 100vh;
        max-width :100%;
        overflow: auto;
            
        }
}
</style>