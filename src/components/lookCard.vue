<template>
    <div class="card">
        <div class="img_box">
            <img :src="link" :alt="content">

            <label :for="heartId">
                <input type="checkbox" :id="heartId">
                <div class="icon"><font-awesome-icon icon="fa-solid fa-heart" /></div>
            </label>
            
        </div>
        <h3>{{ootdName}}</h3>
        <div class="hashtag">
            <p v-for="(tag,index) of tags" :key="index">{{tag}}</p>
        </div>
       
    </div>
</template> 


<script>
export default {
    props: {
        link:String,
        content: String,
        ootdName: String,
        tag:Array,
        heartId:String,
    },
    data(){
        return{
            tags:['','','','']

        }
    },
    

}
</script>


<style lang="scss" scoped>
.card{
   
    width: 100%;
    .img_box{
        border: 1px solid $title_color;
        width: 100%;
        position: relative;
        img{
            vertical-align: middle;
            width: 100%;
            height: 100%;
            object-fit: cover;       
        }
        label{
            
            .icon{
                font-size:20px ;
                position:absolute;
                top: 5px  ;
                right: 5px;

                // -webkit-text-stroke:2px $main_color;
                // color: rbga(23,23,23,.3);
                color:rgba(64, 62, 96, 0.3);
            }
            input{
                display: none;
                &:checked+.icon{
                        color:$main_color;

                }
            }
        }
       
    }
    h3{
        font-size: 24px;
        font-weight: 700;
        line-height: 36px;
        color: $title_color;
    }
    .hashtag{
        display: flex;
        flex-wrap: wrap;

        p{
            background-color: $main_color;
            color: $third_color;
            font-size: 12px;
            font-weight: 400;
            padding:5px 10px;
            margin: 3px;
        }
        
    }
}

</style>