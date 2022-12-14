export const fit  =
window.onload = function () {
    var items = document.querySelectorAll(".item");
    items.forEach(i => {
         drag(i);   
    });
    wrap1 = document.getElementById("wrap1");
    // 創 div.item
    // item 的 click
    var items2 = document.querySelectorAll('.item2');
    items2.forEach(j => {
        j.onclick= copy;
    });
    
    function copy(e){
        var new_item = document.createElement('div');
        new_item.className = "item";
        var image = document.createElement('img');
        // image.src = e.target.firstElementChild().src;
        image.src = e.target.src;
        // image.src = "https://picsum.photos/100/100/?random=10";
        new_item.appendChild(image);
        wrap1.appendChild(new_item);
        drag(new_item);
    }
    // 拖曳函數
    // 參數，拖曳元素
    function drag(obj) {    
        // 為box1 綁定鼠標按下事件
        //當屬標在拖曳元素上按下時，開始拖曳 onmousedown
        obj.onmousedown = function (event) {

            // 設置 obj 捕獲所有鼠標按下事件
            // way1
            // if(obj.setCapture){
            //     obj.setCapture(); 
            // }
            // way2
            obj.setCapture && obj.setCapture();

            event = event || window.event;
            //div 的偏移量 鼠標.clientX  - 元素.offesetLeft          
            //div 的偏移量 鼠標.clientY  - 元素.offesetTop
            var ol = event.clientX - obj.offsetLeft;
            var ot = event.clientY - obj.offsetTop;

            //當屬標移動時，被拖曳元素跟隨鼠標移動，onmousemove
            document.onmousemove = function (event) {
                event = event || window.event;
                // 獲取鼠標座標
                var left = event.clientX - ol;
                var top = event.clientY - ot;
                // 修改 obj 位置
                obj.style.left = left + "px";
                obj.style.top = top + "px";
            };
            // 為 document 綁定一個鼠標鬆開事件
            document.onmouseup = function () {
                // 當鼠標鬆開時，被拖曳元素固定在當前位置 onmouseup
                // 取消 document 的 onmousemove 事件
                document.onmousemove = null;
                // 取消 document 的 onmouseup 事件
                document.onmouseup = null;

                // 鼠標鬆開時，取消對事件捕獲
                // way1
                if (obj.releaseCapture) {
                    obj.releaseCapture();
                }
                // way2
                obj.releaseCapture && obj.releaseCapture();


            };
            // 當我們拖曳網頁的內容時，瀏覽器會默認去搜尋引擎中搜索內容，此時會導致拖曳功能異常，這是瀏覽器提供的默認行為，如果不想要這個行為，可以 return false 來取消默認行為

            // 但 ie8不試用
            return false;
        };
    }


}
// ------for subscribe use--------------
export const subinfo=[
    {
        level:'BASIC',
        price:899,
        monthSet:'上身* 1、下身*1',
        monthConsult:1,
        freeShipping:1,
        specialOffer:95
    },
    {   
        level:'STANDARD',
        price:1899,
        monthSet:'上身* 1、下身*1、外套*1',
        monthConsult:2,
        freeShipping:2,
        specialOffer:9
    },
    {   
        level:'ULTRA',
        price:3999,
        monthSet:'上身* 1、下身*1、外套*1、鞋子*1',
        monthConsult:5,
        freeShipping:'無限',
        specialOffer:8
    }
]
export const vip_level=[
    {
        level_id:1,
        product_item:3,
        level_name:"BASIC",
        discount:0.95,
        price:899,
    },{
        level_id:2,
        product_item:3,
        level_name:"STANDARD",
        discount:0.9,
        price:1899,
    },{
        level_id:3,
        product_item:4,
        level_name:"ULTRA",
        discount:0.8,
        price:3999,
    }
]

export const products=[
    {
        "product_id": "1",
        "product_name": "宴會禮服",
        "hashtag": "#婚禮,#喪禮,#國慶,#喜酒",
        "unit_price": "996",
        "product_state": "1",
        "product_maintype": "上身",
        "product_type": "上衣",
        "product_pic": "eveningdress_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "W",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "2",
        "product_name": "手提包",
        "hashtag": "#聚會,#高級豪華",
        "unit_price": "458",
        "product_state": "1",
        "product_maintype": "配件",
        "product_type": "包款",
        "product_pic": "handbag_01_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "3",
        "product_name": "高跟鞋",
        "hashtag": "#矮人專屬",
        "unit_price": "291",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "跟鞋",
        "product_pic": "Highheel_01_1.jpg,Highheel_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "W",
        "product_color": "#000000,#00a,#a00",
        "product_size": "36,37,38,39,40"
    },
    {
        "product_id": "4",
        "product_name": "刷毛長袖",
        "hashtag": "#冬天",
        "unit_price": "299",
        "product_state": "1",
        "product_maintype": "上身",
        "product_type": "長袖",
        "product_pic": "hoodedjacket01_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "5",
        "product_name": "帽T",
        "hashtag": "#外套,#冬天",
        "unit_price": "241",
        "product_state": "1",
        "product_maintype": "上身",
        "product_type": "長袖",
        "product_pic": "hoodedjacket01_2.jpg,hoodedjacket01_3.jpg,hoodedjacket01_4.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "6",
        "product_name": "牛仔褲",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "807",
        "product_state": "1",
        "product_maintype": "下身",
        "product_type": "長褲",
        "product_pic": "jeans_01_1.jpg,jeans_01_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "7",
        "product_name": "運動鞋",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "64",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "休閒鞋",
        "product_pic": "leisureshoes_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#000000,#00a,#a00",
        "product_size": "25,26,27,28,29,30,31"
    },
    {
        "product_id": "8",
        "product_name": "西裝外套",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "855",
        "product_state": "1",
        "product_maintype": "包包",
        "product_type": "",
        "product_pic": "suit_01_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "9",
        "product_name": "西裝外套",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "976",
        "product_state": "1",
        "product_maintype": "上衣",
        "product_type": "",
        "product_pic": "suits_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "10",
        "product_name": "鴨舌",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "223",
        "product_state": "1",
        "product_maintype": "上衣",
        "product_type": "",
        "product_pic": "peakedcap_01_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "11",
        "product_name": "太陽眼鏡",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "879",
        "product_state": "1",
        "product_maintype": "褲子",
        "product_type": "",
        "product_pic": "Sunglasses_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "12",
        "product_name": "喇叭牛仔褲",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "692",
        "product_state": "1",
        "product_maintype": "褲子",
        "product_type": "",
        "product_pic": "sweatpants_01_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "13",
        "product_name": "短袖上衣",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "384",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "",
        "product_pic": "t_shirt_01_1.jpg,t_shirt_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "14",
        "product_name": "鞋子B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "338",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "15",
        "product_name": "包包B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "415",
        "product_state": "1",
        "product_maintype": "包包",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "16",
        "product_name": "包包B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "613",
        "product_state": "1",
        "product_maintype": "包包",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "F",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "17",
        "product_name": "上衣A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "633",
        "product_state": "1",
        "product_maintype": "上衣",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "18",
        "product_name": "上衣A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "672",
        "product_state": "1",
        "product_maintype": "上衣",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "19",
        "product_name": "褲子A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "334",
        "product_state": "1",
        "product_maintype": "褲子",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "20",
        "product_name": "褲子A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "994",
        "product_state": "1",
        "product_maintype": "褲子",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "21",
        "product_name": "鞋子A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "233",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "22",
        "product_name": "鞋子A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "358",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "23",
        "product_name": "包包A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "902",
        "product_state": "1",
        "product_maintype": "包包",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "24",
        "product_name": "包包A",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "736",
        "product_state": "1",
        "product_maintype": "包包",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "25",
        "product_name": "上衣B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "255",
        "product_state": "1",
        "product_maintype": "上衣",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "26",
        "product_name": "上衣B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "636",
        "product_state": "1",
        "product_maintype": "上衣",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "27",
        "product_name": "褲子B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "2",
        "product_state": "1",
        "product_maintype": "褲子",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "28",
        "product_name": "褲子B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "798",
        "product_state": "1",
        "product_maintype": "褲子",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "29",
        "product_name": "鞋子B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "716",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "30",
        "product_name": "鞋子B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "185",
        "product_state": "1",
        "product_maintype": "鞋子",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "31",
        "product_name": "包包B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "164",
        "product_state": "1",
        "product_maintype": "包包",
        "product_type": "",
        "product_pic": "test_01_1.jpg,test_01_2.jpg,test_01_3.jpg,test_01_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#000000,#00a,#a00",
        "product_size": "XS,S,M,L,XL"
    },
    {
        "product_id": "32",
        "product_name": "包包B",
        "hashtag": "#買買買,#hashtag,#這裡有#",
        "unit_price": "984",
        "product_state": "1",
        "product_maintype": "包包",
        "product_type": "",
        "product_pic": "test_02_1.jpg,test_02_2.jpg,test_02_3.jpg,test_02_4.jpg",
        "style_type": "typeA,typeB",
        "body_type": "",
        "product_gender": "M",
        "product_color": "#FF0",
        "product_size": "XS,S,M,L,XL"
    }
]
