<template>
	<div class="home">
		<img alt="Vue logo" src="../assets/logo.png" />
		<!-- <HelloWorld msg="Welcome to Your Vue.js App" /> -->
	</div>
	<Footer></Footer>
</template>

<script>
// @ is an alias to /src
import Footer from "@/components/Footer.vue";

export default {
	name: "HomeView",
	components: {
		Footer,
	},
};
</script>
