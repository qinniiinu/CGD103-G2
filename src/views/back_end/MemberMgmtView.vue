<template>
        <body id="app" class="back_end_member">
    <!-- 側邊欄 -->
    <div class="container-fluid overflow-hidden">
        <div class="row g-5">
            <!-- ***放aside模板**** -->
            <!-- 側邊欄 end -->
            <div class="col-9">
                <h2>會員管理</h2>
                <!-- 上方篩選區 -->
                <div class="filter_box">
                    <input type="text" placeholder="Search">
                    <button class="icon_box">search</button>
                </div>
                <!-- 上方篩選區 end -->
                <!-- 會員列表 -->
                <table class="table member_table">
                    <thead>
                        <tr>
                            <th scope="col">編號</th>
                            <th scope="col">姓名</th>
                            <th scope="col">訂閱</th>
                            <th scope="col">信箱</th>
                            <th scope="col">電話</th>
                            <th scope="col">風格</th>
                            <th scope="col">身形</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item) in member" class="item" :key="item.id">
                            <th scope="row">{{item.id}}</th> <!-- 編號 -->
                            <td>{{item.name}}</td> <!-- 姓名 -->
                            <td>{{item.subscribe}}</td> <!-- 訂閱 -->
                            <td>{{item.mail}}</td> <!-- 信箱 -->
                            <td>{{item.tel}}</td> <!-- 電話 -->
                            <td>{{item.style}}</td> <!-- 風格 -->
                            <td>{{item.type}}</td> <!-- 身形 -->
                        </tr>
                    </tbody>
                </table>
                <!-- 會員列表 end -->
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
</body>
    
</template>
<script>
    export default {
	name: "MemberMgmt",
     components: {
    //放aside 模板
  },
  data() {
    return {
        member: [ //會員資訊
            {
                id: 1,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 2,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 3,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 4,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 5,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 6,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 7,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 8,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 9,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            {
                id: 10,
                name: "Mandy",
                subscribe: "Basic",
                mail:"c123123@gmail.com",
                tel:"0912312312",
                style:"極簡",
                type: "沙漏",
            },
            
            
            
        ],	
    }
    },
    methods:{
    }

};
</script>
<style lang="scss">
 @import "../../assets/sass/main.scss";
    $main_color: #495bff;
.back_end_member{
    box-sizing: border-box;
    background-color: #495bff10;
     // 商品列表-上方篩選區
     .filter_box{
        display: flex;
        align-items: stretch;
        select,button{
            margin: 0 5px ;
        }
    }
    button{
        min-width: 70px;
        outline: none;
        border: none;
        background-color: $main_color;
        color: #fff;
        height: 45px;
        padding: 0px 10px;
    }
    input{
        outline: none;
        border: 1px $main_color solid;
    }
    h2{
        font-weight: 600;
        color: $main_color;
        padding: 10px;
    }
     // 會員列表
     .member_table{
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 50px;
        .filter_box select, .filter_box button{
			margin: 0 5px ;
		}
        thead{
			background-color: $main_color;
			color: #fff;
            tr{
                th{
                    font-weight: 600; // 表頭 
               }
            } 
		}
        tbody{
            .item{
                cursor: pointer;
            }
        }
    }
}
    
</style>