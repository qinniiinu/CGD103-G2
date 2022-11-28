<template>
    <div class="item">
        <div class="img_box">
            <img :src="link" :alt="content">
        </div>
    </div>
</template> 


<script>
export default {
    props: {
        link: String,
    }
}
</script>


<style lang="scss" scoped>
.item {
    width: 100%;
    padding: 5px;
    border: 1px solid #000;
    position: relative;
    background-color: #fff;
    margin-bottom: 30px;

    &::before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        border: 1px solid #000;
        background-color: #EEEEEE;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    &::after {
        content: "";
        position: absolute;
        top: 10px;
        left: 10px;
        border: 1px solid #000;
        background-color: #D7D7D7;
        width: 100%;
        height: 100%;
        z-index: -2;
    }

    .img_box {
        width: 100%;
        position: relative;

        img {
            width: 100%;
        }

    }
}
</style>