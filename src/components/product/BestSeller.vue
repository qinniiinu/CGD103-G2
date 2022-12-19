<script>
// core version + navigation, pagination, autoplay modules:
import Swiper, { Navigation, Pagination, Autoplay } from "swiper";
// import styles bundle
import "swiper/swiper-bundle.min.css";

export default {
    name: "BestSeller",
    data() {
        return {
            activeIndex: 0,
        };
    },
    mounted() {
        const SECOND = 1000; // milliseconds

        // init Swiper:
        new Swiper(this.$refs.swiper, {
            // configure Swiper to use modules
            modules: [Navigation, Pagination, Autoplay],

            loop: true,
            autoplay: {
                delay: 3 * SECOND,
                disableOnInteraction: false,
            },
            speed: 2 * SECOND,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            // Events
            on: {
                slideChange: (swiper) => {
                    this.activeIndex = swiper.realIndex;
                },
            },
        });
    },
};
</script>

<template>
    <!-- Slider main container -->
    <div ref="swiper" class="swiper disp">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="@/assets/product/bestseller_01.jpg" alt="" />
            </div>
            <div class="swiper-slide">
                <img src="@/assets/product/bestseller_02.jpg" alt="" />
            </div>
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- <div class="swiper-pagination"></div> -->
    </div>
</template>

<style lang='scss' scoped>
.swiper {
    max-width: $max-width;
    margin: auto;
    z-index: -1;
}
.swiper.disp {
    @include m() {
        display: none;
    }
}
img {
    width: 100%;
    height: 100%;
    max-height: 600px;
    object-fit: contain;
}
.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
