<template>
    <!-- 會員 container -->
    <div class="mem_container">
        <!-- 側邊欄組件 -->
        <MemberSideMenu></MemberSideMenu>
        <!-- 右側會員資料-->
        <div class="mem_data">
            <p class="title">我的風格</p>
            <div class="data">
                <!-- 這裡開始寫 -->
                <div class="wrap">
                    <section class="style">
                        <div class="item">
                            <p>屬於:</p>
                            <h2>#文青風</h2>
                        </div>
                        <div class="item">
                            <img src="hipster2.png" alt="文青">
                        </div>
                        <div class="item"><p>文青風在穿搭時，也可以嘗試看看多層次的穿搭法。選擇色系相近、長短不同的衣服，穿搭時可以營造出層次感，讓衣著看上去不會過度呆版。例如選擇長版的素色薄外套搭配條紋的T恤，或是利用襯衫當作外套，內襯一件素色T恤也是相當好的搭配。這樣的穿搭法除了可以增加視覺的豐富度，面對季節交替又或是夏天冷氣房與室外的溫差變化，都能靈活的穿脫，可說是兼具實用性與時尚性的文青風格。</p></div>
                        <div class="item">
                            <router-link :to="{ name:'Quiz'}"><button class="btn_s">重新測驗</button></router-link>
                        </div>
                    </section>
                    <section class="recommend">
                        <h2>推薦穿搭</h2>
                        <div class="item">
                            <StylistLook scardP="./stylist-1.jpg" stylistName="Kevin" stylistInfo="擅長時尚風格,用前衛的單品,搭配出衝突的美感"></StylistLook>
                        </div>
                    </section>
                    <section class="recommend">
                        <h2>推薦單品</h2>
                        <div class="item">
                            <StylistLook scardP="./stylist-1.jpg" stylistName="Kevin" stylistInfo="擅長時尚風格,用前衛的單品,搭配出衝突的美感"></StylistLook>
                        </div>
                    </section>
                    <section class="deco">
                        <div class="decoration">
					        #CASUAL
				        </div>
                        <div class="btn_box">
                            <router-link :to="{ name:'MyPage'}"><button class="btn_l">返回</button></router-link>
                            <router-link :to="{ name:'Quiz'}"><button class="btn_s">重新測驗</button></router-link>
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MemberSideMenu from "@/components/MemberSideMenu.vue";
import StylistLook from "@/components/StylistLook.vue"; 
export default {
    name: "MemQuiz",
    components: {
        MemberSideMenu,
        StylistLook
    },
    data() {
        return {
        }
    },
    created() {

    },
    computed: {

    },
    methods: {
    }
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
.wrap{
    .style{
        .item:nth-child(1){ //title
            padding: 20px 0;
            h2{
                font-size: 32px;
                font-weight: 600;
                text-align: center;
            }
            p{
                display: none;
            }
        }
        .item:nth-child(2){ //image
            position: relative;
            img{
                width: 100%;
                vertical-align: top;
            }
        }
        .item:nth-child(3){
            padding: 20px 0;
            p{
                color: $text_color;
                line-height: 27px;
                font-size: 16px;
            }
        }
        .item:nth-child(4){
            button{
                display: block;
                margin: 0 auto;
            }
        }
    }
    .recommend{
            margin: 50px 0;
            h2{
                font-size: 20px;
                color: $title_color;
                margin: 10px 0;
            }
            .item{
                border: 1px solid $title_color;
            }
        }
    .deco{
        .decoration{
            display: none;
        }
        .btn_box{
            .btn_s{
                display: none;
            }
            .btn_l{
                margin-left: auto;
                display: block;
            }
        }
    }
}
@media screen and (min-width:1024px) {
    .wrap{
        background-color: #fff;
        padding: 20px;
        border: 1px solid $title_color;
        .style{
            display: grid;
            grid-template-columns: 60% 40%;
            grid-template-rows: auto auto;
            align-items: center;
            .item:nth-child(1){ //title
                padding: 20px 0;
                grid-area: 1/1/2/2;
                h2{
                    font-size: 66px;
                    text-align: left;
                    width: 90%;
                    margin-left: auto;
                }
                p{
                    display: block;
                    color: $title_color;
                    font-size: 32px;
                }
            }
            .item:nth-child(2){ //image
                grid-area: 1/2/3/3;
                position: relative;
                img{
                    width: 80%;
                    margin: auto;
                    display: block;
                }
            }
            .item:nth-child(3){
                grid-area: 2/1/3/2;
                padding: 20px 0;
                p{
                    color: $text_color;
                    line-height: 27px;
                    font-size: 16px;
                    width: 80%;
                }
            }
            .item:nth-child(4){
                display: none;
            }
        }
        // === recommend ===
        .deco{
            position: relative;
        .decoration{
            display: inline-block;
            font-size: 72px;
            font-weight: bolder;
            font-style: italic;
            color: $secondary;
        }
        .btn_box{
            display: inline-block;
            position:absolute;
            right: 0;
            .btn_l{// 返回
                margin-left: 0;
                // display: block;
                display: inline-block;
                margin-right: 10px;
            }
            .btn_s{ //重新測驗
                display: inline-block;
            }
        }
    }
    }

}


</style>
