<template>
	<aside class="member_side_menu">
        <div class="member">
            <router-link to="/MyPage" class="mug_shot">
                <img src="https://fakeimg.pl/100x100/200">
            </router-link>
            <div class="name_level">
                <p class="name">Customer</p>
                <p class="level">Premium Account</p>
                <router-link to="/memSubscription" class="level_up">立即升級</router-link>
            </div>
        </div>
        <div class="side_menu">
            <span class="side_menu_title">我的資料</span>
            <nav>
                <router-link to="/BodyType"><span class="side_menu_tag">#</span>我的身型</router-link>
                <router-link to="/memQuiz"><span class="side_menu_tag">#</span>我的風格</router-link>
                <router-link to="/MemMaintain"><span class="side_menu_tag">#</span>帳號資訊</router-link>
                <router-link to="/Consultation"><span class="side_menu_tag">#</span>風格諮詢</router-link>
                <router-link to="/memSubscription"><span class="side_menu_tag">#</span>訂閱服務</router-link>
                <router-link to="/OrderHistory"><span class="side_menu_tag">#</span>訂單紀錄</router-link>
                <router-link to="/Favorites"><span class="side_menu_tag">#</span>我的收藏</router-link>
                <router-link to="/">登出</router-link>
            </nav>
        </div>
    </aside>
</template>

<script>
export default {
	name: "MemberSideMenu",
	props: {
		// msg: String
	},
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
</style>
