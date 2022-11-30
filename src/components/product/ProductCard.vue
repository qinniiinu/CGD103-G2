<template>
    <div class="product_card">
        <div class="box">
            <img :src="require(`@/assets/product/${imgURL}`)" />
            <font-awesome-icon icon="fa-solid fa-heart" class="icon" />
        </div>
        <p class="title">{{ title }}</p>
        <p class="price">NT${{ price }}</p>
    </div>
</template>
<style lang="scss" scoped>
.product_card {
    padding-bottom: 10px;
    .box {
        margin: 5px;
        border: $line solid $title_color;
        aspect-ratio: 1/1;
        position: relative;
        .icon {
            position: absolute;
            font-size: 20px;
            top: 0;
            right: 0;
            padding: 5px;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }
    p {
        margin-left: 10px;
        font-size: 14px;
        padding: 5px;
    }
}
</style>

<script>
export default {
    props: {
        title: String,
        price: String,
        imgURL: String,
    },
};
</script>