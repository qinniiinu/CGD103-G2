<template>
    <div class="product_card">
        <div class="box">
            <router-link :to="`/productDetails/${id}`">
                <img
                    :src="`https://tibamef2e.com/cgd103/g2/front/pic/${imgURL}`"
                />
            </router-link>

            <div class="icon" @click="clloectchange()">
                <font-awesome-icon
                    icon="fa-solid fa-heart"
                    :class="{ gray: !clloect }"
                />
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
        aspect-ratio: 1 /1;
        overflow: hidden;
        position: relative;
        .icon {
            position: absolute;
            font-size: 20px;
            top: 0;
            right: 0;
            padding: 5px;
            cursor: pointer;
        }
        .gray {
            color: $second_color;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
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
    p.price {
        font-size: 12px;
        @include m() {
            font-size: 16px;
        }
    }
}
</style>

<script>
import { BASE_URL } from "@/assets/js/common.js";

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
        clloect: { Boolean, default: "false" },
    },
    methods: {
        clloectchange() {
            this.$emit("clloectchange");
            fetch(`${BASE_URL}/collect_prodAdd.php`, {
                method: "POST",
                credentials: "include",
                body: JSON.stringify({ id: this.id }),
            })
                .then((response) => response.json())
                .then((data) => {
                    // 在這裡處理服務器返回的數據
                    alert(data.msg);
                });
        },
    },
};
</script>