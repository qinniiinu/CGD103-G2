<template> 
<div class="stylist-card">
    <div class="stylist-card-info">
        <div class="card-info-pic">
            <img :src="scardP" alt="">
        </div>
        <h3 >{{stylistName}}</h3>
        <p>{{stylistInfo}}</p>
    </div>
    <div class="stylist-card-look">
        <div class="look-item" v-for="lookItem of lookItems" :key="lookItem">
                <img :src="lookItem.src" alt="">
                <Button class="look_btn" content="查看更多"></Button>
        </div>
    </div>
</div>




</template> 


<script>
import Button from "@/components/Button.vue"; 
export default {
	name: "StylistLook",

    components: {
        Button,
	},

    props:{
        stylistName:String,
        stylistInfo:String,
        scardP:String,

    },

    data() {
    	return {
         
            lookItems:[
                {src:'./ootd-look-1.jpg'},
                {src:'./ootd-look-2.jpg'},
                {src:'./ootd-look-3.jpg'},
                {src:'./ootd-look-2.jpg'},

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
    display: flex;
    flex-direction: column;
    width: 80%;
    margin: 30px auto;
    max-width: 1200px;
    @include m{
        flex-direction: row;
		}
    .stylist-card-info{
        @include m{
            width: 20%;
            margin-right: 20px;
            height: 360px;
		}
		margin: auto;
        width: 80%;
        display: flex;
        text-align: center;
        flex-direction: column;
        border: 1px solid $main_color;
        align-items: center;
      
        .card-info-pic{
            margin:20px 0px 5px;
            
        }
        h3{
            font-size: 24px;
            font-weight: 700;
            line-height: 38px
        }
        p{
            font-size:14px;
            line-height:22px ;
            width:70%;
            margin-bottom: 20px
        }
    };
    .stylist-card-look{
        margin: 10px auto;
        gap: 10px;
        justify-content: space-between;
        width: 80%;
        @include m{
            width: 80%;
              // gap: 15px;
            // margin-right: 20px;
            flex-wrap: nowrap;
             height: 360px;
		}
        flex-wrap: wrap;
        .look-item{
            width: 48%;
            position: relative;
        }
        // flex-wrap: wlorap;
       
        display: flex;


        img{

            width: 100%;
            height: 100%;
            object-fit: cover;
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
        border-radius: 500px;
        width: 100%;
        height: 100%;
        object-fit: top;
    }
   }
    .look_btn{
        position:absolute;
        z-index: 1;
        bottom: 30px;
        left: 0;
        right: 0;
        margin: auto;
        font-size: 14px;
        width:100px ;
        line-height:30px ; 
    }
</style>