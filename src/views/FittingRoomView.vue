<template>
  <div class="fittingroom">
    <div class="sideMenu">
      <!-- <ProductSideMenu></ProductSideMenu>
      <HashTag></HashTag> -->
    </div>
    <div class="fittingArea">
      <div class="panel"></div>
      <div class="products">
          <img 
          v-for="item in product" 
          :key="item.id" 
          :src="item.image" 
          @click="copy($event)" 
          />
      </div>
    </div>
  </div>
</template>
 
<script>
// import SearchBar from "@/components/product/SearchBar.vue";
// import ProductSideMenu from "@/components/product/ProductSideMenu.vue";
// import HashTag from "@/components/product/HashTag.vue";
export default {
  name: "Product",
  components: {
    // SearchBar,
    // ProductSideMenu,
    // HashTag,
  },

  data() {
    return {
      product: [
        { id:1 ,image: require("@/assets/fittingroom/item001.png") },
        { id:2 ,image: require("@/assets/fittingroom/item002.png") },
        { id:3 ,image: require("@/assets/fittingroom/item003.png") },
        { id:4 ,image: require("@/assets/fittingroom/item004.png") },
        { id:5 ,image: require("@/assets/fittingroom/item005.png") },
        { id:6 ,image: require("@/assets/fittingroom/item006.png") },
        { id:7 ,image: require("@/assets/fittingroom/item007.png") },
      ],
    };
  },

  methods: {
    copy(e) {
      let panel = document.getElementById("panel");
      let new_item = document.createElement("div");
      new_item.className = "item";
      let image = document.createElement("img");
      image.src = e.currentTarget.src;
      new_item.appendChild(image);
      panel.appendChild(new_item);
      this.drag(new_item);
    },

    drag(obj) {
      obj.onmousedown = function (event) {
        event = event || window.event;

        var ol = event.clientX - object.offsetLeft;
        var ot = event.clientY - object.offsetTop;

        document.onmousemove = function (event) {
          event = event || window.event;

          var left = event.clientX - ol;
          var top = event.clientY - ot;

          obj.style.left = left + "px";
          obj.style.left = top + "px";
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







<style lang="scss" scoped>
@import "@/assets/sass/main.scss";
.fittingroom {
  width: 100%;
  height: 900px;
  display: flex;
  justify-content: center;
  margin: 50px auto;
  .sideMenu {
    width: 20%;
  }
  .fittingArea {
    width: 60%;
    .panel {
      width: 100%;
      height: 530px;
      border: 1px solid black;
      background: url("../assets/fittingroom/reoutfit.png") no-repeat center;
    }
    .products {
      width: 100%;
      height: auto;
      border: 1px solid black;
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      li {
        width: 100px;
        height: 150px;
        margin: 10px;
        img {
          width: 100%;
          height: 100%;
          object-fit: contain;
        }
      }
    }
  }
}
</style>