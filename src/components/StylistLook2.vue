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
                    <router-link to="/Set"><Button class="look_btn" content="查看更多"></Button></router-link> 
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
                    {src:'/ootd-look-1.jpg'},
                    {src:'/ootd-look-2.jpg'},
                    {src:'/ootd-look-3.jpg'},
                    {src:'/ootd-look-2.jpg'},
    
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
                width: 80%;
                max-width: 960px;
                display: flex;
                flex-wrap: wrap;
                align-content: stretch;
                
    
    
                .stylist-card-info{
                    @include l{
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
                @include l{
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
                    @include l{
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
            font-size: 14px;
            width:100px ;
            line-height:30px ; 
        }
    </style>