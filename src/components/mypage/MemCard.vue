<template>
    <div class="body_style">
        <div class="pic">
            <img :src="tpimg" alt="">
        </div>
        <div class="text">
            <div class="title">
                {{ title }}
            </div>
            <div class="type">
                # {{ type }}
            </div>
            <div class="eg_type">
                #{{ egtype }}
            </div>
            <a href="#" class="more">
                <span class="text">查看更多</span>
                <font-awesome-icon icon="fa-solid fa-angle-right"/>
            </a>
        </div>
    </div>
</template> 


<script>
export default {
    props: {
        title: String,
        type: String,
        egtype: String
    }
}
</script>


<style lang="scss" scoped>
.body_style{
	border: 1px solid black;
	padding: $padding;
    display: flex;
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
        .title{
            display: flex;
        }
        .type{
            display: flex;

        }
        .eg_type{
            display: flex;

        }
        .more{
            display: inline;
        }
    }
}
</style>