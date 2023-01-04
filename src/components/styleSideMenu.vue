<template> 
    <div class="sideMenu">
        <div class="sideMenu-group">
            <div class="sideMenu-group-title">
                <h3>情境</h3>
            </div> 
            <div class="sideMenu-group-type">
                <label v-for=" (type,index) of types" :key="index" class="group-type" :for="type.id" >
                    <input type="checkbox" :id="type.id" name="groupType">
                    <p>{{type.typeName}}</p>
                </label>
            </div>
        </div>
        <div class="sideMenu-group">
            <div class="sideMenu-group-title">
                <h3>身形</h3>
            </div> 
            <div class="sideMenu-group-type">
                <label v-for=" (bodyShap,index) of bodyShaps" :key="index" class="group-type" :for="bodyShap.id" >
                    <input type="checkbox" :id="bodyShap.id" name="bodyShapGroupType">
                    <p>{{bodyShap.typeName}}</p>
                </label>
            </div>
        </div>
        <div class="sideMenu-group">
            <div class="sideMenu-group-title">
                <h3>材質</h3>
            </div> 
            <div class="sideMenu-group-type">
                <label v-for=" (material,index) of materials" :key="index" class="group-type" :for="material.id" >
                    <input type="checkbox" :id="material.id" name="materialGroupType">
                    <p>{{material.typeName}}</p>
                </label>
            </div>
        </div>
        <div class="sideMenu-group">
            <div class="sideMenu-group-title">
                <h3>花色</h3>
            </div> 
            <div class="sideMenu-group-type">
                <label v-for=" (color,index) of colors" :key="index" class="group-type" :for="color.id" >
                    <input type="checkbox" :id="color.id" name="colorGroupType">
                    <p>{{color.typeName}}</p>
                </label>
            </div>
        </div>
        <div class="sideMenu-group">
            <div class="sideMenu-group-title">
                <h3>版型</h3>
            </div> 
            <div class="sideMenu-group-type">
                <label v-for=" (version,index) of versions" :key="index" class="group-type" :for="version.id" >
                    <input type="checkbox" :id="version.id" name="versionGroupType">
                    <p>{{version.typeName}}</p>
                </label>
            </div>
        </div>
    </div>

</template> 


<script>

export default {
	name: "styleSideMenu",

    components: {
        
	},

    props:{
        stylistName:String,
        stylistInfo:String,
        scardP:String,

    },

    data() {
    	return {
         
            types:[
              { id:'work',typeName:'#上班穿搭'},
              { id:'party',typeName:'#趴踢穿搭'},
              { id:'date',typeName:'#約會穿搭'},
              { id:'beach',typeName:'#海邊穿搭'},
              { id:'class',typeName:'#上課穿搭'},
              { id:'interview',typeName:'#面試穿搭'},
              { id:'meeting',typeName:'#開會穿搭'},
              { id:'banquet',typeName:'#宴會穿搭'},
              { id:'travel',typeName:'#旅行穿搭'},
              { id:'sport',typeName:'#運動穿搭'},
            ],
            bodyShaps:[
              { id:'apple',typeName:'#蘋果形'},
              { id:'pear',typeName:'#梨形'},
              { id:'rectangle',typeName:'#長方形'},
              { id:'hourglass',typeName:'#沙漏形'},
              { id:'athletic',typeName:'#倒三角形'},
            ],
            materials:[
              { id:'wool',typeName:'#羊毛'},
              { id:'cotton',typeName:'#棉質'},
              { id:'knitting',typeName:'#針織'},
              { id:'Denim',typeName:'#單寧'},
            ],
            colors:[
              { id:'plainColor',typeName:'#素色'},
              { id:'stripe',typeName:'#條紋'},
              { id:'cool',typeName:'#冷色系'},
              { id:'warm',typeName:'#暖色系'},
              { id:'earth',typeName:'#大地色系'},
            ],
            versions:[
              { id:'fit',typeName:'#合身'},
              { id:'loose',typeName:'#寬鬆'},
              { id:'widePants',typeName:'#寬褲'},
              { id:'leggings',typeName:'#緊身褲'},
              { id:'longSkirt',typeName:'#長裙'},
              { id:'skirt',typeName:'#短裙'},
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

    .sideMenu{
        @include m{
            width: 100%;
            // min-width: 200px;
            max-width: 240px;
            box-sizing: border-box;
        }
        width: 90%;
        // min-width: 195px;
        max-width: 300px;
        height: 100%;
     
        .sideMenu-group{
            
            &:last-child{
                padding-bottom:50px ;
            }
            .sideMenu-group-title{
                h3{
                    font-size: 20px;
                    font-weight: 700;
                    color: $title_color;
                    line-height: 40px;
                    margin:0px 15px;
                    margin-top:20px ;
                }
                border-bottom: 1.5px solid $title_color;
                margin-bottom: 10px;
            }
            .sideMenu-group-type{
                
                .group-type{
                    p{
                        margin:0px 15px;
                        font-size: 14px;
                        font-weight: 400;
                        color: $text_color;
                        line-height: 28px;
                    }
                    input{
                        display:none;
                        &:checked+p{
                            color: $main_color;
                            font-weight: 700;

                        }
                    }
                }
                
            }
            
        }
        .sideMenu-group:first-child{
            .sideMenu-group-type{
                display: flex;
                flex-wrap: wrap;
            }
        }

    }






</style>