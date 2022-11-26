<template>
        <!-- CSS only -->
        <!-- bootstrap的cdn要看畫面在打開，之後要關掉。-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <div class="back_end_employee">
        <!-- 新增編輯員工燈箱區 -->
        <div id="lightbox">
            <div id="edit_box">
                <div class="form_item">
                    <label for="title">員工ID</label>
                    <input type="text" id="title">
                </div>
                <div class="form_item">
                    <label for="title">員工姓名</label>
                    <input type="text" id="title">
                </div>
                <div class="form_item">
                    <label for="title">員工身分</label>
                    <input type="text" id="title">
                </div>
                <div class="confirm_box">
                    <button>新增</button>
                    <button id="cancel" @click="close()">取消</button>
                </div>
            </div>
        </div>
        <!-- 新增編輯員工燈箱區 end -->
        <!-- 側邊欄 -->
        <div class="container-fluid overflow-hidden">
            <div class="row g-5">
                <!-- aside模板 -->
                <Aside />
                <!-- aside模板 end -->
                <div class="col-9">
                    <h2>員工管理</h2>
                    <!-- 上方篩選區 -->
                    <div class="filter_box">
                        <button>全部</button>
                        <button>造型師</button>
                        <button>員工</button>
                        <input type="text" placeholder="Search">
                        <button class="search">search</button>
                        <button id="create" @click="open()">新增員工</button>
                    </div>
                    <!-- 上方篩選區 end -->
                    <!-- 員工列表 -->
                    <table class="table employee_table">
                        <thead>
                            <tr>
                                <th scope="col">員工編號</th>
                                <th scope="col">姓名</th>
                                <th scope="col">職稱</th>
                                <th scope="col">帳號狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for= "item in employee" class="item" :key="item.id" @click="open()">
                                <th scope="row">{{ item.emp_id }}</th> <!-- 員工編號 -->
                                <td>{{ item.emp_name }}</td> <!-- 姓名 -->
                                <td>{{ item.emp_job }}</td> <!-- 職稱 -->
                                <td>{{ item.emp_state }}</td> <!-- 帳號狀態 -->
                            </tr>
                        </tbody>
                    </table>
                    <!-- 員工列表 end -->
                    <!-- 頁碼 -->
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">2</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- 頁碼 end -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Aside from '@/components/back_end/Aside.vue'; //引入aside
export default {
    name: "StaffMgnt",
    components: {
        Aside,
    },
    data() {
        open();
        return {
            employee: [ //員工資訊
                {
                    emp_id: 1,
                    emp_name: 'jason',
                    emp_job: '造型師',
                    emp_state: '正常',
                },
                {
                    emp_id: 2,
                    emp_name: 'jason',
                    emp_job: '造型師',
                    emp_state: '正常',
                },
                {
                    emp_id: 3,
                    emp_name: 'jason',
                    emp_job: '造型師',
                    emp_state: '正常',
                },
            ],
            

        }
    },
    methods:{
        open(){
        let lightbox = document.querySelector('#lightbox') // 燈箱
        lightbox.classList.add('active');
		const items = document.querySelectorAll('.item'); // 員工個人資料項目
		items.forEach(item => {	//點擊員工個人資料項目開燈箱
			item.addEventListener('click', e =>{
				lightbox.classList.add('active');
			})
		})
        },
        close(){ //關燈箱
            lightbox.classList.remove('active');
        }
    }

};
</script>
<style lang="scss">
$main_color: #495bff;

.back_end_employee {
    box-sizing: border-box;

    i {
        font-family: 'Times New Roman', Times, serif;
    }

    background-color: #495bff10;

    select {
        width: 80px;
        font-size: 16px;
        border: 1px $main_color solid;
        height: 45px;
    }

    button {
        min-width: 70px;
        outline: none;
        border: none;
        background-color: $main_color;
        color: #fff;
        height: 45px;
        padding: 0px 10px;
    }

    input {
        outline: none;
        border: 1px $main_color solid;
    }

    #lightbox {
        position: fixed;
        z-index: 10;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: #00000080;
        display: none;

        #edit_box {
            width: 640px;
            min-height: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: #00000010 0 0 20px 0px;

            .form_item {
                display: flex;
                align-items: flex-start;
                margin-bottom: 10px;

                label {
                    width: 100px;
                    font-size: 20px;
                    font-weight: 900;
                    color: $main_color;
                    line-height: 45px;
                }

                input {
                    width: calc(100% - 100px);
                    font-size: 16px;
                    border: 1px $main_color solid;
                    height: 45px;
                }
            }
        }
    }

    #lightbox.active {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .confirm_box {
        margin-top: 20px;
        text-align: center;

        button {
            margin: 0 5px;
        }
    }

    // 員工列表-上方篩選區
    .filter_box {
        display: flex;
        align-items: stretch;
        position: relative;

        button {
            margin: 0 5px;
        }

        #create {
            margin-left: auto;
        }

        .search {
            margin: 0;
        }


    }

    h2 {
        font-weight: 600;
        color: $main_color;
        padding: 10px;
    }

    /* 員工列表 */
    .employee_table {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 50px;

        thead {
            background-color: $main_color;
            color: #fff;

            tr {
                th {
                    font-weight: 600; // 表頭 
                }
            }
        }

        tbody {
            .item {
                cursor: pointer;
            }
        }
    }
}
</style>