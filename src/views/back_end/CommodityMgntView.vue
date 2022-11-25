<template>
    <head>
        <!-- CSS only -->
        <!-- bootstrap的cdn要看畫面在打開，推上去要關掉。 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <body id="app" class="back_end_shop">
        <!-- 新增編輯商品燈箱區 -->
        <div id="lightbox">
            <div id="edit_box">
                <div class="form_item">
                    <label for="title">品名</label>
                    <input type="text" id="title">
                </div>
                <div class="form_item">
                    <label>種類</label>
                    <select>
                        <option>男裝</option>
                        <option>女裝</option>
                    </select>
                    <select>
                        <option>上身</option>
                        <option>下身</option>
                        <option>套裝</option>
                        <option>鞋款</option>
                        <option>配件</option>
                    </select>
                    <select>
                        <option>短袖</option>
                        <option>長袖</option>
                        <option>外套</option>
                        <option>背心</option>
                    </select>
                </div>
                <div class="form_item">
                    <label for="price">售價</label>
                    <input type="number" id="price">
                </div>
                <!-- Hashtag -->
                <div class="form_item">
                    <label for="tag">Hashtag</label>
                    <input type="text" id="tag" v-model.trim="tag_name" @keydown.enter="addTo">
                    <div id="tag_box">
                        <span v-for="(tag, index) in tags" :key="tag" @click="removeTo(index)">#{{ tag }}
                            <span>x</span></span>
                    </div>
                </div>
                <div class="form_item">
                    <label>子項目</label>
                    <button id="add_sub_item" @click="add_sub_item()">新增</button>
                </div>
                <div class="wrap" id="wrap">
                    <div class="sub_form_item">
                        <div class="option">
                            <input type="file">
                            <input type="text" placeholder="顏色">
                            <select class="size">
                                <option>XXL</option>
                                <option>XL</option>
                                <option>L</option>
                                <option>M</option>
                                <option>S</option>
                                <option>XS</option>
                            </select>
                            <select>
                                <option>上架</option>
                                <option>下架</option>
                            </select>
                            <button class="remove_sub_item" @click="remove_sub_item()">刪除</button>
                        </div>
                    </div>
                </div>

                <div class="confirm_box">
                    <button>新增</button>
                    <button>修改確定</button>
                    <button id="cancel" @click="close()">取消</button>
                </div>
            </div>
        </div>
        <!-- 新增編輯商品燈箱區 end -->
        <!-- 側邊欄 -->
        <div class="container-fluid overflow-hidden">
            <div class="row g-5">
                <Aside />
                <!-- 側邊欄 end -->
                <div class="col-9">
                    <h2>商品管理</h2>
                    <!-- 上方篩選區 -->
                    <div class="filter_box">
                        <select>
                            <option>男裝</option>
                            <option>女裝</option>
                        </select>
                        <select>
                            <option>上身</option>
                            <option>下身</option>
                            <option>套裝</option>
                            <option>鞋款</option>
                            <option>配件</option>
                        </select>
                        <select>
                            <option>短袖</option>
                            <option>長袖</option>
                            <option>外套</option>
                            <option>背心</option>
                        </select>

                        <input type="text" placeholder="Search">
                        <button class="search">search</button>
                        <button id="create" @click="open()">新增</button>



                    </div>
                    <!-- 上方篩選區 end -->
                    <!-- 商品列表 -->
                    <table class="table shop_table">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <th scope="col">商品圖</th>
                                <th scope="col">品名</th>
                                <th scope="col">種類</th>
                                <th scope="col">顏色</th>
                                <th scope="col">尺寸</th>
                                <th scope="col">售價</th>
                                <th scope="col">狀態</th>
                                <th scope="col">#Hashtag</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item) in product" class="item" :key="item.id">
                                <th scope="row">{{ item.id }}</th> <!-- 編號 -->
                                <td class="product_img"><img :src="item.image" :alt="item.description"></td>
                                <!-- 商品圖 -->
                                <td>{{ item.title }}</td> <!-- 品名 -->
                                <td>{{ item.type }}</td> <!-- 類型 -->
                                <td>{{ item.color }}</td> <!-- 顏色 -->
                                <td>{{ item.size }}</td> <!-- 尺寸 -->
                                <td>{{ item.price }}</td> <!-- 價格 -->
                                <td>{{ item.state }}</td> <!-- 狀態 -->
                                <td>{{ item.tag }}</td> <!-- hashtag -->
                            </tr>
                        </tbody>
                    </table>
                    <!-- 商品列表 end -->
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
import Aside from '@/components/back_end/Aside.vue'; //引入aside
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;
export default {
    name: "CommodityMgnt",
    components: {
        Aside,
    },
    data() {

        return {
            tag_name: '', //hashtag
            tags: [],  //hashtag 陣列
            product: [ //產品資訊
                {
                    id: 1,
                    image: "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
                    title: "UNISEX 環保刷毛帽T",
                    type: "上身",
                    color: "黑",
                    size: "XL",
                    price: 1980,
                    description: "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday",
                    category: "men's clothing",
                    state: "上架",
                    tag: "毛衣",
                },
                {
                    id: 2,
                    image: "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
                    title: "UNISEX 環保刷毛帽T",
                    type: "上身",
                    color: "黑",
                    size: "XL",
                    price: 1980,
                    description: "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday",
                    category: "men's clothing",
                    state: "上架",
                    tag: "毛衣",
                },
                {
                    id: 3,
                    image: "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
                    title: "UNISEX 環保刷毛帽T",
                    type: "上身",
                    color: "黑",
                    size: "XL",
                    price: 1980,
                    description: "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday",
                    category: "men's clothing",
                    state: "上架",
                    tag: "毛衣",
                },

            ],
        }
    },
    methods: {

        open() {
            let lightbox = document.querySelector('#lightbox') // 燈箱
            lightbox.classList.add('active');

        },
        close() { //關燈箱
            lightbox.classList.remove('active');
        },
        add_sub_item() {
            $('#wrap').append(`
		 		<div class="sub_form_item">
		 			<div class="option">
		 				<input type="file">
		 				<input type="text" placeholder="顏色">
		 				<select class="size">
		 					<option>XXL</option>
		 					<option>XL</option>
		 					<option>L</option>
		 					<option>M</option>
		 					<option>S</option>
		 					<option>XS</option>
		 				</select>
		 				<select>
		 					<option>上架</option>
		 					<option>下架</option>
		 				</select>
		 				<button class="remove_sub_item">刪除</button>
		 			</div>
		 		</div>`)

        },
        remove_sub_item() {
            $(this).parent().parent().remove();
        },
        addTo() {
            this.tags.push(this.tag_name);
            this.tag_name = '';
        },
        removeTo(index) {
            this.tags.splice(index, 1)
        },


    }
}
	 // --- 刪除子項目 ---
		// $(document).on('click', '.remove_sub_item' ,function() {
		// 	$(this).parent().parent().remove();
		// })
</script>
<style lang="scss">
$main_color: #495bff;

.back_end_shop {
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

    input:not(input[type="file"]) {
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
                    height: 45px;
                }

                select {
                    padding: 5px 0;
                    margin-right: 5px;
                    width: 80px;
                    border: 1px $main_color solid;
                }

                #tag {
                    width: 100px;
                }

                #tag_box {
                    border: 1px $main_color solid;
                    min-height: 45px;
                    width: calc(100% - 205px);
                    margin-left: 5px;
                    position: relative;
                    display: flex;
                    justify-content: flex-start;
                    flex-wrap: wrap;
                    align-items: center;

                    span {
                        background-color: $main_color;
                        padding: 3px 6px;
                        color: #fff;
                        margin: 5px;
                        cursor: pointer;

                        span {
                            font-size: 12px;
                        }
                    }
                }

            }
        }
    }

    #lightbox.active {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .wrap {
        .sub_form_item {
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

            .option {
                // 子項目
                position: relative;
                display: flex;
                justify-content: space-between;
                width: 100%;

                input:nth-child(1) {
                    // 檔案 
                    width: 200px;
                    padding: 5px 0;
                }

                input:nth-child(2) {
                    // 顏色
                    width: 80px;
                    font-size: 16px;
                    outline: none;
                    height: 45px;
                    border: 1px $main_color solid;
                }

            }
        }
    }

    .confirm_box {
        margin-top: 20px;
        text-align: center;

        button {
            margin: 0 5px;
        }
    }

    // 商品列表-上方篩選區
    .filter_box {
        display: flex;
        align-items: stretch;
        position: relative;

        select,
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

    // 商品列表
    .shop_table {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 50px;

        .filter_box select,
        .filter_box button {
            margin: 0 5px;
        }

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

                .product_img {
                    img {
                        width: 100px; // 商品圖
                    }
                }

            }
        }
    }
}
</style>