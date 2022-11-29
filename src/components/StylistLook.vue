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
         
            lookItems:[{src:'./cover_img1.JPG'},
                [{src:'./cover_img1.JPG'}],
                [{src:'./cover_img1.JPG'}],
                [{src:'./cover_img1.JPG'}],
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
    width: 100%;
    margin: auto;
    max-width: 1200px;
    .stylist-card-info{
        width: 25%;
    };
    .stylist-card-look{
        width: 75%;
        display: flex;
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    };

}
   .card-info-pic{
    width:150px;
    height:150px;

    img{
        border-radius: 500px;
        width: 100%;
        height: 100%;
        object-fit: top;
    }
   }

</style>