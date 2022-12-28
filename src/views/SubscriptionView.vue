<template>
    <div class="subscription">
        <div class="wrap">
            <div class="left"></div>
            <div class="right">
                <h2>打造屬於你的穿搭風格</h2>
                <p>
                    依據您喜愛的風格、不同的穿搭情境，為您選擇適合穿搭組合，與在地設計師及多間服飾品牌合作，滿足您對各類穿搭的慾望。
                </p>
            </div>
        </div>
    </div>
    <div class="sub-plan">
        <div class="subcard" v-for="sub in vip_level" :key="sub.level">
            <div class="card-wrap">
                <div class="card-content">
                    <div class="level">#{{sub.level_name}}</div>
                    <h2>NT$<span>{{sub.price}}</span>/月</h2>
                    <p>
                        <font-awesome-icon icon="fa-solid fa-check" />
                        每月專屬搭配<span>1</span>套
                    </p>
                    <span>{{sub.set_info}}</span>
                    <p>
                        <font-awesome-icon icon="fa-solid fa-check" />
                        每月諮詢造型師<span>{{sub.monthConsult}}</span>次
                    </p>
                    <p>
                        <font-awesome-icon icon="fa-solid fa-check" />
                        每月免運費<span>{{sub.freeShipping}}</span>次
                    </p>
                    <p>
                        <font-awesome-icon icon="fa-solid fa-check" />
                        商品<span>{{sub.specialOffer}}</span>折優惠
                    </p>
                    <!-- <router-link to="/SubCheckout"><button @click="setStorage(index,sub)">訂閱</button></router-link> -->
                    <button @click="setStorage(index,sub),isSub()">訂閱</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";

export default {
    name: "Subscription",
    components: {

    },
    data(){
		return{
			vip_level:[],
            subscribe:[],
            submemInfo:[],
            subOrder:[],
            sub:[]
		}
	},
	created(){
		this.getResource();
        // this.subscribe=this.$store.state.sub
	},
	computed:{
		
	},
	methods:{
        // 訂閱訂單
        setStorage(index,sub){
            // console.log(sub);
            // this.$store.dispatch("setCart",{
            //     level:sub.level_name,
            //     price:sub.price,
            //     monthSet:sub.monthSet,
            //     set_info:sub.set_info,
            //     monthConsult:sub.monthConsult,
            //     freeShipping:sub.freeShipping,
            //     specialOffer:sub.specialOffer
            // })
            this.subOrder.push({
                id:sub.level_id,
                level:sub.level_name,
                price:sub.price,
                monthSet:sub.monthSet,
                set_info:sub.set_info,
                monthConsult:sub.monthConsult,
                freeShipping:sub.freeShipping,
                specialOffer:sub.specialOffer
            })
            const data=JSON.stringify(this.subOrder);
            // console.log(data);
            localStorage.setItem('subOrder',data);
        },
        getResource() {
            // 訂閱等級卡片
            this.axios.get(`${BASE_URL}/vip_level.php`).then((response) => {
                this.vip_level= response.data;
				// console.log(this.vip_level);
            });
            this.axios.get(`${BASE_URL}subMemInfo.php`).then((response) => { //會員的資料
				console.log(response.data);
				this.submemInfo= response.data;
				// console.log(this.submemInfo);
				if(this.submemInfo!==false && this.submemInfo.msg!=='請先登入'){ //確定有登入
					this.axios.get(`${BASE_URL}/subscription.php`).then((response) => { //確認訂閱等級
						this.subscribe= response.data;
						// console.log(this.subscribe);
					});
				}
            });
        },
        isSub(){
            if(this.submemInfo!==false && this.submemInfo.msg!=='請先登入'){ //有登入
                if(this.subscribe!=''){
                    alert('您已訂閱，如需更改訂閱方案請先至會員專區取消訂閱')
                    this.$router.push({ path: "/MyPage/memSubscription"});
                }else{
                    this.$router.push({ path: "/SubCheckout"});
                }
            }else{ //沒登入
                alert('請先登入')
                this.$router.push({ path: "/login" });
            }
            
        }
	}
};
</script>
<style lang="scss" scoped>
.subscription {
    width: 100%;
    .wrap {
        background-color: $bg_violet;
        @include l{
            height: 600px;
            background: linear-gradient(
                    350deg,
                    rgb(255, 255, 255) 40%,
                    transparent 40%
                )
                left bottom,
            url(/public/pic/subpageimg.png) no-repeat fixed left top;
            background-color: RGB(245, 245, 245);
        }
        height:352px;
        display: flex;
        justify-content: center;
        .left {
            width: 300px;
            height: auto;
            @include s{
                display: none;
            }
        }
        .right {
            width: 550px;
            margin: 10vh;
            font-size: 32px;
            color: $title_color;
            font-weight: bold;
            p {
                font-size: 18px;
                font-weight: normal;
                margin-top: 20px;
                line-height: 25px;
            }
            @include s{
                width: 550px;
                margin: 5vh;
            }
        }
    }
}
.sub-plan {
    height: 950px;
    width: 250px;
    margin: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    gap: 30px;
    margin-bottom: 100px;
    @include l{
        width: 100%;
        height: 200px;
        flex-direction: row;
        margin-bottom: 0px;
    }
        .subcard {
            position: absolute;
            -webkit-transform: skew(-5deg);
            position: absolute;
            border: 1px solid black;
            @include l{
                margin: auto;
                // width: 100%;
                // -webkit-transform: skew(-5deg);
                &:nth-child(1) {
                    top: -200px;
                    left: 12vw;
                }
                &:nth-child(2) {
                    top: -250px;
                    left: 40vw;
                }
                &:nth-child(3) {
                    top: -300px;
                    left: 68vw;
                }
            }
            @include s{
                &:nth-child(1) {
                    top: -80px;
                    width: 230px;
                }
                &:nth-child(2) {
                    top: 270px;
                    width: 230px;
                }
                &:nth-child(3) {
                    bottom: 30px;
                    width: 230px;
                }
            }
            
            .card-wrap {
                @include l{
                    width: 225px;
                }
                // width: 225px;
                background: white;
                padding: 30px 15px;
                color: $main_color;
                .card-content {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                    text-align: left;
                    position: relative;
                    z-index: 1;
                    transition: all 0.3s ease-in;
                    h2 {
                        color: $title_color;
                        font-size: 20px;
                        font-weight: bold;
                        margin: auto;
                        margin-bottom: 10px;
                    }
                    p {
                        color: $text_color;
                        font-size: 14px;
                    }
                    span {
                        font-size: 32px;
                    }
                    :first-child ~ span {
                        font-size: 14px;
                        font-weight: bold;
                    }
                    .level {
                        padding: 10px 30px;
                        background-color: $main_color;
                        color: white;
                        font-weight: bold;
                        font-size: 20px;
                        position: absolute;
                        right: -40px;
                        top: -70px;
                    }
                    // a{
                        margin: auto;
                        margin-top: 20px;
                        button {

                            cursor: pointer;
                            background-color: $main_color;
                            color: white;
                            border: 1px solid $main_color;
                            padding: 5px 20px;
                            &:hover {
                                background-color: $bg_blue;
                                color: $main_color;
                                border: 1px solid $main_color;
                            }
                        }
                    // }
                    
                }
                &:after {
                    content: "";
                    background: $main_color;
                    height: 100%;
                    width: 100%;
                    position: absolute;
                    left: 0;
                    top: 0;
                    z-index: 0;
                    clip-path: circle(0% at 0% 0%);
                    transition: all 0.4s ease-in;
                }
                &:hover {
                    &:after {
                        clip-path: circle(100%);
                        opacity: 0.05;
                    }
                    .card-content {
                        h2,
                        p {
                            color: $main_color;
                        }
                    }
                }
            
            }
        }
}
    // }
        // .subcard {
            
        //     // -webkit-transform: skew(-5deg);
        //     // -moz-transform: skew(-5deg);
        //     // -o-transform: skew(-5deg);
        //     // position: absolute;
        //     border: 1px solid black;
        //     &:nth-child(1) {
        //         top: -80px;
        //         width: 230px;
        //         // left: 12vw;
        //     }
        //     &:nth-child(2) {
        //         top: 300px;
        //         width: 230px;
        //         // left: 40vw;
        //     }
        //     &:nth-child(3) {
        //         bottom: 30px;
        //         width: 230px;
        //         // left: 68vw;
        //     }
            
//             }
//         }
// }


</style>
