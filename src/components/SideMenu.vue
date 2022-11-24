<template>
	<aside class="member_side_menu">
        <div class="member">
            <div class="mug_shot">
                <img src="https://fakeimg.pl/100x100/200" />
            </div>
            <div class="word">
                <p class="name">Customer</p>
                <p class="level">Premium Account</p>
            </div>
        </div>
        <nav>
            <a href=""><span class="side_menu_tag show">#</span>帳號資料</a>
            <a href=""><span class="side_menu_tag">#</span>我的身型</a>
            <a href=""><span class="side_menu_tag">#</span>我的風格</a>
            <a href=""><span class="side_menu_tag">#</span>風格諮詢</a>
            <a href=""><span class="side_menu_tag">#</span>訂閱服務</a>
            <a href=""><span class="side_menu_tag">#</span>訂單紀錄</a>
        </nav>
    </aside>

</template>
<script>
export default {
	name: "Footer",
	props: {
		// msg: String
	},
};
</script>

<style lang="scss">
@import "@/assets/sass/main";
@import "@/assets/sass/member_side_menu";
</style>
