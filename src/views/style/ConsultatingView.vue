<template>
	<div class="step">
		<p v-for="step of steps" :key="step">
			{{step}}
		</p>
	</div>



</template>
<script>


export default {
	name: "Consultating",
	components: {

	},
	data(){
		return{
			steps:['STEP1','STEP2','STEP3']
		}
	}
};
</script>
<style lang="scss" scoped>
	.step{
		display: flex;
		p{
			padding: 20px;
			border-radius: 50%;
			background-color:$main_color;
			color: $second_color;
		}
	}
</style>
