<template>
    <div class="body_style">
        <div class="pic">
            <img :src="tpimg" alt="">
        </div>
        <div class="text">
            <div class="title">
                {{ title }}
            </div>
            <!-- 英文 hashtag -->
            <slot></slot><!-- ?? -->
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
        // egtype: String
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
// console.log(tagName);
</script>


<style lang="scss" scoped>
.body_style{
	border: 1px solid black;
	padding: $padding;
    display: flex;
    position: relative;
    .pic{
        width: 300px;
        height: 300px;
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
            display: block;
        }
        .type{
            display: block;
        }
        .bgtag{ //<!-- ?? -->
            display:block;
            position: absolute;
            right: $padding;
        }
        .more{
            display: flex;
        }
    }
}
</style>