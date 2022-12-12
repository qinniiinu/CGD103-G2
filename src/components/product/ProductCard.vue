<template>
    <div class="product_card">
        <div class="box">
            <router-link :to="`/productDetails/${id}`">
                <img :src="require(`@/assets/product/${imgURL}`)" />
            </router-link>

            <div class="icon" @click="iconChange = !iconChange">
                <font-awesome-icon icon="fa-solid fa-heart" v-if="iconChange" />
                <font-awesome-icon icon="fa-solid fa-plus" v-else />
            </div>
        </div>
        <router-link :to="`/productDetails/${id}`">
            <p class="title">{{ title }}</p>
            <p class="price">NT${{ price }}</p>
        </router-link>
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
            cursor: pointer;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }
    p {
        color: $text_color;
        margin-left: 10px;
        font-size: 14px;
        padding: 5px;
        @include m() {
            font-size: 20px;
        }
    }
}
</style>

<script>
export default {
    data() {
        return {
            iconChange: true,
        };
    },
    props: {
        id: { String, default: "1" },
        title: { String, default: "404" },
        price: { String, default: "404" },
        imgURL: { String, default: "test_01_1.jpg" },
    },
};
</script>