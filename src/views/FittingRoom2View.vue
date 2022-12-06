<template>
    <div class="wrapper">
        <div id="wrap1">
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <div id="wrap2">
            <img :src="item.image" alt="" v-for="item in product" :key="item.id">
        </div>
    </div>
</template>
<script>
import{fit} from '@/assets/config/setting.js'
export default{
    data(){

    },
    methods:{
        fit
    }
}
</script>
<style>
* {
    box-sizing: border-box;
}

.wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

/* .wrapper .wrap1, .wrapper .wrap2{
            width: 100% !important;
            border: 1px solid red;
            background-color: #af0;
        } */
#wrap1 {
    width: 100%;
}

#wrap2 {
    width: 100%;
}

#box1 {
    width: 100px;
    height: 100px;
    background-color: #fa0;
    position: absolute;
}

#box2 {
    width: 100px;
    height: 100px;
    background-color: #af0;
    position: absolute;
    left: 100px;
}

#wrap1 {
    position: relative;
    border: 1px solid #ddd;
    min-height: 500px;
}

.item {
    width: 100px;
    height: 100px;
    background-color: #af0;
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    
}
.item:nth-child(2){
    left: 60%;
}

.item img {
    width: 100%;
}

#wrap2 {
    /* width: 50%; */
    height: 500px;
    border: 1px solid darkcyan;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

#wrap2 img {
    width: 100px;
    height: 100px;
}

@media screen and (min-width:768px) {
    #wrap1 {
        width: 50%;
    }

    #wrap2 {
        width: 50%;
    }
}
</style>