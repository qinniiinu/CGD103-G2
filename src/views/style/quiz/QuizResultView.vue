<template>
	<section class="quiz_idx">
		<!-- <router-link :to="{ name:'QuizResult1' }">QuizResult1</router-link>
		<router-link :to="{ name:'QuizResult2' }">QuizResult2</router-link> -->
	<router-view/>
	</section>
	<Footer></Footer>
</template>
<script>
import Footer from "@/components/Footer.vue";
import StyleCard1 from "@/components/StyleCard1.vue";
import Button from "@/components/Button.vue";

export default {
	name: "Quiz",
	components: {
		Footer,
		StyleCard1,
		Button,
	},
};
</script>
<style lang="scss" scoped>


</style>
