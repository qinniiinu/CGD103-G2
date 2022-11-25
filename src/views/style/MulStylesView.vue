<template>

	<div class="mulstyle">
		<img alt="Vue logo" src="../../assets/logo.png" />
	
		<ul class="outfit-title">
			<h2>穿搭情境</h2>
			<li class="outfit-item">
				<a href="">#上班穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#開會穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#海邊穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#約會穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#旅行穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#面試穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#上課穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#趴踢穿搭</a>
			</li>
			<li class="outfit-item">
				<a href="">#宴會穿搭</a>
			</li>
		</ul>
		<img src="../../../public/look-1.jpg" alt="">
		<div class="page" v-for="i of imgs" :key="i">
			<img :src="i" alt="">
		</div>


		  <!-- <div class="container" >
				<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
					<div class="col">
						<img src="../assets/look-1.jpg" alt="">
					</div>
					<div class="col">
						<img src="../assets/look-2.jpg" alt="">
					</div>
					<div class="col">
						<img src="../assets/look-3.jpg" alt="">
					</div>
					<div class="col">
						<img src="../assets/look-4.jpg" alt="">
					</div>
					<div class="col">
						<img src="../assets/look-5.jpg" alt="">
					</div>
					<div class="col">
						<img src="../assets/look-6.jpg" alt="">
					</div>
					<div class="col">
						<img src="../assets/look-7.jpg" alt="">
					</div>
					<div class="col">
						<img src="../assets/look-8.jpg" alt="">
					</div>
				</div>
		  </div> -->

		  <!-- <div class="Pagination" v-for="item in page.length">
			{{}}
		  </div>
		 
		<img alt="Vue logo" src="../assets/logo.png" />  -->
	
	</div>
	<Footer></Footer>
</template>

<script>
// @ is an alias to /src
import Footer from "@/components/Footer.vue";
import Header from "@/components/Header.vue";
import img1 from '../../../public/look-1.jpg';
import img2 from '../../../public/look-2.jpg';
import img3 from '../../../public/look-3.jpg';
import img4 from '../../../public/look-4.jpg';



export default {
	name: "MulStyle",

	components: {
		Footer,
		Header, 
	},
	
  	data() {
    	return {
			imgs:[
				img1,
				img2,
				img3,
				img4,
			]
    	} 
  	}


};
</script>
<style lang="scss">
	@import "@/assets/sass/mulstyle";
	@import "@/assets/sass/grid";

	.col{
		margin: 10px 0px;
		img{
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	}
	.container{
		width: 100%;
		max-width: 312px;
		@include m{
			width: 80%;
			max-width: 819px;
		}
		@include xl{

			max-width: 960px;
		}
		.row{
			margin: 10px;
		}
	}
	.slide{

		margin-bottom: 20px;
	}
	.swiper-button-prev {
		left: 1rem;
		@include m{
			left: 3rem
		}
		@include l(){
			left: 4rem
		}
		@include xl(){
			left: 5rem
		}
		right: auto;
	}
	.swiper-button-next {
		right: 1rem;
		@include m{

			right:3rem;
		}
		@include l(){
			right: 4rem;
		}
		@include xl(){
			right: 5rem;
		}

    	left: auto;
	}
</style>
