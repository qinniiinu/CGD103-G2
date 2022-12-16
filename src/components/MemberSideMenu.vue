<template>
    <div class="mem_container">
        <aside class="member_side_container">
            <div class="member_side_menu">
                <div class="member">
                    <router-link to="/MyPage/MemMaintain" class="mug_shot">
                        <img :src="member.mem_pic" :alt="member.mem_name">
                    </router-link>
                    <div class="name_level">
                        <span class="name">{{ member.mem_name }}</span>
                        <span class="level">{{ member.level_id }} Account</span>
                        <router-link to="/MyPage/memSubscription" class="level_up">立即升級</router-link>
                    </div>
                </div>
                <nav class="side_menu">
                    <ul>
                        <li v-for="option in options" :key="option.name">
                            <router-link :to="option.url" exact-active-class="active">
                                <span :class="{ active: option.active }" class="side_menu_tag">#</span>
                                {{ option.name }}
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/">登出</router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="mem_data_container">
            <div class="mem_data">
                <slot></slot>
            </div>
        </main>
    </div>
</template>

<script>
export default {
	name: "MemberSideMenu",
	props: {
		// msg: String
	},
    data() {
        return {
            // 選單項目
            options: [
                { name: '我的資料', url:'/MyPage'},
                { name: '我的身型', url:'/MyPage/BodyType'},
                { name: '我的風格', url:'/MyPage/memQuiz'},
                { name: '個人資訊', url:'/MyPage/MemMaintain'},
                { name: '風格諮詢', url:'/MyPage/Consultation'},
                { name: '訂閱服務', url:'/MyPage/memSubscription'},
                { name: '訂單紀錄', url:'/OrderHistory'},
                { name: '我的收藏', url:'/Favorites'},
            ],
            // 會員資料
            member:{  
                mem_pic:"/fashion2.png",
                mem_name:"王曉明",
                level_id: "STANDARD",
            },
        }
    },
    methods:{
    },
}
</script>

<style lang="scss" scoped>

// MemberSideMenu.Vue
.mem_container {
    width: 100%;
    @include m() {
		display: flex;
	}
    
    // 左邊側邊欄容器
    .member_side_container{
        display: none;
        @include m() {
            display: block;
            min-width: 190px;
            padding-bottom: $padding;
            height: auto;
            background-color: $main_color;

	    }
        @include xl() {
            min-width: 250px;
	    }
        // 側邊欄內容
        .member_side_menu{	        
            width: 100%;
            position: sticky;
            top: 60px;
            // 會員頭貼 + 姓名 + 等級
            .member{
                width: 100%;
                padding: 25px;
                display: flex;
                flex-direction: column;
                align-items: center;
                box-sizing: border-box;
                gap: 20px;
                @include xl() {
                    flex-direction: row;
                    justify-content: space-between;
                    gap: 5px;
                }
                // 頭貼
                .mug_shot{
                    width: 80px;
                    aspect-ratio: 1 /1;
                    border-radius: 50%;
                    overflow: hidden;
                    img{
                        width: 100%;
                        height: 100%;
                        vertical-align: middle;
                        object-position: center;
                    }
                }
                // 姓名 + 等級
                .name_level{
                    font-family: $second_font,$main_font;
                    color: white;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: space-evenly;
                    gap: 6px;
                    @include xl() {
                        text-align: end;
                        align-items: flex-end;
                    }
                    .name{
                        font-weight: 700;
				        font-size: 20px;
                    }
                    .level{
                        font-weight: 300;
				        font-size: 14px;
                    }
                    .level_up{
                        font-family: $main_font;
                        font-weight: 300;
                        font-size: 14px;
                        color: white;
                    }
                }
            }
            // 選單
            .side_menu{
                width: 100%;
                color: white;
                ul {
                    padding-right: 15%;
                    li {
                        display: block;
                        text-align: end;
                        font-size: 16px;
                        font-weight: 300;

                        line-height: 45px;
                        a{
                            color: white;
                            // 當前頁面 # 標籤
                            .side_menu_tag {
                                font-family: $second_font;
                                font-size: 20px;
                                font-size: 18px;
                                font-weight: 700;
                                margin-right: 20px;
                                vertical-align: middle;
                                opacity: 0;
                            }
                            &:hover {
                                .side_menu_tag {
                                    opacity: 1;
                                }
                            }

                        }
                        // 當前選單位置 # 標籤
                        .active .side_menu_tag{
                                opacity: 1;
                        }
                    }
                }
            }
        }


	}
    // 右邊內容容器
    .mem_data_container{
        margin: auto;
        width: 100%;
        @include m() {
            width: calc(100% - 190px);
        }
        @include xl() {
            width: calc(100% - 250px);
        }
        .mem_data {
            background-color: white;
            box-sizing: border-box;
            padding: 25px 25px 100px 25px;
            width: 100%;
		    @include m() {
                background-color: $bg_gray;
                box-sizing: border-box;
                padding: 50px 50px 150px 50px;
            }
	    }
    }
}
</style>
