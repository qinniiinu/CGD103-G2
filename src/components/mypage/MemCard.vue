<template>
    <div class="body_style">
        <div class="pic">
            <!-- <img :src="typeimg" alt=""> -->
            <img src="https://picsum.photos/300/200/?random=10">
        </div>
        <div class="text">
            <h3 class="title">{{ title }}</h3>
            <!-- hashtag -->
            <slot></slot>
            <a href="#" class="more">
                <span class="text">查看更多</span>
                <font-awesome-icon icon="fa-solid fa-angle-right"/>
            </a>
        </div>
    </div>
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
    }
    .text{
    margin-left: $padding;
    display: flex;
    flex-direction: column;
        .title{
            font-size: 26px;
            display: block;
            color: $title_color;
        }
        .more{
            display: flex;
            position: absolute;
            align-items: center;    
            right: $padding;
            bottom: $padding;
            .text{
                font-family: $main_font;
                padding-right: 5px;
            }
        }
    }
}
</style>