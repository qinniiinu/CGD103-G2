<template> 
    <button>
        {{content}}
    </button>
</template> 


<script>
export default {
    props:{
        content:String
    }
}
</script>


<style lang="scss" scoped>
    button{
        width:150px ;
        line-height:60px ; 
        font-size: 18px;
        border: 1px solid $main_color;
        color: white ;
        background-color:$main_color ;
        cursor: pointer;
        &:hover{
            background-color: #ECEEFF;
            color: $main_color ;
            border: 1px solid $main_color;
            cursor: pointer;
        }
    }

</style>