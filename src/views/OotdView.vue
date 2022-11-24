<template>
	<div>OOTD</div>
	<h1 class="test">測試</h1>
	<Footer></Footer>
</template>
<script>
import Footer from "@/components/Footer.vue";

export default {
	name: "About",
	components: {
		Footer,
	},
};
</script>
<style lang="scss">
.test {
	color: $main_color;
}
</style>
