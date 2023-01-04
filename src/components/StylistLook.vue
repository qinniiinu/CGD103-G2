<template> 
<div class="stylist-card">
    
    <div class="stylist-card-look">
        <div class="stylist-card-info">
            <div class="card-info-pic">
                <img :src="scardP" alt="">
            </div>
            <h3 >{{stylistName}}</h3>
            <p>{{stylistInfo}}</p>
        </div>

        <div class="look-item" v-for="lookItem of lookItems" :key="lookItem">
                <img :src="lookItem.src" alt="">
                <router-link :to="`/Set/${lookItem.link}`"><button class="look_btn btn_ns">查看更多 </button></router-link> 
        </div>
    </div>
</div>




</template> 


<script>

export default {
	name: "StylistLook",

    components: {

	},

    props:{
        stylistName:String,
        stylistInfo:String,
        scardP:String,

    },

    data() {
    	return {
         
            lookItems:[
                {src:'./look/ootd-look-1.jpg',link:'908'},
                {src:'./look/ootd-look-2.jpg',link:'905'},
                {src:'./look/ootd-look-3.jpg',link:'903'},
                {src:'./look/ootd-look-2.jpg',link:'904'},

            ],
    	} 
  	},
	mounted () {
		
	},

	computed: {
		
		
	},
	methods:{
		
	}
	

}
</script>


<style lang="scss" scoped>

    .stylist-card{

        margin: 0px auto;

        .stylist-card-look{
            margin: 0px auto;
            gap: 10px;
            justify-content: space-between;
            width: 60%;
            max-width: 960px;
            display: flex;
            flex-wrap: wrap;
            align-content: stretch;
            @include m{
                width: 90%;
            }
            


            .stylist-card-info{
                @include m{
                    width: 0;
                    flex-grow: 1;


                }

                background-color: $second_color;

                width: 100%;
                display: flex;
                text-align: center;
                flex-direction: column;
                border: 1px solid $main_color;
                align-items: center;
                .card-info-pic{

                    transform: scale(80%);
                    
                    img{
                        width: 100%;
                        height: 100%;
                        object-fit:cover ;
                    }
                }
                h3{
                    font-size: 24px;
                    font-weight: 700;
                    line-height: 38px
                }
                p{
                    font-size:14px;
                    line-height:22px ;
                    // width:70%;
                    margin: 0px 5%;
                    margin-bottom: 20px;
                    // overflow: hidden;

                }



            };
            @include m{
                flex-wrap: nowrap;
            }
            
            .look-item{
                // width: 80%;
                border: 1px solid $main_color;
                // margin: auto;
                img{
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    // max-height: 200px;
                }
                @include m{
                    width: 0;
                    flex-grow: 1;

                    vertical-align: middle;
                    // height: 0;
                }
                position: relative;
            }

        };

    }

    .stylist-card:last-child{
        margin-bottom: 100px;
    }

   .card-info-pic{
    width:100px;
    height:100px;
    @include l{
        width:120px;
        height:120px;
        
	}
    @include xl{
        width:150px;
        height:150px;
        
	}

    img{
        border: 1px solid $main_color;
        border-radius: 500px;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
    }
   }
    .look_btn{
        position:absolute;
        z-index: 1;
        bottom: 30px;
        left: 0;
        right: 0;
        margin: auto;
        font-size: 16px;
        padding: 10px 15px;
        @include m{
            font-size: 14px;
            padding: 5px 5px;
        }
      

    }
</style>