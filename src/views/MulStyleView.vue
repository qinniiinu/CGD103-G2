<template>

	<div class="mulstyle">
		<img alt="Vue logo" src="../assets/logo.png" />
	
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
		<carousel :items-to-show="1" :wrap-around="true" ref="myCarousel">
			<slide v-for="slide in 3" :key="slide">
				<div class="carousel__item">
					<div class="container">
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
		  			</div>
				</div>
			</slide>
			<!-- <slide v-for="slide in 3" :key="slide">
				<div class="carousel__item">
					<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
							<div class="col">
								<img src="../assets/look-9.jpg" alt="">
							</div>
						</div>
		  			</div>
				</div>
			</slide> -->

			<template #addons>
			<navigation />
			<pagination />
			</template>
		</carousel>



		  <!-- <div class="container">
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
		  </div>
		 -->
		<img alt="Vue logo" src="../assets/logo.png" />
	

	</div>
	<Footer></Footer>
</template>

<script>
// @ is an alias to /src
import Footer from "@/components/Footer.vue";
import Header from "@/components/Header.vue";
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';


export default {
	name: "MulStyle",

	components: {
		Footer,
		Header, 
		Carousel,
		Slide,
    	Pagination,
    	Navigation,
	},
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
		max-width: 390px;
		@include m{
			max-width: 960px;
		}
		.row{
			margin: 10px;
		}
	}
</style>
