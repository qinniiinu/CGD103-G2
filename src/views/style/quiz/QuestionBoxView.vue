<template>
    <section class="qus_box">
        <div class="wrap" v-for="(item) in question" :key="item.id">
            <div class="title_box">
                <h2><span class="num_box">問題 <span class="num">0{{item.id}}</span> / 9</span>{{item.q_name}}</h2>
            </div>
            <div class="option_box" @click="next($event)">
                <!-- 選項 -->
                <div class="option" v-for= "(i,idx) in item.op" :key="idx" > 
                    <!-- name = q1, q2... -->
                    <input type="radio" :id="item.op[idx].op_id" :name="'q' + item.id">
                    <label :for="item.op[idx].op_id"><p>{{item.op[idx].op_name}}</p></label> 
                </div>
            </div>
        </div>
    </section>
</template>
<script>


export default {
	name: "QuestionBox",
    data(){
        return{
            question:[
                {
                    id:1,
                    q_name:"請選擇偏好服裝",
                    op: [
                        {
                        op_name:"男裝",
                        op_id:"man",
                        },
                        {
                        op_name:"女裝",
                        op_id:"woman",
                        },
                    ],
                },
                {
                    id:2,
                    q_name:"請選擇偏好服裝",
                    op: [
                        {
                        op_name:"時尚",
                        op_id:"fashion",
                        },
                        {
                        op_name:"舒服",
                        op_id:"relax",
                        },
                        {
                        op_name:"都注重",
                        op_id:"both",
                        },
                    ],
                },
               
            ]
        }
    },
    methods:{
        next(e){
            // console.log("aaa");
            e.currentTarget.parentElement.classList.add("active"); //抓上一層 wrap

        }
    }
};
</script>
<style lang="scss" scoped>

.qus_box{
    // width: fit-content;
    // width: 1000px;
    margin: 30px auto;
    position: relative;
    // display: inline-flex;
    // overflow: hidden;
    .wrap{
         background-color: $bg_blue;
        //  position: absolute;
        //  top: 0;
        //  left: 0;
         width: 600px;
         opacity: 1;
         transition: 6s;
         display: inline-block;
        //  float: left;
        //  display: inline-block;
         
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
            display: flex;
            flex-wrap: wrap;
            height: calc(100vh - 205px); //*** */
            .option{
                width: 100%;
                background-color: #000;
                color:#fff;
                padding: 50px 0;
                border-bottom: 1px solid #fff;
                position: relative;
                label{
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    text-align: center;
                    cursor: pointer;
                    &:hover{
                        transition: 1s;
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
    .wrap.active{
        // display: none;
        opacity: 0;
        transition: 1s;
    }
}

</style>
