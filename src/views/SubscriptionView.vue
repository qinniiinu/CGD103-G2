<template>
    <div class="subscription">
        <div class="wrap">
            <div class="left"></div>
            <div class="right">
                <h2>立即升級體驗完整服務</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Fugit, totam nostrum itaque amet iste omnis eaque aperiam
                    vel sint doloribus voluptatum commodi eum velit officiis
                    adipisci culpa sunt atque harum tenetur officia vero, earum
                    at ullam? Expedita quidem illum, autem voluptas repellat, ea
                    culpa ratione minima sunt sequi cumque fuga.
                </p>
            </div>
        </div>
    </div>
    <div class="sub-plan">
        <div class="subcard" v-for="sub in subinfo" :key="sub.level">
            <div class="card-wrap">
                <div class="card-content">
                    <div class="level">#{{sub.level}}</div>
                    <h2>NT$<span>{{sub.price}}</span>/月</h2>
                    <p>
                        <font-awesome-icon icon="fa-solid fa-check" />
                        每月專屬搭配<span>1</span>套
                    </p>
                    <span>{{sub.monthSet}}</span>
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
                    <router-link to="/SubCheckout"><button @click="setStorage(index,sub)">訂閱</button></router-link>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-intro">
        <div class="intro-wrap"></div>
    </div>
</template>

<script>
import {subinfo} from'@/assets/config/setting.js'
import {vip_level} from'@/assets/config/setting.js'
export default {
    name: "Subscription",
    components: {

    },
    data(){
		return{
            subinfo:subinfo,
			vip_level:vip_level,
            subscribe:[],
		}
	},
	created(){
		
	},
	computed:{
		
	},
	methods:{
        setStorage(index,sub){
            console.log(sub);
            this.subscribe.push({
                level:sub.level,
                price:sub.price,
                monthSet:sub.monthSet,
                monthConsult:sub.monthConsult,
                freeShipping:sub.freeShipping,
                specialOffer:sub.specialOffer
            })
            const data=JSON.stringify(this.subscribe);
            console.log(data);
            localStorage.setItem('subscribe',data);
        }
	}
};
</script>
<style lang="scss" scoped>
.subscription {
    width: 100%;
    .wrap {
        display: flex;
        justify-content: center;
        background: linear-gradient(
                    350deg,
                    rgb(255, 255, 255) 40%,
                    transparent 40%
                )
                left bottom,
            url(../assets/sub_test_img/test_03.png) no-repeat fixed left top;
        background-color: RGB(245, 245, 245);
        height: 600px;
        .left {
            width: 400px;
            height: auto;
        }
        .right {
            width: 500px;
            margin: 10vh;
            font-size: 32px;
            color: $title_color;
            font-weight: bold;
            p {
                font-size: 14px;
                font-weight: normal;
                margin-top: 20px;
                line-height: 20px;
            }
        }
    }
}
.sub-plan {
    height: 280px;
    margin: auto;
    display: flex;
    justify-content: center;
    position: relative;
    .subcard {
        -webkit-transform: skew(-5deg);
        -moz-transform: skew(-5deg);
        -o-transform: skew(-5deg);
        position: absolute;
        border: 1px solid black;
        &:nth-child(1) {
            top: -200px;
            left: 15vw;
        }
        &:nth-child(2) {
            top: -250px;
            left: 40vw;
        }
        &:nth-child(3) {
            top: -300px;
            left: 65vw;
        }
        .card-wrap {
            width: 225px;
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
                    top: -50px;
                }
                a{
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
                }
                
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
.sub-intro {
    height: 600px;
}
</style>
