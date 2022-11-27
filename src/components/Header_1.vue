<template>
    <nav class="main-nav">
        <ul>
            <h1></h1>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
        </ul>
    </nav>
</template>

<script>
export default {
	name: "Header",

	components: {

	},
	
  	data() {
    	return {
			links:[
				{herf:'/MulStyles'},
				{herf:'/Product'},
				{herf:'/Ootd'},
				{herf:'/Subscription'},
				{herf:'/About'},
			],
			pages:[
				'找風格',
				'逛商品',
				'風特動態牆',
				'訂閱服務',
				'關於我們',
			],
			currentTag:'#上班穿搭',

    	} 
  	},
	computed:{
		tagComponent(){
			return `tag-${this.currentTag.toLowerCase()}`;
		},
	},


};
</script>

<style lang="scss" scoped>
</style>
