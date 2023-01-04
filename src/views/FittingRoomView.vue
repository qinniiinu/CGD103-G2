<template>
  <div class="fittingroom">
    <div class="sideMenu">
      <ProductSideMenu></ProductSideMenu>
      <HashTag></HashTag>
    </div>
    <div class="fittingArea">
      <div id="panel" class="wrap1">
        <button @click="remove" class="remove">刪除圖片</button>
      </div>
      <div id="wrap2" class="products">
        <img
          :src="`./pic/${cut(e.product_pic)}`"
          v-for="e in product"
          class="items"
          :key="e.product_id"
          @click="copy($event)"
        />
      </div>
    </div>
  </div>
</template>
 
<script>
import ProductSideMenu from "@/components/product/ProductSideMenu.vue";
import HashTag from "@/components/product/HashTag.vue";
import { BASE_URL } from "../assets/js/common.js";
export default {
  name: "Product",
  components: {
    ProductSideMenu,
    HashTag,
  },

  data() {
    return {
      product: [],
    };
  },

  methods: {
    getResource() {
      this.axios.get(`${BASE_URL}/fittingroom.php`).then((response) => {
        this.product = response.data;

        console.log(this.product);
      });
    },
    cut(x) {
      if (x) return x.split(",")[0];
    },

    copy(e) {
      var panel = document.getElementById("panel");
      var new_item = document.createElement("div");
      new_item.className = "item";
      var image = document.createElement("img");
      image.src = e.currentTarget.src;
      new_item.appendChild(image);
      panel.appendChild(new_item);
      this.drag(new_item);
    },

    drag(obj) {
      if (window.innerWidth > 1200) {
        this.dragD(obj);
      } else {
        this.dragM(obj);
      }
    },

    drag(obj) {
      obj.addEventListener("dblclick", () => {
        const currentWidth = obj.offsetWidth;
        const currentHeight = obj.offsetHeight;
        const desiredWidth = currentWidth * 1.2;
        const desiredHeight = currentHeight * 1.2;

        const maxWidth = 500;
        const maxHeight = 500;

        if (desiredWidth > maxWidth) {
          obj.style.width = maxWidth + "px";
        } else {
          obj.style.width = desiredWidth + "px";
        }
        if (desiredHeight > maxHeight) {
          obj.style.height = maxHeight + "px";
        } else {
          obj.style.height = desiredHeight + "px";
        }
      });
      this.dragM(obj);
      this.dragD(obj);
    },

    //圖片拖曳(touch)
    dragM(obj) {
      obj.addEventListener("touchstart", function (event) {
        event = event || window.event;

        var ol = event.touches[0].clientX - obj.offsetLeft;
        var ot = event.touches[0].clientY - obj.offsetTop;

        obj.addEventListener("touchmove", function (event) {
          event = event || window.event;

          var left = event.touches[0].clientX - ol;
          var top = event.touches[0].clientY - ot;

          obj.style.left = left + "px";
          obj.style.top = top + "px";
        });

        obj.addEventListener("touchend", function () {
          obj.removeEventListener("touchmove");
          obj.removeEventListener("touchend");
        });
      });
    },

    // 圖片拖曳(mouse)
    dragD(obj) {
      obj.onmousedown = function (event) {
        event = event || window.event;

        var ol = event.clientX - obj.offsetLeft;
        var ot = event.clientY - obj.offsetTop;

        document.onmousemove = function (event) {
          event = event || window.event;

          var left = event.clientX - ol;
          var top = event.clientY - ot;

          obj.style.left = left + "px";
          obj.style.top = top + "px";
        };

        document.onmouseup = function () {
          document.onmousemove = null;

          document.onmouseup = null;
        };

        return false;
      };
    },

    remove(e) {
      let setThis = e.target.parentNode;
      setThis.removeChild(setThis.childNodes[1]);
    },
  },

  created() {
    this.getResource();
  },
};
</script>

<style lang="scss" scope>
.fittingroom {
  max-width: 1200px;
  display: flex;
  margin: 50px auto !important;
}

.sideMenu {
  width: 20%;
}

.fittingArea {
  width: 80%;
}

.wrap1 {
  width: 100%;
  position: relative;
  border: 1px solid gray;
  background-image: url(/public/fittingroom/reoutfit.png);
  background-repeat: no-repeat;
  background-position: center;
  min-height: 500px;
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
}

.wrap1 .remove {
  background: $main_color;
  color: white;
  padding: 10px 12px;
  border: $line solid $main_color;
  box-sizing: border-box;
  min-width: 80px;
  height: 40px;
  margin: 2%;

  &:hover {
    background-color: $second_color;
    color: $main_color;
    border: $line solid $main_color;
    cursor: pointer;
  }
}

.item {
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
  // resize: both;
  width: 120px;
  min-width: 120px;
  min-height: 100px;
  overflow: hidden;
}

.item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

#wrap2 {
  width: 100%;
  height: auto;
  border: 1px solid gray;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

#wrap2 img {
  width: 120px;
  height: 120px;
  object-fit: contain;
  margin: 10px auto 60px auto;
}
</style>

