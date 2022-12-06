<template>
  <div class="wrapper">
    <div id="wrap1">

    </div>
    <div id="wrap2">
      <img
        :src="item.image"
        alt=""
        v-for="item in product"
        :key="item.id"
        @click="copy($event)"
      />
    </div>
  </div>
  <!-- <img src="https://picsum.photos/300/200/?random=10"> -->
</template>
<script>
// import { fit } from "@/assets/config/setting.js";
export default {
  data() {
    return {
      product: [
        {
          id: 1,
          image: "https://picsum.photos/300/200/?random=10",
        },
        {
          id: 2,
          image: require("@/assets/fittingroom/item001.png"),
        },
        {
          id: 3,
          image: "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
        },
      ],
    };
  },
  methods: {
    // fit,
    copy(e) {
      let wrap1 = document.getElementById("wrap1");
      let new_item = document.createElement("div");
      new_item.className = "item";
      let image = document.createElement("img");
      image.src = e.currentTarget.src;
    //   image.src = e.getAttribute("src");
    //   image.src = "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg";
      new_item.appendChild(image);
      wrap1.appendChild(new_item);
      this.drag(new_item);
    },
    drag(obj) {
      // 為box1 綁定鼠標按下事件
      //當屬標在拖曳元素上按下時，開始拖曳 onmousedown
      obj.onmousedown = function (event) {
        // 設置 obj 捕獲所有鼠標按下事件
        // way1
        // if(obj.setCapture){
        //     obj.setCapture();
        // }
        // way2
        // obj.setCapture && obj.setCapture();

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
        //   if (obj.releaseCapture) {
        //     obj.releaseCapture();
        //   }
          // way2
        //   obj.releaseCapture && obj.releaseCapture();
        };
        // 當我們拖曳網頁的內容時，瀏覽器會默認去搜尋引擎中搜索內容，此時會導致拖曳功能異常，這是瀏覽器提供的默認行為，如果不想要這個行為，可以 return false 來取消默認行為

        // 但 ie8不試用
        return false;
      };
    },
  },
};
</script>
<style>
* {
  box-sizing: border-box;
}

.wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

/* .wrapper .wrap1, .wrapper .wrap2{
            width: 100% !important;
            border: 1px solid red;
            background-color: #af0;
        } */
#wrap1 {
  width: 100%;
}

#wrap2 {
  width: 100%;
}

#box1 {
  width: 100px;
  height: 100px;
  background-color: #fa0;
  position: absolute;
}

#box2 {
  width: 100px;
  height: 100px;
  /* background-color: #af0; */
  position: absolute;
  left: 100px;
}

#wrap1 {
  position: relative;
  border: 1px solid #ddd;
  min-height: 500px;
}

.item {
  width: 100px;
  height: 100px;
  /* background-color: #af0; */
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
}
.item:nth-child(2) {
  left: 60%;
}

.item img {
  width: 100%;
}

#wrap2 {
  /* width: 50%; */
  height: 500px;
  border: 1px solid darkcyan;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

#wrap2 img {
  width: 100px;
  height: 100px;
}

@media screen and (min-width: 768px) {
  #wrap1 {
    width: 50%;
  }

  #wrap2 {
    width: 50%;
  }
}
</style>