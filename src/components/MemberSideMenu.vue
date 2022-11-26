<template>
	<aside class="member_side_menu">
        <div class="member">
            <div class="mug_shot">
                <img src="https://fakeimg.pl/100x100/200">
            </div>
            <div class="name_level">
                <p class="name">Customer</p>
                <p class="level">Premium Account</p>
                <a href="#" class="level_up">立即升級</a>
            </div>
        </div>
        <div class="side_menu">
            <span class="side_menu_title">我的資料</span>
            <nav>
                <a href="#"><span class="side_menu_tag">#</span>我的身型</a>
                <a href="#"><span class="side_menu_tag">#</span>我的風格</a>
                <a href="#"><span class="side_menu_tag">#</span>帳號資訊</a>
                <a href="#"><span class="side_menu_tag">#</span>風格諮詢</a>
                <a href="#"><span class="side_menu_tag">#</span>訂閱服務</a>
                <a href="#"><span class="side_menu_tag">#</span>訂單紀錄</a>
                <a href="#"><span class="side_menu_tag">#</span>我的收藏</a>
                <a href="#">登出</a>
            </nav>
        </div>
    </aside>
</template>

<script>
export default {
	name: "SideMenu",
	props: {
		// msg: String
	},
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
</style>
