<template>
	<div class="">
		<h1>This is測試 page</h1>
		<button @click="action" class="btn btn-info">bootstrap測試</button>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";

export default {
	name: "Test",
	components: {
		Footer,
	},
	methods: {
		action() {
			console.log("測試按鈕");
		},
	},
};
</script>
