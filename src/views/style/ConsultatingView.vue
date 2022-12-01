<template>
	<div class="step">
		<p v-for="step of steps" :key="step">
			{{step}}
		</p>
	</div>
	<div class="consultqa">
		<div class="consultqa-title">
			<h2></h2>
			<p></p>
		</div>
		<div class="consultqa-btn">
			<div class="consultqa-btn-item">

			</div>
		</div>
		<div class="consultqa-input">
			<div class="consultqa-input-title">
				<h3>

				</h3>
			</div>
			<textarea class="consultqa-textarea">

			</textarea>
			<Button></Button>
		</div>
	</div>



</template>
<script>
import Button from "@/components/Button.vue"

export default {
	name: "Consultating",
	components: {
		Button,
	},
	data(){
		return{
			steps:['STEP1','→','STEP2','→','STEP3']
		}
	}
};
</script>
<style lang="scss" scoped>
	.step{

		display: flex;
		justify-content: center;
		p{

			padding: 20px;
			border-radius: 50%;
			background-color:$main_color;
			color: $second_color;
			font-weight: 700;
			font-size: 24px;
		}
		p:nth-child(2n){
			border-radius: 0%;
			background-color:transparent;
			color: $main_color;
			font-size: 20px;
			font-weight: 400;
		}
	}
</style>
