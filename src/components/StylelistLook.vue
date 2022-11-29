<template> 
<div class="stylelist-card">
    <div class="stylelist-card-info">
        <div class="card-info-pic">
            <img src="scardP" alt="">
        </div>
        <h3 >{{stylelistName}}</h3>
        <p>{{stylelistInfo}}</p>
    </div>
    <div class="stylelist-card-look">
        <div class="look-item" v-for="lookItem of lookItems" :key="lookItem">
            <img :src="lookItem.src" alt="">
        </div>
    </div>
</div>




</template> 


<script>
export default {
	name: "Stylelist",

    components: {

	},

    props:{
        stylelistName:String,
        stylelistInfo:String,
    },

    data() {
    	return {
            scardP:[{},
                    {src:'./cover_img2.JPG'},],
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
.stylelist-card{
    display: flex;
    width: 100%;
    margin: auto;
    max-width: 1200px;
    .stylelist-card-info{
        width: 30%;
    };
    .stylelist-card-look{
        width: 70%;
        display: flex;
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    };

}
   .card-info-pic{
    width: 50px;
    height: 50px;
    img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
   }

</style>