<template>
	
    <section class="qus_box">
                    <input type="radio" :id="item.op2.id" name="q1">
        <div class="wrap" v-for="item in question" :key="item.id">
            <div class="title_box">
                <h2><span class="num_box">問題 <span class="num">0{{item.id}}</span> / 9</span>{{item.question}}</h2>
            </div>
            <div class="option_box">
                <!-- <div class="option" v-for="i in questions[item].options" :key="i.id">
                    <input type="radio" :id="item.options.op" name="q1">
                    <label :for="item.options.op"><p>{{item.options.op}}</p></label>
                </div> -->
                <div class="option">
                    <label :for="item.op2.id"><p>{{item.op2.op}}</p></label>
                </div>
                
            </div>
        </div>
    </section>
</template>
<script>


export default {
	name: "QuestionBox",
	// components: {
	// 	StyleCard1,
	// 	Button,
	// },
    data(){
        return{
            question:[
                {
                    id:1,
                    question:"請選擇偏好服裝",
                    op1: {id:"man",op:"男裝"},
                    op2: {id:"woman",op:"女裝"},
                    //  options:[{id:"man",op:"男裝"},{id:"woman",op:"女裝"}]
                },
                {
                    id:2,
                    question:"請選擇偏好服裝2",
                    op1: {id:"man",op:"男裝"},
                    op2: {id:"woman",op:"女裝"},
                    // options:[{id:"man",op:"男裝"},{id:"woman",op:"女裝"}]
                },
               
            ]
        }
    }
};
</script>
<style lang="scss" scoped>

.qus_box{
    width: 100%;
    margin: 30px auto;
    position: relative;
    .wrap{
         background-color: $bg_blue;
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
        .title_box{
            h2{
                flex: 20;
                text-align: center;
                color: $title_color;
                padding: 20px;
                span.num_box{
                    display: block;
                    border: 1px $title_color solid;
                    padding: 10px 20px;
                    width: fit-content;
                    margin-left: auto;
                    margin-right: auto;
                    margin-bottom: 10px;
                    .num{
                        font-weight: 600;
                        
                    }
                }
            }
        }
        .option_box{
            width: 100%;
            .option{
                width: 100%;
                background-color: #000;
                color:#fff;
                padding: 50px 0;
                border-bottom: 1px solid #fff;
                position: relative;
                min-height: calc(100vh / 2);
                // input:checked{

                // }
                label{
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    text-align: center;
                    cursor: pointer;
                    &:hover{
                        background-color: #fff;
                        transition: 1s;
                        color:#000;
                        // text-align: center;
                    }
                    p{
                        transform: translate(-50%, -50%);
                        top: 50%;
                        left: 50%;
                        position: absolute;
                        font-size: 32px;
                    }
                }
            }
        }
    }
    .wrap:nth-child(2){
        opacity: 0;
        display: none;
    }
}

</style>
