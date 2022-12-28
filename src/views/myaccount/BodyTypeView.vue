<template>
    <p class="title">我的身型</p>
    <div class="data">
        <!-- 這裡開始寫 -->
        <div class="wrap">
            <section class="body_tyle">
                <div class="item">
                    <p>屬於:</p>
                    <h2>{{ body.body_shape }}</h2>
                </div>
                <div class="item">
                    <img :src="`./pic/${body.body_pic}`" alt="body.body_shape" />
                </div>
                <div class="item">
                    <p>{{ body.body_descrip }}</p>
                </div>
                <!-- 性別/身高體重/鞋碼 -->
                <div class="item">
                    <div class="sex">
                        <button
                            class="btn_l"
                            @click="member.sex = 1"
                            :class="{ active: member.sex === 1 }"
                        >
                            男
                        </button>
                        <button
                            class="btn_l"
                            @click="member.sex = 0"
                            :class="{ active: member.sex === 0 }"
                        >
                            女
                        </button>
                    </div>
                    <div class="my_body">
                        <div class="input_group">
                            <input
                                v-model="member.height"
                                type="text"
                                required
                            />
                            <label for="">身高 cm</label>
                        </div>
                        <div class="input_group">
                            <input
                                v-model="member.weight"
                                type="text"
                                required
                            />
                            <label for="">體重 kg</label>
                        </div>
                        <div class="input_group">
                            <input
                                type="text"
                                v-model="member.shoesize"
                                required
                            />
                            <label for="">鞋碼 cm</label>
                        </div>
                    </div>
                </div>
                <!-- 其他數據 rage bar -->
                <div class="item">
                    <div class="rage_group">
                        <span>肩寬</span>
                        <span class="value">{{ member.shoulder }}</span>
                        <span>cm</span>
                        <input
                            v-model="member.shoulder"
                            type="range"
                            min="1"
                            max="100"
                            class="slider"
                        />
                    </div>
                    <div class="rage_group">
                        <span>胸圍</span>
                        <span class="value">{{ member.chest }}</span>
                        <span>cm</span>
                        <input
                            v-model="member.chest"
                            type="range"
                            min="1"
                            max="100"
                            class="slider"
                        />
                    </div>
                    <div class="rage_group">
                        <span>腰圍</span>
                        <span class="value">{{ member.waistline }}</span>
                        <span>cm</span>
                        <input
                            v-model="member.waistline"
                            type="range"
                            min="1"
                            max="100"
                            class="slider"
                        />
                    </div>
                    <div class="rage_group">
                        <span>臀圍</span>
                        <span class="value">{{ member.hip }}</span>
                        <span>cm</span>
                        <input
                            v-model="member.hip"
                            type="range"
                            min="1"
                            max="100"
                            class="slider"
                        />
                    </div>
                    <div class="rage_group">
                        <span>衣長</span>
                        <span class="value">{{ member.clothes }}</span>
                        <span>cm</span>
                        <input
                            v-model="member.clothes"
                            type="range"
                            min="1"
                            max="100"
                            class="slider"
                        />
                    </div>
                    <div class="rage_group">
                        <span>褲長</span>
                        <span class="value">{{ member.pants }}</span>
                        <span>cm</span>
                        <input
                            v-model="member.pants"
                            type="range"
                            min="1"
                            max="100"
                            class="slider"
                        />
                    </div>
                </div>
                <div class="item">
                    <router-link to="/MyPage">
                        <button class="btn_l back">返回</button>
                    </router-link>
                    <button class="btn_s save" @click="savechange">儲存</button>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
import TypeTag from "@/components/mypage/TypeTag.vue";
export default {
    name: "BodyType",
    components: {
        TypeTag,
    },
    methods: {
        myFilter: function () {
            this.isActive = !this.isActive;
        },
    },
    data() {
        return {
            tmp: {},
            member: {
                sex: { 0: "女" },
                height: 170, //身高
                weight: 60, //體重
                shoesize: 40, //鞋碼
                shoulder: 37, //肩寬
                chest: 40, // 胸圍
                waistline: 70, // 腰圍
                hip: 90, //臀圍
                clothes: 65, // 衣長
                pants: 90, //褲長
            },
            body: {
                body_id: "1",
                body_shape: "沙漏型",
                body_pic: "/body_hourglass.png",
                body_descrip:
                    "沙漏型身材是俗稱的完美身材，所以在穿搭上可以選擇可以凸顯自己凹凸有致的身材的單品。直筒寬鬆款都是雷區哦，上身後曲線全無。擁有彈性的針織背心連衣裙就是很好的選擇，完美凸顯身材",
            },

            isActive: false,
        };
    },
    methods: {
        getResource() {
            this.axios
                .get(`${BASE_URL}/memberInfo.php`,
                {credentials: 'include'})
                // .get("/api_server/memberInfo.php")
                .then((res) => {
                    this.tmp = res.data;

                    this.member = {
                        sex: this.tmp.sex,
                        height: this.tmp.height,
                        weight: this.tmp.weight,
                        shoesize: this.tmp.shoesize,
                        shoulder: this.tmp.shoulder,
                        chest: this.tmp.chest,
                        waistline: this.tmp.waistline,
                        hip: this.tmp.hip,
                        clothes: this.tmp.clothes,
                        pants: this.tmp.pants,
                    };
                    this.body = {
                        body_id: this.tmp.body_id,
                        body_shape: this.tmp.body_shape,
                        body_pic: this.tmp.body_pic,
                        body_descrip: this.tmp.body_descrip,
                    };
                })
                .catch((error) => console.log(error));
        },
        cal() {
            let X;
            // 倒三角/草莓（肩膀或胸圍 ÷ 臀部 ≥ 1.05）
            if (
                this.member.shoulder / this.member.hip >= 1.05 &&
                this.member.chest / this.member.hip >= 1.05
            ) {
                X = 101;
            }
            // 矩形/柱形（腰圍 ÷ 肩部或胸圍 ≥ .75） 並且您的胸圍和臀圍測量值彼此相差在 5% 以內
            else if (
                this.member.waistline / this.member.shoulder >= 0.75 &&
                this.member.waistline / this.member.chest >= 0.75
            ) {
                X = 102;
            }
            //      三角形/梨形（臀部 ÷ 肩部或胸圍 ≥ 1.05）
            else if (
                this.member.hip / this.member.shoulder >= 0.75 &&
                this.member.hip / this.member.chest >= 0.75
            ) {
                X = 104;
            }
            // 滴漏（腰圍 ÷ 肩圍和胸圍 ≤ 0.75） 並且您的胸圍和臀圍測量值彼此相差在 5% 以內。要弄清楚這一點，請將您的最大測量值乘以 0.95。即：（肩部 x 0.95）。您的其他兩個測量值都必須大於（最大測量值 x 0.95）的結果。
            else if (
                this.member.waistline / this.member.shoulder <= 0.75 &&
                this.member.waistline / this.member.chest <= 0.75
            ) {
                X = 105;
            }
            // 蘋果（腰圍 ÷ 肩圍和胸圍 ≥ 1.05）要弄清楚這一點，請將您的最大測量值乘以 0.95。即：（肩部 x 0.95）
            else {
                X = 103;
            }

            return X;
        },
        savechange() {
            let formData = new FormData();

            formData.append("body_id", this.cal());

            formData.append("sex", this.member.sex);
            formData.append("height", this.member.height);
            formData.append("weight", this.member.weight);
            formData.append("shoesize", this.member.shoesize);
            formData.append("shoulder", this.member.shoulder);
            formData.append("chest", this.member.chest);
            formData.append("waistline", this.member.waistline);
            formData.append("hip", this.member.hip);
            formData.append("clothes", this.member.clothes);
            formData.append("pants", this.member.pants);
            formData.append("chest", this.member.chest);

            fetch(`${BASE_URL}/bodysizechange.php`, {
                method: "post",
                credentials: 'include',
                body: formData,
            });
            this.$router.push("/MyPage");
        },
    },
    mounted() {
        this.getResource();
    },
};
</script>

<style lang="scss" scoped>
.title {
    font-size: 24px;
    color: #292929;
    padding-bottom: $padding;
}
.body_tyle {
    @include m() {
        border: 1px solid #333;
        padding: 20px 25px;
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        grid-auto-rows: auto;
        // grid-gap:  0 50px;
        background-color: white;
    }
    .item:nth-child(1) {
        padding: 20px 0;
        @include m() {
            grid-area: 1/1/3/3;
        }
        h2 {
            font-size: 32px;
            font-weight: 600;
            text-align: center;
            @include xl() {
                font-size: 60px;
            }
        }
        p {
            display: none;
            @include m() {
                display: block;
                font-size: 20px;
                color: #333;
            }
            @include xl() {
                font-size: 28px;
            }
        }
    }
    .item:nth-child(2) {
        //image
        position: relative;
        margin: auto;
        width: 200px;
        height: 200px;
        @include m() {
            grid-area: 1/4/3/5;
            width: 100%;
        }
        @include xl() {
            width: 200px;
            height: 200px;
        }
        img {
            width: 100%;
            height: 100%;
            vertical-align: middle;
            object-fit: cover;
        }
    }
    .item:nth-child(3) {
        // 身形描述
        display: none;
        @include m() {
            display: block;
            margin-top: 100px;
            grid-area: 2/1/3/4;
        }

        p {
            color: $text_color;
            line-height: 27px;
            font-size: 16px;
        }
    }
    //  性別/身高體重/鞋碼
    .item:nth-child(4) {
        margin-top: 20px;
        @include m() {
            grid-area: 3/1/5/3;
            margin-right: 25px;
            margin-top: 40px;
        }
        @include xl() {
            margin-right: 80px;
            margin-top: 60px;
        }
        .sex {
            display: flex;
            justify-content: space-between;
            .btn_l {
                @include m() {
                    width: 150px;
                }
            }
            .active {
                background-color: $main-color;
                color: white;
            }
        }
    }
    //  其他數據 rage bar
    .item:nth-child(5) {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
        @include xl() {
            margin-top: 40px;
        }
        .rage_group {
            margin-block: 15px;
            span {
                margin-inline: 3px;
            }
            input {
                margin-top: 10px;
                width: 100%;
            }
            input[type="range"] {
                -webkit-appearance: none;
                width: 100%;
                height: 10px;
                background-color: $second_color;
                border-radius: 5px;
                outline: none;
            }
            input[type="range"]::-webkit-slider-thumb {
                -webkit-appearance: none;
                width: 30px;
                height: 15px;
                background-color: $main_color;
                border-radius: 50px;
                box-shadow: 1px 2px #25319e;
                cursor: pointer;
            }
        }
        @include m() {
            grid-area: 3/3/5/5;
        }
    }
    .item:nth-child(6) {
        //按鈕
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        .btn_s {
            margin-inline: 20px;
        }
        @include m() {
            grid-area: 5/3/6/5;
        }
    }
}

.input_group {
    position: relative;
    margin-block-start: 35px;
    border-bottom: 2px solid;
    input {
        width: 100%;
        height: 40px;
        font-size: 16px;
        color: #333;
        padding: 0 5px;
        border: none;
        outline: none;
        &:focus ~ label {
            color: $main_color;
            top: -5px;
        }
        &:valid ~ label {
            color: $main_color;
            top: -5px;
        }
    }
    label {
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: 0.5s;
        color: gray;
    }
}
</style>
