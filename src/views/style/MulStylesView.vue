<template>

	<div class="mulstyles">
		<div class="mulstyle_cover">
			<div :class="['cover_pic', { main:currentPic === coverPic}]" v-for="(coverPic,index) of coverPics" :key="index" @click="currentPic = coverPic">
				<img :src="coverPic.src">
			</div>
		</div>
	
		<div class="textLoop_animate">
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
				
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
		</div>
		<div class="mulstyle_list">
			<div class="style_pic" v-for="stylePic of stylePics" :key="stylePic">
				<img :src="stylePic.src">
			</div>
		</div>
			
		<ul class="outfit_title">
			<h2>穿搭情境</h2>
			<li :class="['outfit_item', { active: currentTag === tag }]" v-for="(tag,index) of tags" :key="index" @click="currentTag = tag">
				{{tag}}
			</li>
		</ul>
		<div class="container" >
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				<div class="col" v-for="(img,index) of showimgs" :key="index">
					<img :src="img.src">
				</div>
			</div>
		</div>
		
		 

	
	</div>

</template>

<script>

export default {
	name: "MulStyle",

	components: {

	},
	
  	data() {
    	return {
			logoText:'RE:Outfit  ',
			intervalId: null,
			coverPics:[
				{src:'./cover_img2.JPG'},
				{src:'./cover_img1.JPG'},
				{src:'./cover_img3.JPG'},
				{src:'./cover_img5.JPG'},
				{src:'./cover_img7.JPG'},
				{src:'./cover_img9.JPG'},
			],
			stylePics:[
				{src:'/mulstyle-1.jpg'},
				{src:'/mulstyle-2.jpg'},
				{src:'/mulstyle-3.jpg'},
				{src:'/mulstyle-4.jpg'},
				{src:'/mulstyle-9.jpg'},
				{src:'/mulstyle-7.jpg'},
			],

			imgs:[
				[{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'},
				{src:'/look-1.jpg'}],

				[{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'},
				{src:'/look-2.jpg'}],

				[{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'},
				{src:'/look-3.jpg'}],

				[{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'},
				{src:'/look-4.jpg'}],

				[{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'},
				{src:'/look-5.jpg'}],

				[{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'},
				{src:'/look-6.jpg'}],

				[{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'},
				{src:'/look-7.jpg'}],

				[{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'},
				{src:'/look-8.jpg'}],

				[{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'},
				{src:'/look-9.jpg'}],
			],
			// showimgs:[{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},
			// 	{src:'/look-1.jpg'},]
			// ,
			tags:[
				'#上班穿搭',
				'#開會穿搭',
				'#海邊穿搭',
				'#約會穿搭',
				'#旅行穿搭',
				'#面試穿搭',
				'#上課穿搭',
				'#趴踢穿搭',
				'#宴會穿搭',
			],
			currentTag:'#上班穿搭',
			currentPic: [{src:'./cover_img2.JPG'}],

    	} 
  	},
	computed: {
		showimgs() {
			const index = this.tags.indexOf(this.currentTag);
			if (index > -1) {
				return this.imgs[index];
			}
			return this.imgs[0];
			// return this.imgs.filter(item => item.cat === this.currentTag)
		},
		
	},
	methods:{
		tagtest(index){
			this.showimgs=this.imgs[index];
		},
		
	}


};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/main";
	@import "@/assets/sass/grid";



	
	.mulstyle_cover{
		display: flex;
		width: 80%;
		max-width: 312px;
		margin:20px auto;
		height: 500px;
	
		
		@include m{
			max-width: 768px;
		}
		@include xl{
			max-width: 960px;
		}
		
		.cover_pic{
			overflow: hidden;
			width: 0;
			flex-grow: 1;
			img{
				// width: 80%;
				// @include m{
				// 	width: 100%;
				// }
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center;
			}
			
		}
		// .cover_pic:first-child{
		// 	flex-grow: 6;	
		// }
	
		.main{
			flex-grow: 6;
		}

	}
	.textLoop_animate {
		display: flex;
		flex-wrap: nowrap;
  		overflow: hidden;
	
	}
	.logo_texts{
		animation: textLoop 10s linear infinite;
		font-size: 48px;
		color: $second_color;
		font-weight: 900;
		font-style: italic;
		white-space: nowrap;  


	}
	@keyframes textLoop {
		0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0)
		}
		100% {
			-webkit-transform: translate3d(-100%, 0, 0);
			transform: translate3d(-100%, 0, 0)
		}
	}
	.mulstyle_list{
		display: flex;
		width: 80%;
		max-width: 312px;
		margin:30px auto;
		height: 250px;
		margin-bottom:50px ;
		@include m{
			max-width: 768px;
			height: 350px;
		}
		@include xl{
			max-width: 960px;
			height: 400px;
		}
		.style_pic{
			overflow: hidden;
			img{
				width: 80%;
				@include m{
					width: 100%;
				}
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center;
			}
			

		}
	}
	.col{
		margin: 10px 0px;
		img{
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	}
	.container{
		width: 80%;
		max-width: 312px;
		@include m{
			max-width: 768px;
		}
		@include xl{
			max-width: 960px;
		}
		.row{
			margin: 10px;
		}
	}





	a{
		text-decoration: none;
	}
	.outfit_title{
		color: #000;
		h2{
			margin-bottom: 10px;
		}
		padding: 15px 0px;
		border: 1px solid #000;
		width: 80%;
		max-width:312px;
		@include m{
			max-width: 768px;
		}
		@include xl{
			max-width: 960px;
		}
		margin: auto;
		text-align: center;
		font-size: 20px;
		font-weight: 600;
		.outfit_item{
			position: relative;
			display: inline-block;
			font-size: 14px;
			font-weight: 400;
			padding: 5px 20px;
			cursor: pointer;
			a{
				color: #000;
			}
	}
	.outfit_item::after {
		content: '';
		position: absolute;
		width: 70px;
		transform: scaleX(0);
		height: 5px;
		bottom: 0;
		left: 17.5px;
		background-color: $main_color;
		transform-origin: bottom right;
		transition: transform 0.2s ease-out;
		
	  }
// 	  .active{
// 		position: absolute;
// 		width: 70px;
// 
// 		height: 5px;
// 
// 
// 		background-color: $main_color;
// 	  }
	  
	  .outfit_item.active::after {
		transform: scaleX(1);
		transform-origin: bottom left;
	  }
}

</style>
