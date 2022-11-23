<template>
	<Header></Header>
	<div class="about">
		<h1>This is an about page</h1>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";
import Header from "@/components/Header.vue";

export default {
	name: "About",
	components: {
		Footer,
		Header,
	},
};
</script>
