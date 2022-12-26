<template>
    <div class="card">
        <div class="img_box">
            <router-link :to="`/Set/${idlink}`">
                <img :src="link" :alt="content">
            </router-link>

            <label :for="heartId">
                <input type="checkbox" :id="heartId">
                <div class="icon"><font-awesome-icon icon="fa-solid fa-heart" /></div>
            </label>
            
        </div>
        

        <router-link :to="`/Set/${idlink}`">
            <h3>{{ootdName}}</h3>
        </router-link>

        <div class="hashtag">
            <p>{{tag1}}</p>
            <p>{{tag2}}</p>
            <p>{{tag3}}</p>
        </div>
       
    </div>
</template> 


<script>
export default {
    props: {
        link:String,
        idlink:String,
        content: String,
        ootdName: String,
        tag1:String,
        tag2:String,
        tag3:String,
        heartId:String,
    },
//     data(){
//         return{
//             tags:[]
// 
//         }
//     },
    computed:{
        tags(){
            return this.tag && this.tag.length>0 ? this.tag:[]
        }

    },
    

}
</script>


<style lang="scss" scoped>
.card{
    
   
    width: 100%;
    .img_box{
        cursor: pointer;
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
                cursor: pointer;

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
        @include m{
            font-size: 22px;
        }
        
        @include l{
            font-size: 20px;
        }
        
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