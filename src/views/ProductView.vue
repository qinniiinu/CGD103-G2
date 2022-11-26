<template>
    <div class="producut">
        <h1>This is a商品 page</h1>
        <ProductMenu />
        <!-- <Footer></Footer> -->
    </div>
</template>

<script>
import Footer from "@/components/Footer.vue";
import ProductMenu from "@/components/ProductMenu.vue";
export default {
    name: "Product",

    components: {
        Footer,
        ProductMenu,
    },
    props: {},
};
</script>
