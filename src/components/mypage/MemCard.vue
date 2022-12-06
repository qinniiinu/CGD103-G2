<template>
    <section class="body_style">
        <div class="pic">
            <!-- <img :src="typeimg" alt=""> -->
            <img src="https://picsum.photos/300/200/?random=10">
        </div>
        <div class="text">
            <h3 class="title">{{ title }}</h3>
            <!-- hashtag -->
            <slot></slot>
        </div>
    </section>
</template> 


<script>
import BgTag from "@/components/mypage/BgTag.vue";
import TypeTag from "@/components/mypage/TypeTag.vue";

export default {
    props: {
        title: String,
        type: String,
    },
    components: {
		BgTag,
        TypeTag
	},
    data() {
        return {

        }
    },
}        
</script>

<style lang="scss" scoped>
.body_style{
    background-color: #fff;
	border: 1px solid black;
	padding: 25px;
    display: flex;
    position: relative;

    .pic{
        width: 250px;
        height: 250px;
        aspect-ratio: 1/1;
        img{
            width: 100%;
            height: 100%;
            object-fit:cover;
        }
            @include s() {
        width: 150px;
        height: 150px;

    }
	@media screen and (max-width: 1200px) {
		width: 200px;
        height: 200px;
	}

    }
    .text{
    margin-left: $padding;
    display: flex;
    flex-direction: column;
        .title{
            font-size: 24px;
            display: block;
            font-weight: 700;
            color: $title_color;
        }
    }
}
</style>