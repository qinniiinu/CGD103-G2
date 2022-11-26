<template>
	<div class="producut">
		<h1>This is a商品 page</h1>
		<ul class="menOrWomen">
			<li>全部</li>
			<li>
				女裝
				<ul class="clothingList">
					上身
					<li class="clothingList_item">短袖</li>
					<li class="clothingList_item">長袖</li>
					<li class="clothingList_item">外套</li>
					<li class="clothingList_item">背心</li>
				</ul>
				<ul class="clothingList">
					下身
					<li class="clothingList_item">長褲</li>
					<li class="clothingList_item">短褲</li>
					<li class="clothingList_item">裙子</li>
				</ul>
				<ul class="clothingList">
					套裝
					<li class="clothingList_item">洋裝</li>
					<li class="clothingList_item">連身褲裝</li>
					<li class="clothingList_item">兩件式</li>
				</ul>
				<ul class="clothingList">
					鞋款
					<li class="clothingList_item">休閒鞋</li>
					<li class="clothingList_item">跟鞋</li>
					<li class="clothingList_item">運動鞋</li>
				</ul>
				<ul class="clothingList">
					配件
					<li class="clothingList_item">包款</li>
					<li class="clothingList_item">圍巾手套</li>
					<li class="clothingList_item">帽子</li>
					<li class="clothingList_item">皮帶</li>
					<li class="clothingList_item">配件</li>
					<li class="clothingList_item">襪子</li>
				</ul>
			</li>
			<li>男裝</li>
		</ul>
	</div>
	<Footer></Footer>
</template>

<script>
import Footer from "@/components/Footer.vue";

export default {
	name: "Product",
	components: {
		Footer,
	},
};
</script>
<style lang="sass" scoped></style>
