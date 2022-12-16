<template>
  <div class="fittingroom">
    <div class="sideMenu">
      <ProductSideMenu></ProductSideMenu>
      <HashTag></HashTag>
      <!-- <BreadCrumbs></BreadCrumbs> -->
    </div>
    <div class="fittingArea">
      <div id="panel" class="wrap1">
        <button @click="remove">reset</button>
      </div>
      <div id="wrap2" class="products">
        <img
          :src="item.image"
          alt=""
          v-for="item in product"
          :key="item.id"
          @click="copy($event)"
        />
      </div>
    </div>
  </div>
</template>
 
<script>
import SearchBar from "@/components/product/SearchBar.vue";
import ProductSideMenu from "@/components/product/ProductSideMenu.vue";
import HashTag from "@/components/product/HashTag.vue";
// import BreadCrumbs from "@/components/BreadCrumbs.vue";
export default {
  name: "Product",
  components: {
    SearchBar,
    ProductSideMenu,
    HashTag,
    // BreadCrumbs,
  },

  data() {
    return {
      product: [
        { id: 1, image: require("@/assets/fittingroom/item001.png") },
        { id: 2, image: require("@/assets/fittingroom/item002.png") },
        { id: 3, image: require("@/assets/fittingroom/item003.png") },
        { id: 4, image: require("@/assets/fittingroom/item004.png") },
        { id: 5, image: require("@/assets/fittingroom/item005.png") },
        { id: 6, image: require("@/assets/fittingroom/item006.png") },
        { id: 7, image: require("@/assets/fittingroom/item007.png") },
      ],
    };
  },

  methods: {
    copy(e) {
      var panel = document.getElementById("panel");
      var new_item = document.createElement("div");
      new_item.className = "item";
      var image = document.createElement("img");
      image.src = e.currentTarget.src;
      new_item.appendChild(image);
      panel.appendChild(new_item);
      this.drag(new_item);
      // this.reset(new_item);
    },

    // remove(){
      
    // }




    drag(obj) {
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
  background-image: url(../assets/fittingroom/reoutfit.png);
  background-repeat: no-repeat;
  background-position: center;
  min-height: 500px;
}

.item {
  width: 120px;
  height: 120px;
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
}

.item img {
  width: 100%;
  object-fit: contain;
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

