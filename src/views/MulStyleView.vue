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

		<img alt="Vue logo" src="../assets/logo.png" />
	


	</div>
	<Footer></Footer>
</template>

<script>
// @ is an alias to /src
import Footer from "@/components/Footer.vue";
import Header from "@/components/Header.vue";

export default {
	name: "MulStyle",
	components: {
		Footer,Header, 
	},
};
</script>
<style lang="scss">
	@import "@/assets/sass/mulstyle";
</style>
