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

